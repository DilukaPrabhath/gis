<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test', function () {
    return view('admin.layouts.master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//super Admin
Route::group(['middleware' => 'App\Http\Middleware\IsSuperAdmin'], function()
{

Route::get('/admin/userwww', [App\Http\Controllers\SupAddUserCon::class, 'add']);

});

Route::group(['middleware' => 'App\Http\Middleware\IsAdmin'], function()
{
Route::get('admin/users', [App\Http\Controllers\AdmUserCon::class, 'index']);
Route::get('admin/users/create', [App\Http\Controllers\AdmUserCon::class, 'create']);
Route::post('admin/users/store', [App\Http\Controllers\AdmUserCon::class, 'store']);
Route::get('admin/users/view', [App\Http\Controllers\AdmUserCon::class, 'view']);
Route::get('admin/users/edit', [App\Http\Controllers\AdmUserCon::class, 'edit']);
Route::get('admin/users/password', [App\Http\Controllers\AdmUserCon::class, 'update_password']);
Route::get('/validate-email',[App\Http\Controllers\AdmUserCon::class, 'emailvalidate']);
Route::get('/validate-nic',[App\Http\Controllers\AdmUserCon::class, 'nicvalidate']);
Route::get('/validate-mobile',[App\Http\Controllers\AdmUserCon::class, 'mobilevalidate']);


Route::get('/admin/profile', [App\Http\Controllers\AdmUserCon::class, 'profileView']);
Route::get('/admin/profile/update', [App\Http\Controllers\AdmUserCon::class, 'profileEdit']);
Route::get('/admin/profile/password', [App\Http\Controllers\AdmUserCon::class, 'profilePassword']);

//institute
Route::get('/admin/institutes', [App\Http\Controllers\AdmInstiCon::class, 'index']);
Route::get('/admin/institutes/create', [App\Http\Controllers\AdmInstiCon::class, 'create']);
Route::post('/admin/institutes/store', [App\Http\Controllers\AdmInstiCon::class, 'store']);
Route::get('/admin/institutes/view/{id}', [App\Http\Controllers\AdmInstiCon::class, 'view']);
Route::get('/admin/institutes/edit/{id}', [App\Http\Controllers\AdmInstiCon::class, 'edit']);
Route::post('/admin/institutes/update/{id}', [App\Http\Controllers\AdmInstiCon::class, 'update']);
Route::get('/validate-email',[App\Http\Controllers\AdmInstiCon::class, 'emailvalidate']);
Route::get('/validate-phone',[App\Http\Controllers\AdmInstiCon::class, 'phonevalidate']);
Route::get('/validate-name',[App\Http\Controllers\AdmInstiCon::class, 'namevalidate']);
Route::get('/check_edit_email',[App\Http\Controllers\AdmInstiCon::class, 'oldemailvalidate']);


//Bank
Route::get('/admin/banks', [App\Http\Controllers\AdminBankCon::class, 'create']);
Route::post('/admin/banks/store', [App\Http\Controllers\AdminBankCon::class, 'store']);
Route::get('/admin/banks/edit/{id}', [App\Http\Controllers\AdminBankCon::class, 'edit']);
Route::post('/admin/banks/update/{id}', [App\Http\Controllers\AdminBankCon::class, 'update']);
Route::get('/validate-bank', [App\Http\Controllers\AdminBankCon::class, 'validatebank']);

//inquries
Route::get('/admin/inqueries', [App\Http\Controllers\AdminInqueryCon::class, 'index']);
Route::get('/admin/inqueries/create', [App\Http\Controllers\AdminInqueryCon::class, 'create']);
Route::post('admin/inqueries/store', [App\Http\Controllers\AdminInqueryCon::class, 'store']);
Route::get('/admin/inqueries/view/{pid}', [App\Http\Controllers\AdminInqueryCon::class, 'view']);
Route::get('/admin/inqueries/edit/{id}', [App\Http\Controllers\AdminInqueryCon::class, 'edit']);
Route::post('/admin/inqueries/update/{id}', [App\Http\Controllers\AdminInqueryCon::class, 'update']);

//application
Route::get('/admin/applications', [App\Http\Controllers\AdminApplicationCon::class, 'index']);
Route::post('/admin/applications/update/{id}', [App\Http\Controllers\AdminApplicationCon::class, 'update']);

//student
Route::post('/admin/inqueries/registration/update/{id}', [App\Http\Controllers\AdminStudentCon::class, 'update']);
Route::get('/admin/students', [App\Http\Controllers\AdminStudentCon::class, 'index']);
Route::get('/student/parent2_nic', [App\Http\Controllers\AdminStudentCon::class, 'parent2_details']);

//Scholarship
Route::get('admin/scholarship', [App\Http\Controllers\AdmScholarshipCon::class, 'index']);
Route::get('admin/scholarship/create', [App\Http\Controllers\AdmScholarshipCon::class, 'create']);
Route::post('admin/scholarship/store', [App\Http\Controllers\AdmScholarshipCon::class, 'store']);

Route::get('/admin/payments', [App\Http\Controllers\AdminPaymentCon::class, 'index']);
Route::get('/admin/payments/create', [App\Http\Controllers\AdminPaymentCon::class, 'create']);
Route::get('/admin/payments/view', [App\Http\Controllers\AdminPaymentCon::class, 'view']);
Route::get('/admin/payments/old/view', [App\Http\Controllers\AdminPaymentCon::class, 'old_payment']);

Route::get('/admin/awards/create', [App\Http\Controllers\AdminAwordsCon::class, 'create']);
Route::get('/admin/students/awards/view', [App\Http\Controllers\AdminAwordsCon::class, 'view']);
Route::get('/admin/students/awards/edit', [App\Http\Controllers\AdminAwordsCon::class, 'edit']);

Route::get('/admin/complaints/create', [App\Http\Controllers\AdminComplaintsCon::class, 'create']);
Route::get('/admin/students/complaints/view', [App\Http\Controllers\AdminComplaintsCon::class, 'view']);
Route::get('/admin/students/complaints/edit', [App\Http\Controllers\AdminComplaintsCon::class, 'edit']);

Route::get('/admin/activities_pay', [App\Http\Controllers\AdminActivCon::class, 'index']);
Route::get('/admin/activities_pay/create', [App\Http\Controllers\AdminActivCon::class, 'create']);
Route::get('/admin/activities_pay/view', [App\Http\Controllers\AdminActivCon::class, 'view']);
Route::get('/admin/activities_pay/old/view', [App\Http\Controllers\AdminActivCon::class, 'old_payment']);

//activity create
Route::get('/admin/activities', [App\Http\Controllers\AdminActiviSetCon::class, 'index']);
Route::get('/admin/activities/create', [App\Http\Controllers\AdminActiviSetCon::class, 'create']);
Route::post('/admin/activity/store', [App\Http\Controllers\AdminActiviSetCon::class, 'store']);
Route::get('/admin/activities/edit/{id}', [App\Http\Controllers\AdminActiviSetCon::class, 'edit']);
Route::post('/admin/activities/update/{id}', [App\Http\Controllers\AdminActiviSetCon::class, 'update']);
Route::get('/validate-activity', [App\Http\Controllers\AdminActiviSetCon::class, 'validateactivity']);

//event create
Route::get('/admin/events', [App\Http\Controllers\AdminEventCon::class, 'index']);
Route::get('/admin/events/create', [App\Http\Controllers\AdminEventCon::class, 'create']);
Route::post('admin/events/store', [App\Http\Controllers\AdminEventCon::class, 'store']);
Route::get('/admin/events/view/{id}', [App\Http\Controllers\AdminEventCon::class, 'view']);
Route::get('/admin/events/edit/{id}', [App\Http\Controllers\AdminEventCon::class, 'edit']);
Route::post('/admin/events/update/{id}', [App\Http\Controllers\AdminEventCon::class, 'update']);
Route::get('/admin/events/old/view', [App\Http\Controllers\AdminEventCon::class, 'old_payment']);
Route::post('/evt_temp_insert', [App\Http\Controllers\AdminEventCon::class, 'tempinsert']);

//subject create
Route::get('/admin/subjects', [App\Http\Controllers\AdminSubjectCon::class, 'create']);
Route::get('/admin/subjects/view/{id}', [App\Http\Controllers\AdminSubjectCon::class, 'view']);
Route::get('/admin/subjects/edit/{id}', [App\Http\Controllers\AdminSubjectCon::class, 'edit']);
Route::post('/admin/subjects/store', [App\Http\Controllers\AdminSubjectCon::class, 'store']);
Route::post('/admin/subjects/update/{id}', [App\Http\Controllers\AdminSubjectCon::class, 'update']);
Route::get('/validate-subject',[App\Http\Controllers\AdminSubjectCon::class, 'subjectvalidate']);

//event ticket create
Route::get('/admin/event_tickets', [App\Http\Controllers\AdminTktPriceCon::class, 'index']);
Route::get('/admin/event_tickets/create/{id}', [App\Http\Controllers\AdminTktPriceCon::class, 'create']);
Route::get('/admin/event_tickets/view/{id}', [App\Http\Controllers\AdminTktPriceCon::class, 'view']);
Route::get('/admin/event_tickets/edit/{id}/{t_id}', [App\Http\Controllers\AdminTktPriceCon::class, 'edit']);
Route::post('/admin/event_tickets/store', [App\Http\Controllers\AdminTktPriceCon::class, 'store']);
Route::post('/admin/event_tickets/update/{id}/{t_id}', [App\Http\Controllers\AdminTktPriceCon::class, 'update']);
Route::get('/check_ticket_category',[App\Http\Controllers\AdminTktPriceCon::class, 'validateactivity']);

//class fee
Route::get('/admin/classfee', [App\Http\Controllers\AdminClassFeeCon::class, 'index']);
Route::get('/admin/classfee/create/{id}', [App\Http\Controllers\AdminClassFeeCon::class, 'create']);
Route::get('/admin/classfee/view/{id}', [App\Http\Controllers\AdminClassFeeCon::class, 'view']);
Route::get('/admin/classfee/edit/{ins_id}/{id}', [App\Http\Controllers\AdminClassFeeCon::class, 'edit']);
Route::post('/admin/classfee/store', [App\Http\Controllers\AdminClassFeeCon::class, 'store']);
Route::post('/admin/classfee/update/{id}', [App\Http\Controllers\AdminClassFeeCon::class, 'update']);
Route::get('/check_grade_validation',[App\Http\Controllers\AdminClassFeeCon::class, 'validateclassfee']);

Route::get('/admin/studentprofile', [App\Http\Controllers\AdmStuProfileCon::class, 'view']);
});
