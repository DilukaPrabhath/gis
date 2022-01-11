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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

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
Route::get('admin/users/view/{id}', [App\Http\Controllers\AdmUserCon::class, 'view']);
Route::get('admin/users/edit/{id}', [App\Http\Controllers\AdmUserCon::class, 'edit']);
Route::post('admin/users/update/{id}', [App\Http\Controllers\AdmUserCon::class, 'update']);
Route::get('admin/users/password/{id}', [App\Http\Controllers\AdmUserCon::class, 'update_pas_view']);
Route::post('admin/users/password/update/{id}', [App\Http\Controllers\AdmUserCon::class, 'update_pasword']);
Route::get('/validate-email',[App\Http\Controllers\AdmUserCon::class, 'emailvalidate']);
Route::get('/validate-nic',[App\Http\Controllers\AdmUserCon::class, 'nicvalidate']);
Route::get('/validate-mobile',[App\Http\Controllers\AdmUserCon::class, 'mobilevalidate']);
Route::post('/profile_update_email', [App\Http\Controllers\AdmUserCon::class, 'profile_update_email_validation']);
Route::post('/profile_update_mobile', [App\Http\Controllers\AdmUserCon::class, 'mobilevalidate_edit']);
Route::post('/profile_update_nic', [App\Http\Controllers\AdmUserCon::class, 'edit_nicvalidate']);

Route::get('/admin/profile', [App\Http\Controllers\AdmUserCon::class, 'profileView']);
Route::get('/admin/profile/update', [App\Http\Controllers\AdmUserCon::class, 'profileEdit']);
Route::get('/admin/profile/password', [App\Http\Controllers\AdmUserCon::class, 'profilePassword']);
Route::get('/admin/profile/password/edit', [App\Http\Controllers\AdmUserCon::class, 'profile_pass_update']);
Route::post('/admin/profile/password/update', [App\Http\Controllers\AdmUserCon::class, 'profilepassword_update']);
Route::post('/admin/profile/edit/update', [App\Http\Controllers\AdmUserCon::class, 'profile_update']);

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
Route::get('/validate-code',[App\Http\Controllers\AdmInstiCon::class, 'codevalidate']);
Route::post('/validate_code_edit',[App\Http\Controllers\AdmInstiCon::class, 'edit_codevalidate']);
Route::post('/validate_ins_mail_edit',[App\Http\Controllers\AdmInstiCon::class, 'edit_mail_validate']);
Route::post('/validate_ins_cont_edit',[App\Http\Controllers\AdmInstiCon::class, 'edit_cont_validate']);
Route::post('/validate_ins_name_edit',[App\Http\Controllers\AdmInstiCon::class, 'edit_name_validate']);

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

//inquries primary
Route::get('/admin/primary/inqueries', [App\Http\Controllers\AdminPrimaryInquCon::class, 'index']);
Route::get('/admin/primary/inqueries/create', [App\Http\Controllers\AdminPrimaryInquCon::class, 'create']);
Route::post('admin/primary/inqueries/store', [App\Http\Controllers\AdminPrimaryInquCon::class, 'store']);
Route::get('/admin/primary/inqueries/view/{pid}', [App\Http\Controllers\AdminPrimaryInquCon::class, 'view']);
Route::get('/admin/primary/inqueries/edit/{id}', [App\Http\Controllers\AdminPrimaryInquCon::class, 'edit']);
Route::post('/admin/primary/inqueries/update/{id}', [App\Http\Controllers\AdminPrimaryInquCon::class, 'update']);

//application

Route::post('/admin/applications/update/{id}', [App\Http\Controllers\AdminApplicationCon::class, 'update']);

//application primary
Route::post('/admin/primary/applications/update/{id}', [App\Http\Controllers\AdminPrimaryApplicCon::class, 'update']);

//student
Route::post('/admin/inqueries/registration/update/{id}', [App\Http\Controllers\AdminStudentCon::class, 'update']);
Route::get('/student/parent2_nic', [App\Http\Controllers\AdminStudentCon::class, 'parent2_details']);
Route::get('/student/siblins', [App\Http\Controllers\AdminStudentCon::class, 'siblins']);
Route::post('/sibilin_temp_insert', [App\Http\Controllers\AdminStudentCon::class, 'temp_in']);
Route::post('/admin/school/student/update/{id}', [App\Http\Controllers\AdminStudentCon::class, 'update_data']);
Route::post('/temp_sib_remove', [App\Http\Controllers\AdminStudentCon::class, 'tempremove']);
Route::post('/lord_temp_edit_syblin_tbl', [App\Http\Controllers\AdminStudentCon::class, 'temp_edit_load']);
Route::get('/admin/school/students/table', [App\Http\Controllers\AdminStudentCon::class, 'index']);
Route::get('/admin/school/student/view/{id}', [App\Http\Controllers\AdminStudentCon::class, 'view']);
Route::get('/admin/school/student/edit/{id}', [App\Http\Controllers\AdminStudentCon::class, 'edit']);
Route::post('/class_payment_check', [App\Http\Controllers\AdminPaymentCon::class, 'check_payment']);

//Student Primary
Route::post('/admin/primary/inqueries/registration/update/{id}', [App\Http\Controllers\AdminPrimaryStudentCon::class, 'update']);
Route::get('/admin/nursary/students/table', [App\Http\Controllers\AdminPrimaryStudentCon::class, 'index']);
Route::get('/admin/nursary/student/view/{id}', [App\Http\Controllers\AdminPrimaryStudentCon::class, 'view']);
Route::get('/admin/nursary/student/edit/{id}', [App\Http\Controllers\AdminPrimaryStudentCon::class, 'edit']);
Route::post('/admin/nursary/student/update/{id}', [App\Http\Controllers\AdminPrimaryStudentCon::class, 'update_nersary']);

//Scholarship
Route::get('admin/scholarship', [App\Http\Controllers\AdmScholarshipCon::class, 'index']);
Route::get('admin/scholarship/create', [App\Http\Controllers\AdmScholarshipCon::class, 'create']);
Route::post('admin/scholarship/store', [App\Http\Controllers\AdmScholarshipCon::class, 'store']);
Route::get('/sholarship_st_id_num', [App\Http\Controllers\AdmScholarshipCon::class, 'autoload']);

//Student Payment
Route::get('/admin/payments', [App\Http\Controllers\AdminPaymentCon::class, 'index']);
Route::get('/admin/payments/create', [App\Http\Controllers\AdminPaymentCon::class, 'create']);
Route::post('/admin/payments/store', [App\Http\Controllers\AdminPaymentCon::class, 'store']);
Route::get('/admin/payments/view', [App\Http\Controllers\AdminPaymentCon::class, 'view']);
Route::get('/admin/payments/old/view', [App\Http\Controllers\AdminPaymentCon::class, 'old_payment']);
Route::get('/class_st_id_num', [App\Http\Controllers\AdminPaymentCon::class, 'student_class_fee']);
Route::post('/select_pay_student', [App\Http\Controllers\AdminPaymentCon::class, 'student_select']);
Route::get('/student_pay_print/{id}', [App\Http\Controllers\AdminPaymentCon::class, 'print']);

//Academic Awards
Route::get('/admin/awards/create', [App\Http\Controllers\AdminAwordsCon::class, 'create']);
Route::post('/admin/awards/store', [App\Http\Controllers\AdminAwordsCon::class, 'store']);
Route::get('/admin/students/awards/view', [App\Http\Controllers\AdminAwordsCon::class, 'view']);
Route::get('/admin/students/awards/edit', [App\Http\Controllers\AdminAwordsCon::class, 'edit']);
Route::get('/admin/students/awards/search', [App\Http\Controllers\AdminAwordsCon::class, 'auto_cmplt']);

//Non Academic Awards
Route::get('/admin/nonacc/awards/create', [App\Http\Controllers\AdminNonAcadAwordsCon::class, 'create']);
Route::post('/admin/nonacc/awards/store', [App\Http\Controllers\AdminNonAcadAwordsCon::class, 'store']);
Route::get('/admin/nonacc/students/awards/view', [App\Http\Controllers\AdminNonAcadAwordsCon::class, 'view']);
Route::get('/admin/nonacc/students/awards/edit', [App\Http\Controllers\AdminNonAcadAwordsCon::class, 'edit']);
Route::get('/admin/nonacc/students/awards/search', [App\Http\Controllers\AdminNonAcadAwordsCon::class, 'auto_cmplt']);

// complaints
Route::get('/admin/complaints/create', [App\Http\Controllers\AdminComplaintsCon::class, 'create']);
Route::get('/admin/students/complaints/view', [App\Http\Controllers\AdminComplaintsCon::class, 'view']);
Route::get('/admin/students/complaints/edit', [App\Http\Controllers\AdminComplaintsCon::class, 'edit']);
Route::get('/admin/complaints/students/search', [App\Http\Controllers\AdminComplaintsCon::class, 'auto_cmplt']);
Route::post('/admin/complaints/store', [App\Http\Controllers\AdminComplaintsCon::class, 'store']);


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

//application Payment
Route::get('/admin/student/profile', [App\Http\Controllers\AdmStuProfileCon::class, 'index']);
Route::get('/student/profile/id', [App\Http\Controllers\AdmStuProfileCon::class, 'auto_cmplt']);
Route::get('/validate_profile', [App\Http\Controllers\AdmStuProfileCon::class, 'validate_student_id']);
Route::post('/admin/student/find', [App\Http\Controllers\AdmStuProfileCon::class, 'profile_search']);

//application Payment
Route::get('admin/application_pay', [App\Http\Controllers\AdminApplicatPayCon::class, 'index']);
Route::get('admin/application_pay/create', [App\Http\Controllers\AdminApplicatPayCon::class, 'create']);
Route::post('admin/application_pay/store', [App\Http\Controllers\AdminApplicatPayCon::class, 'store']);
Route::get('admin/application_pay/view/{id}', [App\Http\Controllers\AdminApplicatPayCon::class, 'view']);
Route::get('admin/application_pay/print/{id}', [App\Http\Controllers\AdminApplicatPayCon::class, 'print']);

//Activity Payment
Route::get('admin/activities_payments', [App\Http\Controllers\AdminActiFeePayCon::class, 'index']);
Route::get('admin/activities_payments/create', [App\Http\Controllers\AdminActiFeePayCon::class, 'create']);
Route::post('admin/activities_payments/store', [App\Http\Controllers\AdminActiFeePayCon::class, 'store']);
Route::get('admin/activities_payments/view/{id}', [App\Http\Controllers\AdminActiFeePayCon::class, 'view']);
Route::get('admin/activities_payments/print/{id}', [App\Http\Controllers\AdminActiFeePayCon::class, 'print']);
Route::post('/activity_price_get', [App\Http\Controllers\AdminActiFeePayCon::class, 'select_price']);
Route::get('/student_id', [App\Http\Controllers\AdminActiFeePayCon::class, 'student_id']);
Route::get('/validate-activity-pay', [App\Http\Controllers\AdminActiFeePayCon::class, 'validate_student_id']);

});
