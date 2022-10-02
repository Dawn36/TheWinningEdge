<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\TalkTrackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpportunitiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function () {
Route::resource('email_template', EmailTemplateController::class);
Route::resource('talk_track', TalkTrackController::class);
Route::resource('user', UserController::class);
Route::post('user_note', [UserController::class, 'userNote'])->name('user_note');

Route::resource('contact', ContactController::class);
Route::get('contact_counter', [ContactController::class, 'contactCounter'])->name('contact_counter');
Route::get('contact_note', [ContactController::class, 'contactNote'])->name('contact_note');
Route::post('contact_note', [ContactController::class, 'contactNoteSubmit'])->name('contact_note');
Route::get('contact_upload', [ContactController::class, 'uploadContact'])->name('contact_upload');
Route::post('contact_upload', [ContactController::class, 'uploadContactSubmit'])->name('contact_upload');
Route::post('contact_change_status', [ContactController::class, 'contactChangeStatus'])->name('contact_change_status');
Route::get('contact_counter_delete/{id}', [ContactController::class, 'contactCounterDelete'])->name('contact_counter_delete');

Route::resource('opportunities', OpportunitiesController::class);
Route::get('opportunities_target', [OpportunitiesController::class, 'opportunitiesTarget'])->name('opportunities_target');
Route::post('opportunities_target', [OpportunitiesController::class, 'opportunitiesTargetSubmit'])->name('opportunities_target');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('rpa_target', [DashboardController::class, 'rpaTarget'])->name('rpa_target');
Route::post('rpa_target', [DashboardController::class, 'rpaTargetSubmit'])->name('rpa_target');

Route::resource('settings', SettingsController::class);
Route::post('/settings/{id}/updateEmail', [SettingsController::class, 'updateEmail'])->name('updateEmail');
Route::post('/settings/{id}/updatePassword', [SettingsController::class, 'updatePassword'])->name('updatePassword');
});

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
