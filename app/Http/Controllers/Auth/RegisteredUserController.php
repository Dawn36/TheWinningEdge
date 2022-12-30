<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'password' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
        ]);
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=>$request->email,
            'user_type'=>$request->role_id,
            'password_show'=>$request->password,
            'password'=> Hash::make($request->password),
            'created_at' => date("Y-m-d h:i:s"),
        ]);

        $user->attachRole($request->role_id);
        event(new Registered($user));

        Auth::login($user);

        $fullName= Auth::user()->first_name." ".Auth::user()->last_name;
        $email=Auth::user()->email;
        $this->SessionLoginLogs($fullName,$email, 'register');

        $data['full_name']=$request->first_name." ".$request->last_name;
        $data['password']=$request->password;
        $data['email']=$request->email;
        $subject=$data['full_name'].', Welcome to TWE!';
        $fileName='email-confirm';
        $toEmail = $request->email;
        $this->SendEmail($toEmail,$subject,$fileName,$data);

        return redirect(RouteServiceProvider::HOME);
    }
    // function sendEmail($toEmail,$subject,$fileName,$data='')
    // {
    //     $to_email=$toEmail;
    //     $from_email = env('MAIL_FROM_ADDRESS');
    //     $subject = $subject;
    //     $cc = env('CCEMAIL');
    //         Mail::send("mail-template/$fileName", ['data' => $data], function ($message) use ($to_email, $from_email, $subject, $cc) {
    //             $message->to($to_email)
    //                 ->subject($subject)
    //                 ->cc($cc);
    //             $message->from($from_email);
    //     });    
    // }
}
