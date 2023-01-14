<?php

use App\Http\Controllers\admin\appointmentController;
use App\Http\Controllers\Auth\authController;
use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;
//-------user
use App\Http\Controllers\user\dashboardController as userDashboardController;
use App\Http\Controllers\user\profileController as userProfileController;
use App\Http\Controllers\user\bookAppointmentController as userBookAppointmentController;
use App\Http\Controllers\user\medicalHistoryController as userMedicalHistoryController;
// doctor
use App\Http\Controllers\doctor\dashboardController as doctorDashboardController;
use App\Http\Controllers\doctor\profileController as doctorProfileController;
use App\Http\Controllers\doctor\appointmentController as doctorAppointmentController;
use App\Http\Controllers\doctor\patientController as doctorPatientController;
// admin
use App\Http\Controllers\admin\dashboardController as adminDashboardController;
use App\Http\Controllers\admin\doctorController;
use App\Http\Controllers\admin\profileController as adminProfileController;
use App\Http\Controllers\admin\medicalHistoryController as adminMedicalHistoryController;
use App\Http\Controllers\admin\reportController;
use App\Http\Controllers\admin\specializationController;
use App\Http\Controllers\admin\userController;


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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () { return view('guest.index'); })->name('index');
    Route::controller(contactController::class)->group(function () {
        Route::get('/contactus', 'index');
        Route::post('/contactus', 'store');
    });
    Route::controller(authController::class)->group(function () {
        Route::get('/login/user', 'userIndex')->name('userlogin');
        Route::post('/login/user', 'userCheck');
        Route::get('/login/admin', 'adminIndex')->name('adminlogin');
        Route::post('/login/admin', 'adminCheck');
        Route::get('/login/doctor', 'doctorIndex');
        Route::post('/login/doctor', 'doctorCheck');
        Route::get('/user/registration', 'registrationIndex');
        Route::post('/user/registration', 'registrationStore');
        Route::post('/user/registration/checkemail', 'registrationCheckemail');
        Route::get('/{account}/recover', 'recoveryIndex');
        Route::post('/account/recover', 'recoveryCheck');
        Route::post('/{user_id}/{restriction}/reset/password', 'storeReset')->name('resetpassword');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [authController::class, 'logout'])->name('logout');
});

// user
Route::group(['middleware' => ['auth.user'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [userDashboardController::class, 'index'])->name('dashboard');
    Route::controller(userProfileController::class)->group(function() {
        Route::get('/profile', 'index')->name('profile');  
        Route::post('/profile', 'update');
        Route::get('/change-email', 'changeemailIndex')->name('change.email');
        Route::post('/change-email', 'updateemail');
        Route::get('/change-password', 'changepasswordIndex')->name('change.password');
        Route::post('/change-password', 'updatepassword');
    });
    // Route::post('/check-email', [authController::class ,'registrationCheckemail'])->name('check.email');
    Route::controller(userBookAppointmentController::class)->group(function(){
        Route::get('/create/appointment', 'index')->name('book.appointment');  
        Route::post('/create/appointment', 'store');
        Route::post('/book/appointment/check/doctor', 'checkDoctor')->name('book.appointment.check');
        Route::get('/appointment/history', 'appointmentHistoryIndex')->name('appointment.history');
        Route::get('/appointment/history/{appointment}', 'appointmentCancel')->name('appointment.cancel');
    });
    Route::controller(userMedicalHistoryController::class)->group(function(){
        Route::get('/medical/history', 'index')->name('medical.history');
        Route::get('/{patient_id}/medical/history/view', 'viewIndex')->name('medical.history.view');
    });
});

// doctor
Route::group(['middleware' => ['auth.doctor'], 'prefix' => 'doctor', 'as' => 'doctor.'], function () {
    Route::get('/dashboard', [doctorDashboardController::class, 'index'])->name('dashboard');
    Route::controller(doctorProfileController::class)->group(function() {
        Route::get('/profile', 'index')->name('profile');  
        Route::post('/profile', 'update');
        Route::get('/change-password', 'changepasswordIndex')->name('change.password');
        Route::post('/change-password', 'updatepassword');
    });
    Route::controller(doctorAppointmentController::class)->group(function(){
        Route::get('/appointment/history', 'appointmentHistoryIndex')->name('appointment.history');
        Route::get('/appointment/history/{appointment}', 'appointmentCancel')->name('appointment.cancel');
    });
    Route::controller(doctorPatientController::class)->group(function(){
        Route::get('/patient/manage', 'index')->name('patient.manage');
        Route::get('/patient/manage/add', 'addIndex')->name('patient.add');
        Route::post('/patient/manage/add', 'addStore');
        Route::get('/patient/{patient_id}/manage/edit', 'editIndex')->name('patient.edit');
        Route::post('/patient/{patient_id}/manage/edit', 'editStore');
        Route::get('/patient/{patient_id}/manage/view', 'viewIndex')->name('patient.view');
        Route::post('/patient/{patient_id}/manage/view', 'viewStore');
        Route::get('/patient/search', 'search')->name('patient.search');
        Route::post('/patient/search', 'searchShow');
    });
});

// admin
Route::group(['middleware' => ['auth.admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [adminDashboardController::class, 'index'])->name('dashboard');
    Route::controller(adminProfileController::class)->group(function() {
        Route::get('/change-password', 'index')->name('change.password');
        Route::post('/change-password', 'update');
    });
    Route::controller(adminMedicalHistoryController::class)->group(function(){
        Route::get('/medical/history', 'index')->name('medical.history');
        Route::get('/{patient_id}/medical/history/view', 'viewIndex')->name('medical.history.view');
    });
    Route::controller(specializationController::class)->group(function(){
        Route::get('/doctor/specialization/add', 'index')->name('specialization.add');
        Route::post('/doctor/specialization/add', 'store');
        Route::get('/doctor/specialization/{spec_id}/edit/{spec}', 'indexEdit')->name('specialization.edit');
        Route::post('/doctor/specialization/{spec_id}/edit/{spec}', 'storeEdit');
        Route::get('/doctor/specialization/{spec_id}/delete/{spec}', 'destroy')->name('specialization.delete');
    });
    Route::controller(doctorController::class)->group(function(){
        Route::get('/doctor/add', 'index')->name('doctor.add');
        Route::post('/doctor/add', 'store');
        Route::post('/doctor/registration/checkemail', 'registrationCheckemail')->name('check.email');
        Route::get('/doctor', 'indexManage')->name('doctor.manage');
        Route::get('/doctor/{doc_id}/delete/{doc}', 'destroy')->name('doctor.delete');
        Route::get('/doctor/{doc_id}/edit/{doc}', 'indexEdit')->name('doctor.edit');
        Route::post('/doctor/{doc_id}/edit/{doc}', 'storeEdit');
    });
    Route::controller(userController::class)->group(function(){
        Route::get('/manage/user', 'index')->name('user.manage');
        Route::get('/manage/user/{user_id}', 'destroy')->name('user.destroy');
    });
    Route::get('/view/appointment',[appointmentController::class, 'index'])->name('view.appointment');
    Route::controller(contactController::class)->group(function(){
        Route::get('/queries/unread', 'unreadIndex')->name('query.unread');
        Route::get('/queries/read', 'readIndex')->name('query.read');
        Route::get('/queries/{query_id}/view', 'unreadOpen')->name('query.open');
        Route::post('/queries/{query_id}/view', 'updateQuery');
    });
    Route::controller(reportController::class)->group(function(){
        Route::get('/log/{account}', 'logIndex')->name('log.show');
        Route::get('/reports', 'showBetween')->name('report.show');
        Route::post('/reports', 'searchBetween');
        Route::get('/search', 'searchIndex')->name('search');
        Route::post('/search', 'searchShow');

    });

});

