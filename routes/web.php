<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\TalkTrackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OpportunitiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\CompanyNoteController;
use App\Http\Controllers\CompanyFileController;
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
    Route::get('session_log', [LogsController::class, 'sessionLogs'])->name('session_log');
    Route::get('get_session_log', [LogsController::class, 'getSessionLog'])->name('get_session_log');
    
    
Route::resource('company_files', CompanyFileController::class);
Route::resource('company_note', CompanyNoteController::class);
Route::resource('email_template', EmailTemplateController::class);
Route::resource('company', CompanyController::class);
Route::get('company_edit_not_ajax/{id}', [CompanyController::class, 'companyEditNotAjax'])->name('company_edit_not_ajax');

Route::resource('task', TaskController::class);
Route::get('task_status_update', [TaskController::class, 'taskStatusUpdate'])->name('task_status_update');

Route::resource('talk_track', TalkTrackController::class);
Route::get('get_talk_track', [TalkTrackController::class, 'getTalkTrack'])->name('get_talk_track');

Route::resource('user', UserController::class);
Route::post('user_note', [UserController::class, 'userNote'])->name('user_note');
Route::get('user_index', [UserController::class, 'userIndex'])->name('user_index');
Route::get('user_create', [UserController::class, 'userCreate'])->name('user_create');

Route::resource('contact', ContactController::class);
Route::get('get_contact', [ContactController::class, 'getContact'])->name('get_contact');
Route::get('contact_edit_not_ajax/{id}', [ContactController::class, 'contactEditNotAjax'])->name('contact_edit_not_ajax');
Route::get('contact_counter', [ContactController::class, 'contactCounter'])->name('contact_counter');
Route::get('contact_opportunities_create', [ContactController::class, 'contactOpportunitiesCreate'])->name('contact_opportunities_create');
Route::get('contact_opportunities_edit/{id}', [ContactController::class, 'contactOpportunitiesEdit'])->name('contact_opportunities_edit');
Route::get('contact_note', [ContactController::class, 'contactNote'])->name('contact_note');
Route::get('edit_note_contact/{id}', [ContactController::class, 'contactNoteEdit'])->name('edit_note_contact');
Route::post('edit_note_contact_submit', [ContactController::class, 'contactNoteEditSubmit'])->name('edit_note_contact_submit');
Route::post('note_destroy/{id}', [ContactController::class, 'noteDestroy'])->name('note_destroy');
Route::get('contact_counter_delete/{id}', [ContactController::class, 'contactCounterDelete'])->name('contact_counter_delete');
Route::post('contact_note', [ContactController::class, 'contactNoteSubmit'])->name('contact_note');
Route::get('contact_upload', [ContactController::class, 'uploadContact'])->name('contact_upload');
Route::post('contact_upload', [ContactController::class, 'uploadContactSubmit'])->name('contact_upload');
Route::post('contact_change_status', [ContactController::class, 'contactChangeStatus'])->name('contact_change_status');
Route::get('contact_task', [ContactController::class, 'contactTask'])->name('contact_task');
Route::get('contact_task_edit', [ContactController::class, 'contactTaskEdit'])->name('contact_task_edit');
Route::get('contact_email_template', [ContactController::class, 'contactEmailTemplate'])->name('contact_email_template');
Route::get('get_email_templater', [ContactController::class, 'getEmailTemplater'])->name('get_email_templater');
// Route::get('contact_status_bulk', [ContactController::class, 'contactStatusBulk'])->name('contact_status_bulk');
Route::post('contact_status_update', [ContactController::class, 'contactStatusUpdate'])->name('contact_status_update');
Route::post('contact_status_bulk', [ContactController::class, 'contactStatusBulkUpdate'])->name('contact_status_bulk');
Route::post('contact_email_template', [ContactController::class, 'contactEmailTemplateSend'])->name('contact_email_template');
Route::post('contact_export',[ContactController::class,'contactExport'])->name('contact_export');
Route::get('contact_filter',[ContactController::class,'contactFilter'])->name('contact_filter');

Route::resource('opportunities', OpportunitiesController::class);
Route::get('contact_company', [OpportunitiesController::class, 'getContactCompany'])->name('contact_company');
Route::get('opportunities_target', [OpportunitiesController::class, 'opportunitiesTarget'])->name('opportunities_target');
Route::post('opportunities_target', [OpportunitiesController::class, 'opportunitiesTargetSubmit'])->name('opportunities_target');
Route::get('opportunities_status_update', [OpportunitiesController::class, 'opportunitiesStatusUpdate'])->name('opportunities_status_update');
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

Route::get('command', function () {
    Artisan::call('queue:restart');
    Artisan::call('queue:work');
    dd("Done");
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
