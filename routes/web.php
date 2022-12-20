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

//User
Route::get('admin/users', [App\Http\Controllers\AdminController\AdmUserCon::class, 'index']);
Route::get('admin/users/create', [App\Http\Controllers\AdminController\AdmUserCon::class, 'create']);
Route::post('admin/users/store', [App\Http\Controllers\AdminController\AdmUserCon::class, 'store']);
Route::get('admin/users/view/{id}', [App\Http\Controllers\AdminController\AdmUserCon::class, 'view']);
Route::get('admin/users/edit/{id}', [App\Http\Controllers\AdminController\AdmUserCon::class, 'edit']);
Route::post('admin/users/update/{id}', [App\Http\Controllers\AdminController\AdmUserCon::class, 'update']);
Route::get('admin/users/password/{id}', [App\Http\Controllers\AdminController\AdmUserCon::class, 'update_pas_view']);
Route::post('admin/users/password/update/{id}', [App\Http\Controllers\AdminController\AdmUserCon::class, 'update_pasword']);
Route::get('/validate-email',[App\Http\Controllers\AdminController\AdmUserCon::class, 'emailvalidate']);
Route::get('/validate-nic',[App\Http\Controllers\AdminController\AdmUserCon::class, 'nicvalidate']);
Route::get('/validate-mobile',[App\Http\Controllers\AdminController\AdmUserCon::class, 'mobilevalidate']);
Route::post('/profile_update_email', [App\Http\Controllers\AdminController\AdmUserCon::class, 'profile_update_email_validation']);
Route::post('/profile_update_mobile', [App\Http\Controllers\AdminController\AdmUserCon::class, 'mobilevalidate_edit']);
Route::post('/profile_update_nic', [App\Http\Controllers\AdminController\AdmUserCon::class, 'edit_nicvalidate']);

//Profile
Route::get('/admin/profile', [App\Http\Controllers\AdminController\AdmUserCon::class, 'profileView']);
Route::get('/admin/profile/update', [App\Http\Controllers\AdminController\AdmUserCon::class, 'profileEdit']);
Route::get('/admin/profile/password', [App\Http\Controllers\AdminController\AdmUserCon::class, 'profilePassword']);
Route::get('/admin/profile/password/edit', [App\Http\Controllers\AdminController\AdmUserCon::class, 'profile_pass_update']);
Route::post('/admin/profile/password/update', [App\Http\Controllers\AdminController\AdmUserCon::class, 'profilepassword_update']);
Route::post('/admin/profile/edit/update', [App\Http\Controllers\AdminController\AdmUserCon::class, 'profile_update']);

//Institute
Route::get('/admin/institutes', [App\Http\Controllers\AdminController\AdmInstiCon::class, 'index']);
Route::get('/admin/institutes/create', [App\Http\Controllers\AdminController\AdmInstiCon::class, 'create']);
Route::post('/admin/institutes/store', [App\Http\Controllers\AdminController\AdmInstiCon::class, 'store']);
Route::get('/admin/institutes/view/{id}', [App\Http\Controllers\AdminController\AdmInstiCon::class, 'view']);
Route::get('/admin/institutes/edit/{id}', [App\Http\Controllers\AdminController\AdmInstiCon::class, 'edit']);
Route::post('/admin/institutes/update/{id}', [App\Http\Controllers\AdminController\AdmInstiCon::class, 'update']);
Route::get('/validate-email',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'emailvalidate']);
Route::get('/validate-phone',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'phonevalidate']);
Route::get('/validate-name',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'namevalidate']);
Route::get('/check_edit_email',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'oldemailvalidate']);
Route::get('/validate-code',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'codevalidate']);
Route::post('/validate_code_edit',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'edit_codevalidate']);
Route::post('/validate_ins_mail_edit',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'edit_mail_validate']);
Route::post('/validate_ins_cont_edit',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'edit_cont_validate']);
Route::post('/validate_ins_name_edit',[App\Http\Controllers\AdminController\AdmInstiCon::class, 'edit_name_validate']);

//Bank
Route::get('/admin/banks', [App\Http\Controllers\AdminController\AdminBankCon::class, 'create']);
Route::post('/admin/banks/store', [App\Http\Controllers\AdminController\AdminBankCon::class, 'store']);
Route::get('/admin/banks/edit/{id}', [App\Http\Controllers\AdminController\AdminBankCon::class, 'edit']);
Route::post('/admin/banks/update/{id}', [App\Http\Controllers\AdminController\AdminBankCon::class, 'update']);
Route::get('/validate-bank', [App\Http\Controllers\AdminController\AdminBankCon::class, 'validatebank']);

//Inquries
Route::get('/admin/inqueries', [App\Http\Controllers\AdminController\AdminInqueryCon::class, 'index']);
Route::get('/admin/inqueries/create', [App\Http\Controllers\AdminController\AdminInqueryCon::class, 'create']);
Route::post('admin/inqueries/store', [App\Http\Controllers\AdminController\AdminInqueryCon::class, 'store']);
Route::get('/admin/inqueries/view/{pid}', [App\Http\Controllers\AdminController\AdminInqueryCon::class, 'view']);
Route::get('/admin/inqueries/edit/{id}', [App\Http\Controllers\AdminController\AdminInqueryCon::class, 'edit']);
Route::post('/admin/inqueries/update/{id}', [App\Http\Controllers\AdminController\AdminInqueryCon::class, 'update']);

//Inquries Primary
Route::get('/admin/primary/inqueries', [App\Http\Controllers\AdminController\AdminPrimaryInquCon::class, 'index']);
Route::get('/admin/primary/inqueries/create', [App\Http\Controllers\AdminController\AdminPrimaryInquCon::class, 'create']);
Route::post('admin/primary/inqueries/store', [App\Http\Controllers\AdminController\AdminPrimaryInquCon::class, 'store']);
Route::get('/admin/primary/inqueries/view/{pid}', [App\Http\Controllers\AdminController\AdminPrimaryInquCon::class, 'view']);
Route::get('/admin/primary/inqueries/edit/{id}', [App\Http\Controllers\AdminController\AdminPrimaryInquCon::class, 'edit']);
Route::post('/admin/primary/inqueries/update/{id}', [App\Http\Controllers\AdminController\AdminPrimaryInquCon::class, 'update']);

//Application

Route::post('/admin/applications/update/{id}', [App\Http\Controllers\AdminController\AdminApplicationCon::class, 'update']);

//Application Primary
Route::post('/admin/primary/applications/update/{id}', [App\Http\Controllers\AdminController\AdminPrimaryApplicCon::class, 'update']);

//student
Route::post('/admin/inqueries/registration/update/{id}', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'update']);
Route::get('/student/parent2_nic', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'parent2_details']);
Route::get('/student/siblins', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'siblins']);
Route::post('/sibilin_temp_insert', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'temp_in']);
Route::post('/admin/school/student/update/{id}', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'update_data']);
Route::post('/temp_sib_remove', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'tempremove']);
Route::post('/lord_temp_edit_syblin_tbl', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'temp_edit_load']);
Route::get('/admin/school/students/table', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'index']);
Route::get('/admin/school/student/view/{id}', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'view']);
Route::get('/admin/school/student/edit/{id}', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'edit']);
Route::get('/admin/school/student/grade/update/{id}', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'student_grade_update']);
Route::post('/admin/grade/update/store/{id}', [App\Http\Controllers\AdminController\AdminStudentCon::class, 'grade_update']);
Route::post('/class_payment_check', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'check_payment']);

//Student Primary
Route::post('/admin/primary/inqueries/registration/update/{id}', [App\Http\Controllers\AdminController\AdminPrimaryStudentCon::class, 'update']);
Route::get('/admin/nursary/students/table', [App\Http\Controllers\AdminController\AdminPrimaryStudentCon::class, 'index']);
Route::get('/admin/nursary/student/view/{id}', [App\Http\Controllers\AdminController\AdminPrimaryStudentCon::class, 'view']);
Route::get('/admin/nursary/student/edit/{id}', [App\Http\Controllers\AdminController\AdminPrimaryStudentCon::class, 'edit']);
Route::post('/admin/nursary/student/update/{id}', [App\Http\Controllers\AdminController\AdminPrimaryStudentCon::class, 'update_nersary']);

//Scholarship
Route::get('admin/scholarship', [App\Http\Controllers\AdminController\AdmScholarshipCon::class, 'index']);
Route::get('admin/scholarship/create', [App\Http\Controllers\AdminController\AdmScholarshipCon::class, 'create']);
Route::post('admin/scholarship/store', [App\Http\Controllers\AdminController\AdmScholarshipCon::class, 'store']);
Route::get('/sholarship_st_id_num', [App\Http\Controllers\AdminController\AdmScholarshipCon::class, 'autoload']);

//Student Payment
Route::get('/admin/payments', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'index']);
Route::get('/admin/payments/create', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'create']);
Route::post('/admin/payments/store', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'store']);
Route::post('/admin/payments/student_get_details', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'student_get_details']);
Route::get('/admin/payments/view', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'view']);
Route::get('/admin/payments/old/view', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'old_payment']);
Route::get('/class_st_id_num', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'student_class_fee']);
Route::post('/select_pay_student', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'student_select']);
Route::get('/student_pay_print/{id}', [App\Http\Controllers\AdminController\AdminPaymentCon::class, 'print']);

//Academic Awards
Route::get('/admin/awards/create', [App\Http\Controllers\AdminController\AdminAwordsCon::class, 'create']);
Route::post('/admin/awards/store', [App\Http\Controllers\AdminController\AdminAwordsCon::class, 'store']);
Route::get('/admin/students/awards/view', [App\Http\Controllers\AdminController\AdminAwordsCon::class, 'view']);
Route::get('/admin/students/awards/edit', [App\Http\Controllers\AdminController\AdminAwordsCon::class, 'edit']);
Route::get('/admin/students/awards/search', [App\Http\Controllers\AdminController\AdminAwordsCon::class, 'auto_cmplt']);

//Non Academic Awards
Route::get('/admin/nonacc/awards/create', [App\Http\Controllers\AdminController\AdminNonAcadAwordsCon::class, 'create']);
Route::post('/admin/nonacc/awards/store', [App\Http\Controllers\AdminController\AdminNonAcadAwordsCon::class, 'store']);
Route::get('/admin/nonacc/students/awards/view', [App\Http\Controllers\AdminController\AdminNonAcadAwordsCon::class, 'view']);
Route::get('/admin/nonacc/students/awards/edit', [App\Http\Controllers\AdminController\AdminNonAcadAwordsCon::class, 'edit']);
Route::get('/admin/nonacc/students/awards/search', [App\Http\Controllers\AdminController\AdminNonAcadAwordsCon::class, 'auto_cmplt']);

// Complaints
Route::get('/admin/complaints/create', [App\Http\Controllers\AdminController\AdminComplaintsCon::class, 'create']);
Route::get('/admin/students/complaints/view', [App\Http\Controllers\AdminController\AdminComplaintsCon::class, 'view']);
Route::get('/admin/students/complaints/edit', [App\Http\Controllers\AdminController\AdminComplaintsCon::class, 'edit']);
Route::get('/admin/complaints/students/search', [App\Http\Controllers\AdminController\AdminComplaintsCon::class, 'auto_cmplt']);
Route::post('/admin/complaints/store', [App\Http\Controllers\AdminController\AdminComplaintsCon::class, 'store']);

//Activities Pay
Route::get('/admin/activities_pay', [App\Http\Controllers\AdminController\AdminController\AdminActivCon::class, 'index']);
Route::get('/admin/activities_pay/create', [App\Http\Controllers\AdminController\AdminController\AdminActivCon::class, 'create']);
Route::get('/admin/activities_pay/view', [App\Http\Controllers\AdminController\AdminController\AdminActivCon::class, 'view']);
Route::get('/admin/activities_pay/old/view', [App\Http\Controllers\AdminController\AdminController\AdminActivCon::class, 'old_payment']);

//Activity Create
Route::get('/admin/activities', [App\Http\Controllers\AdminController\AdminActiviSetCon::class, 'index']);
Route::get('/admin/activities/create', [App\Http\Controllers\AdminController\AdminActiviSetCon::class, 'create']);
Route::post('/admin/activity/store', [App\Http\Controllers\AdminController\AdminActiviSetCon::class, 'store']);
Route::get('/admin/activities/edit/{id}', [App\Http\Controllers\AdminController\AdminActiviSetCon::class, 'edit']);
Route::post('/admin/activities/update/{id}', [App\Http\Controllers\AdminController\AdminActiviSetCon::class, 'update']);
Route::get('/validate-activity', [App\Http\Controllers\AdminController\AdminActiviSetCon::class, 'validateactivity']);

//Event Create
Route::get('/admin/events', [App\Http\Controllers\AdminController\AdminEventCon::class, 'index']);
Route::get('/admin/events/create', [App\Http\Controllers\AdminController\AdminEventCon::class, 'create']);
Route::post('admin/events/store', [App\Http\Controllers\AdminController\AdminEventCon::class, 'store']);
Route::get('/admin/events/view/{id}', [App\Http\Controllers\AdminController\AdminEventCon::class, 'view']);
Route::get('/admin/events/edit/{id}', [App\Http\Controllers\AdminController\AdminEventCon::class, 'edit']);
Route::post('/admin/events/update/{id}', [App\Http\Controllers\AdminController\AdminEventCon::class, 'update']);
Route::get('/admin/events/old/view', [App\Http\Controllers\AdminController\AdminEventCon::class, 'old_payment']);
Route::post('/evt_temp_insert', [App\Http\Controllers\AdminController\AdminEventCon::class, 'tempinsert']);

//Subject Create
Route::get('/admin/subjects', [App\Http\Controllers\AdminController\AdminSubjectCon::class, 'create']);
Route::get('/admin/subjects/view/{id}', [App\Http\Controllers\AdminController\AdminSubjectCon::class, 'view']);
Route::get('/admin/subjects/edit/{id}', [App\Http\Controllers\AdminController\AdminSubjectCon::class, 'edit']);
Route::post('/admin/subjects/store', [App\Http\Controllers\AdminController\AdminSubjectCon::class, 'store']);
Route::post('/admin/subjects/update/{id}', [App\Http\Controllers\AdminController\AdminSubjectCon::class, 'update']);
Route::get('/validate-subject',[App\Http\Controllers\AdminController\AdminSubjectCon::class, 'subjectvalidate']);

//Event Ticket Create
Route::get('/admin/event_tickets', [App\Http\Controllers\AdminController\AdminTktPriceCon::class, 'index']);
Route::get('/admin/event_tickets/create/{id}', [App\Http\Controllers\AdminController\AdminTktPriceCon::class, 'create']);
Route::get('/admin/event_tickets/view/{id}', [App\Http\Controllers\AdminController\AdminTktPriceCon::class, 'view']);
Route::get('/admin/event_tickets/edit/{id}/{t_id}', [App\Http\Controllers\AdminController\AdminTktPriceCon::class, 'edit']);
Route::post('/admin/event_tickets/store', [App\Http\Controllers\AdminController\AdminTktPriceCon::class, 'store']);
Route::post('/admin/event_tickets/update/{id}/{t_id}', [App\Http\Controllers\AdminController\AdminTktPriceCon::class, 'update']);
Route::get('/check_ticket_category',[App\Http\Controllers\AdminController\AdminTktPriceCon::class, 'validateactivity']);

//Class Fee
Route::get('/admin/classfee', [App\Http\Controllers\AdminController\AdminClassFeeCon::class, 'index']);
Route::get('/admin/classfee/create/{id}', [App\Http\Controllers\AdminController\AdminClassFeeCon::class, 'create']);
Route::get('/admin/classfee/view/{id}', [App\Http\Controllers\AdminController\AdminClassFeeCon::class, 'view']);
Route::get('/admin/classfee/edit/{ins_id}/{id}', [App\Http\Controllers\AdminController\AdminClassFeeCon::class, 'edit']);
Route::post('/admin/classfee/store', [App\Http\Controllers\AdminController\AdminClassFeeCon::class, 'store']);
Route::post('/admin/classfee/update/{id}', [App\Http\Controllers\AdminController\AdminClassFeeCon::class, 'update']);
Route::get('/check_grade_validation',[App\Http\Controllers\AdminController\AdminClassFeeCon::class, 'validateclassfee']);

//Student Profile
Route::get('/admin/student/profile', [App\Http\Controllers\AdminController\AdmStuProfileCon::class, 'index']);
Route::get('/student/profile/id', [App\Http\Controllers\AdminController\AdmStuProfileCon::class, 'auto_cmplt']);
Route::get('/validate_profile', [App\Http\Controllers\AdminController\AdmStuProfileCon::class, 'validate_student_id']);
Route::post('/admin/student/find', [App\Http\Controllers\AdminController\AdmStuProfileCon::class, 'profile_search']);
Route::post('/admin/student/event/image', [App\Http\Controllers\AdminController\AdmStuProfileCon::class, 'eventimage']);

//Application Payment
Route::get('admin/application_pay', [App\Http\Controllers\AdminController\AdminApplicatPayCon::class, 'index']);
Route::get('admin/application_pay/create', [App\Http\Controllers\AdminController\AdminApplicatPayCon::class, 'create']);
Route::post('admin/application_pay/store', [App\Http\Controllers\AdminController\AdminApplicatPayCon::class, 'store']);
Route::get('admin/application_pay/view/{id}', [App\Http\Controllers\AdminController\AdminApplicatPayCon::class, 'view']);
Route::get('admin/application_pay/print/{id}', [App\Http\Controllers\AdminController\AdminApplicatPayCon::class, 'print']);

//Activity Payment
Route::get('admin/activities_payments', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'index']);
Route::get('admin/activities_payments/create', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'create']);
Route::post('admin/activities_payments/store', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'store']);
Route::get('admin/activities_payments/view/{id}', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'view']);
Route::get('admin/activities_payments/print/{id}', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'print']);
Route::post('/activity_price_get', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'select_price']);
Route::get('/student_id', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'student_id']);
Route::get('/validate-activity-pay', [App\Http\Controllers\AdminController\AdminActiFeePayCon::class, 'validate_student_id']);


//Reports application
Route::get('/admin/reports/application', [App\Http\Controllers\AdminController\AdminApplicationRepotCon::class, 'index']);
Route::post('admin/application/date', [App\Http\Controllers\AdminController\AdminApplicationRepotCon::class, 'date_vi']);
Route::post('admin/application/daterange/loard', [App\Http\Controllers\AdminController\AdminApplicationRepotCon::class, 'date_vi']);
Route::post('admin/application/daterange', [App\Http\Controllers\AdminController\AdminApplicationRepotCon::class, 'date_range']);

//Reports Due
Route::get('/admin/reports/school_due', [App\Http\Controllers\AdminController\AdminReportDueController::class, 'index']);
Route::post('/admin/duefee/date', [App\Http\Controllers\AdminController\AdminReportDueController::class, 'date_vise']);
Route::post('/admin/duefee/daterange', [App\Http\Controllers\AdminController\AdminReportDueController::class, 'date_range']);
//Route::post('admin/application/daterange', [App\Http\Controllers\AdminController\AdminReportDueController::class, 'date_range']);

//Export
Route::post('admin/application/daterange/export', [App\Http\Controllers\AdminController\AdminApplicationRepotCon::class, 'export']);
Route::post('admin/application/daterange/import', [App\Http\Controllers\AdminController\AdminApplicationRepotCon::class, 'import']);


//Reports income
Route::get('admin/reports/income', [App\Http\Controllers\AdminController\AdminIncomeRepotCon::class, 'index']);
Route::get('admin/reports/income/date', [App\Http\Controllers\AdminController\AdminIncomeRepotCon::class, 'date_loard']);
Route::post('admin/income/date', [App\Http\Controllers\AdminController\AdminIncomeRepotCon::class, 'date_vise']);
Route::post('admin/income/daterange', [App\Http\Controllers\AdminController\AdminIncomeRepotCon::class, 'date_range']);

//Reports Admition
Route::get('/admin/reports/admition', [App\Http\Controllers\AdminController\AdminReportAdmitionCon::class, 'index']);
Route::get('/admin/reports/admition/date', [App\Http\Controllers\AdminController\AdminReportAdmitionCon::class, 'date_loard']);
Route::post('/admin/reports/admition/date_vise', [App\Http\Controllers\AdminController\AdminReportAdmitionCon::class, 'date_vi']);
Route::post('/admin/reports/admition/daterange', [App\Http\Controllers\AdminController\AdminReportAdmitionCon::class, 'date_range']);

//Admition
Route::get('admin/admition', [App\Http\Controllers\AdminController\AdminAdmitionCon::class, 'index']);
Route::get('admin/admition/create', [App\Http\Controllers\AdminController\AdminAdmitionCon::class, 'create']);
Route::post('admin/admition/store', [App\Http\Controllers\AdminController\AdminAdmitionCon::class, 'store']);
//Route::get('admin/admition/view/{id}', [App\Http\Controllers\AdminController\AdminAdmitionCon::class, 'view']);
Route::get('admin/admition/print/{id}', [App\Http\Controllers\AdminController\AdminAdmitionCon::class, 'print']);
Route::get('/validate-admition-pay', [App\Http\Controllers\AdminController\AdminAdmitionCon::class, 'validate_student_id']);
Route::get('/admition/student_id', [App\Http\Controllers\AdminController\AdminAdmitionCon::class, 'student_id']);



//Backup
Route::get('/down_lord', [App\Http\Controllers\AdminController\AddUserController::class, 'backupDatabase']);

});



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Super Admin______________________________________________________________________________________________________________________________________
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::group(['middleware' => 'App\Http\Middleware\IsSuperAdmin'], function()
{

//User
Route::get('superadmin/users', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'index']);
Route::get('superadmin/users/create', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'create']);
Route::post('superadmin/users/store', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'store']);
Route::get('superadmin/users/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'view']);
Route::get('superadmin/users/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'edit']);
Route::post('superadmin/users/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'update']);
Route::get('superadmin/users/password/{id}', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'update_pas_view']);
Route::post('superadmin/users/password/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'update_pasword']);
Route::get('/superadmin/validate-email',[App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'emailvalidate']);
Route::get('/superadmin/validate-nic',[App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'nicvalidate']);
Route::get('/superadmin/validate-mobile',[App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'mobilevalidate']);
Route::post('/superadmin/profile_update_email', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'profile_update_email_validation']);
Route::post('/superadmin/profile_update_mobile', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'mobilevalidate_edit']);
Route::post('/superadmin/profile_update_nic', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'edit_nicvalidate']);

//Profile
Route::get('/superadmin/profile', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'profileView']);
Route::get('/superadmin/profile/update', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'profileEdit']);
Route::get('/superadmin/profile/password', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'profilePassword']);
Route::get('/superadmin/profile/password/edit', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'profile_pass_update']);
Route::post('/superadmin/profile/password/update', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'profilepassword_update']);
Route::post('/superadmin/profile/edit/update', [App\Http\Controllers\SuperAdmin\SuAdmUserController::class, 'profile_update']);

//Institute
Route::get('/superadmin/institutes', [App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'index']);
Route::get('/superadmin/institutes/create', [App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'create']);
Route::post('/superadmin/institutes/store', [App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'store']);
Route::get('/superadmin/institutes/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'view']);
Route::get('/superadmin/institutes/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'edit']);
Route::post('/superadmin/institutes/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'update']);
Route::get('/superadmin/validate-email',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'emailvalidate']);
Route::get('/superadmin/validate-phone',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'phonevalidate']);
Route::get('/superadmin/validate-name',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'namevalidate']);
Route::get('/superadmin/check_edit_email',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'oldemailvalidate']);
Route::get('/superadmin/validate-code',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'codevalidate']);
Route::post('/superadmin/validate_code_edit',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'edit_codevalidate']);
Route::post('/superadmin/validate_ins_mail_edit',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'edit_mail_validate']);
Route::post('/superadmin/validate_ins_cont_edit',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'edit_cont_validate']);
Route::post('/superadmin/validate_ins_name_edit',[App\Http\Controllers\SuperAdmin\SuAdmInstiController::class, 'edit_name_validate']);

//Bank
Route::get('/superadmin/banks', [App\Http\Controllers\SuperAdmin\SuAdminBankController::class, 'create']);
Route::post('/superadmin/banks/store', [App\Http\Controllers\SuperAdmin\SuAdminBankController::class, 'store']);
Route::get('/superadmin/banks/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminBankController::class, 'edit']);
Route::post('/superadmin/banks/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminBankController::class, 'update']);
Route::get('/superadmin/validate-bank', [App\Http\Controllers\SuperAdmin\SuAdminBankController::class, 'validatebank']);

//Inquries
Route::get('/superadmin/inqueries', [App\Http\Controllers\SuperAdmin\SuAdminInqueryController::class, 'index']);
Route::get('/superadmin/inqueries/create', [App\Http\Controllers\SuperAdmin\SuAdminInqueryController::class, 'create']);
Route::post('superadmin/inqueries/store', [App\Http\Controllers\SuperAdmin\SuAdminInqueryController::class, 'store']);
Route::get('/superadmin/inqueries/view/{pid}', [App\Http\Controllers\SuperAdmin\SuAdminInqueryController::class, 'view']);
Route::get('/superadmin/inqueries/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminInqueryController::class, 'edit']);
Route::post('/superadmin/inqueries/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminInqueryController::class, 'update']);

//Inquries Primary
Route::get('/superadmin/primary/inqueries', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryInquController::class, 'index']);
Route::get('/superadmin/primary/inqueries/create', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryInquController::class, 'create']);
Route::post('superadmin/primary/inqueries/store', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryInquController::class, 'store']);
Route::get('/superadmin/primary/inqueries/view/{pid}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryInquController::class, 'view']);
Route::get('/superadmin/primary/inqueries/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryInquController::class, 'edit']);
Route::post('/superadmin/primary/inqueries/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryInquController::class, 'update']);

//Application

Route::post('/superadmin/applications/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminApplicationController::class, 'update']);

//Application Primary
Route::post('/superadmin/primary/applications/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryApplicController::class, 'update']);

//student
Route::post('/superadmin/inqueries/registration/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'update']);
Route::get('/superadmin/student/parent2_nic', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'parent2_details']);
Route::get('/superadmin/student/siblins', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'siblins']);
Route::post('/superadmin/sibilin_temp_insert', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'temp_in']);
Route::post('/superadmin/school/student/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'update_data']);
Route::post('/superadmin/temp_sib_remove', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'tempremove']);
Route::post('/superadmin/lord_temp_edit_syblin_tbl', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'temp_edit_load']);
Route::get('/superadmin/school/students/table', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'index']);
Route::get('/superadmin/school/student/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'view']);
Route::get('/superadmin/school/student/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'edit']);
Route::get('/superadmin/school/student/grade/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminStudentController::class, 'student_grade_update']);
Route::post('/superadmin/class_payment_check', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'check_payment']);

//Student Primary
Route::post('/superadmin/primary/inqueries/registration/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryStudentController::class, 'update']);
Route::get('/superadmin/nursary/students/table', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryStudentController::class, 'index']);
Route::get('/superadmin/nursary/student/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryStudentController::class, 'view']);
Route::get('/superadmin/nursary/student/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryStudentController::class, 'edit']);
Route::post('/superadmin/nursary/student/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPrimaryStudentController::class, 'update_nersary']);

//Scholarship
Route::get('superadmin/scholarship', [App\Http\Controllers\SuperAdmin\SuAdmScholarshipController::class, 'index']);
Route::get('superadmin/scholarship/create', [App\Http\Controllers\SuperAdmin\SuAdmScholarshipController::class, 'create']);
Route::post('superadmin/scholarship/store', [App\Http\Controllers\SuperAdmin\SuAdmScholarshipController::class, 'store']);
Route::get('/superadmin/sholarship_st_id_num', [App\Http\Controllers\SuperAdmin\SuAdmScholarshipController::class, 'autoload']);

//Student Payment
Route::get('/superadmin/payments', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'index']);
Route::get('/superadmin/payments/create', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'create']);
Route::post('/superadmin/payments/store', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'store']);
Route::get('/superadmin/payments/view', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'view']);
Route::get('/superadmin/payments/old/view', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'old_payment']);
Route::get('/superadmin/class_st_id_num', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'student_class_fee']);
Route::post('/superadmin/select_pay_student', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'student_select']);
Route::get('/superadmin/student_pay_print/{id}', [App\Http\Controllers\SuperAdmin\SuAdminPaymentController::class, 'print']);

//Academic Awards
Route::get('/superadmin/awards/create', [App\Http\Controllers\SuperAdmin\SuAdminAwordsController::class, 'create']);
Route::post('/superadmin/awards/store', [App\Http\Controllers\SuperAdmin\SuAdminAwordsController::class, 'store']);
Route::get('/superadmin/students/awards/view', [App\Http\Controllers\SuperAdmin\SuAdminAwordsController::class, 'view']);
Route::get('/superadmin/students/awards/edit', [App\Http\Controllers\SuperAdmin\SuAdminAwordsController::class, 'edit']);
Route::get('/superadmin/students/awards/search', [App\Http\Controllers\SuperAdmin\SuAdminAwordsController::class, 'auto_cmplt']);

//Non Academic Awards
Route::get('/superadmin/nonacc/awards/create', [App\Http\Controllers\SuperAdmin\SuAdminNonAcadAwordsController::class, 'create']);
Route::post('/superadmin/nonacc/awards/store', [App\Http\Controllers\SuperAdmin\SuAdminNonAcadAwordsController::class, 'store']);
Route::get('/superadmin/nonacc/students/awards/view', [App\Http\Controllers\SuperAdmin\SuAdminNonAcadAwordsController::class, 'view']);
Route::get('/superadmin/nonacc/students/awards/edit', [App\Http\Controllers\SuperAdmin\SuAdminNonAcadAwordsController::class, 'edit']);
Route::get('/superadmin/nonacc/students/awards/search', [App\Http\Controllers\SuperAdmin\SuAdminNonAcadAwordsController::class, 'auto_cmplt']);

// Complaints
Route::get('/superadmin/complaints/create', [App\Http\Controllers\SuperAdmin\SuAdminComplaintsController::class, 'create']);
Route::get('/superadmin/students/complaints/view', [App\Http\Controllers\SuperAdmin\SuAdminComplaintsController::class, 'view']);
Route::get('/superadmin/students/complaints/edit', [App\Http\Controllers\SuperAdmin\SuAdminComplaintsController::class, 'edit']);
Route::get('/superadmin/complaints/students/search', [App\Http\Controllers\SuperAdmin\SuAdminComplaintsController::class, 'auto_cmplt']);
Route::post('/superadmin/complaints/store', [App\Http\Controllers\SuperAdmin\SuAdminComplaintsController::class, 'store']);

//Activities Pay
Route::get('/superadmin/activities_pay', [App\Http\Controllers\SuperAdmin\SuAdminActivController::class, 'index']);
Route::get('/superadmin/activities_pay/create', [App\Http\Controllers\SuperAdmin\SuAdminActivController::class, 'create']);
Route::get('/superadmin/activities_pay/view', [App\Http\Controllers\SuperAdmin\SuAdminActivController::class, 'view']);
Route::get('/superadmin/activities_pay/old/view', [App\Http\Controllers\SuperAdmin\SuAdminActivController::class, 'old_payment']);

//Activity Create
Route::get('/superadmin/activities', [App\Http\Controllers\SuperAdmin\SuAdminActiviSetController::class, 'index']);
Route::get('/superadmin/activities/create', [App\Http\Controllers\SuperAdmin\SuAdminActiviSetController::class, 'create']);
Route::post('/superadmin/activity/store', [App\Http\Controllers\SuperAdmin\SuAdminActiviSetController::class, 'store']);
Route::get('/superadmin/activities/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminActiviSetController::class, 'edit']);
Route::post('/superadmin/activities/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminActiviSetController::class, 'update']);
Route::get('/superadmin/validate-activity', [App\Http\Controllers\SuperAdmin\SuAdminActiviSetController::class, 'validateactivity']);

//Event Create
Route::get('/superadmin/events', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'index']);
Route::get('/superadmin/events/create', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'create']);
Route::post('superadmin/events/store', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'store']);
Route::get('/superadmin/events/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'view']);
Route::get('/superadmin/events/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'edit']);
Route::post('/superadmin/events/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'update']);
Route::get('/superadmin/events/old/view', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'old_payment']);
Route::post('/superadmin/evt_temp_insert', [App\Http\Controllers\SuperAdmin\SuAdminEventController::class, 'tempinsert']);

//Subject Create
Route::get('/superadmin/subjects', [App\Http\Controllers\SuperAdmin\SuAdminSubjectController::class, 'create']);
Route::get('/superadmin/subjects/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminSubjectController::class, 'view']);
Route::get('/superadmin/subjects/edit/{id}', [App\Http\Controllers\SuperAdmin\SuAdminSubjectController::class, 'edit']);
Route::post('/superadmin/subjects/store', [App\Http\Controllers\SuperAdmin\SuAdminSubjectController::class, 'store']);
Route::post('/superadmin/subjects/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminSubjectController::class, 'update']);
Route::get('/superadmin/validate-subject',[App\Http\Controllers\SuperAdmin\SuAdminSubjectController::class, 'subjectvalidate']);

//Event Ticket Create
Route::get('/superadmin/event_tickets', [App\Http\Controllers\SuperAdmin\SuAdminTktPriceController::class, 'index']);
Route::get('/superadmin/event_tickets/create/{id}', [App\Http\Controllers\SuperAdmin\SuAdminTktPriceController::class, 'create']);
Route::get('/superadmin/event_tickets/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminTktPriceController::class, 'view']);
Route::get('/superadmin/event_tickets/edit/{id}/{t_id}', [App\Http\Controllers\SuperAdmin\SuAdminTktPriceController::class, 'edit']);
Route::post('/superadmin/event_tickets/store', [App\Http\Controllers\SuperAdmin\SuAdminTktPriceController::class, 'store']);
Route::post('/superadmin/event_tickets/update/{id}/{t_id}', [App\Http\Controllers\SuperAdmin\SuAdminTktPriceController::class, 'update']);
Route::get('/superadmin/check_ticket_category',[App\Http\Controllers\SuperAdmin\SuAdminTktPriceController::class, 'validateactivity']);

//Class Fee
Route::get('/superadmin/classfee', [App\Http\Controllers\SuperAdmin\SuAdminClassFeeController::class, 'index']);
Route::get('/superadmin/classfee/create/{id}', [App\Http\Controllers\SuperAdmin\SuAdminClassFeeController::class, 'create']);
Route::get('/superadmin/classfee/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminClassFeeController::class, 'view']);
Route::get('/superadmin/classfee/edit/{ins_id}/{id}', [App\Http\Controllers\SuperAdmin\SuAdminClassFeeController::class, 'edit']);
Route::post('/superadmin/classfee/store', [App\Http\Controllers\SuperAdmin\SuAdminClassFeeController::class, 'store']);
Route::post('/superadmin/classfee/update/{id}', [App\Http\Controllers\SuperAdmin\SuAdminClassFeeController::class, 'update']);
Route::get('/superadmin/check_grade_validation',[App\Http\Controllers\SuperAdmin\SuAdminClassFeeController::class, 'validateclassfee']);

//Application Payment
Route::get('/superadmin/student/profile', [App\Http\Controllers\SuperAdmin\SuAdmStuProfileController::class, 'index']);
Route::get('/superadmin/student/profile/id', [App\Http\Controllers\SuperAdmin\SuAdmStuProfileController::class, 'auto_cmplt']);
Route::get('/superadmin/validate_profile', [App\Http\Controllers\SuperAdmin\SuAdmStuProfileController::class, 'validate_student_id']);
Route::post('/superadmin/student/find', [App\Http\Controllers\SuperAdmin\SuAdmStuProfileController::class, 'profile_search']);

//Application Payment
Route::get('superadmin/application_pay', [App\Http\Controllers\SuperAdmin\SuAdminApplicatPayController::class, 'index']);
Route::get('superadmin/application_pay/create', [App\Http\Controllers\SuperAdmin\SuAdminApplicatPayController::class, 'create']);
Route::post('superadmin/application_pay/store', [App\Http\Controllers\SuperAdmin\SuAdminApplicatPayController::class, 'store']);
Route::get('superadmin/application_pay/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminApplicatPayController::class, 'view']);
Route::get('superadmin/application_pay/print/{id}', [App\Http\Controllers\SuperAdmin\SuAdminApplicatPayController::class, 'print']);

//Activity Payment
Route::get('superadmin/activities_payments', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'index']);
Route::get('superadmin/activities_payments/create', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'create']);
Route::post('superadmin/activities_payments/store', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'store']);
Route::get('superadmin/activities_payments/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'view']);
Route::get('superadmin/activities_payments/print/{id}', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'print']);
Route::post('/superadmin/activity_price_get', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'select_price']);
Route::get('/superadmin/student_id', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'student_id']);
Route::get('/superadmin/validate-activity-pay', [App\Http\Controllers\SuperAdmin\SuAdminActiFeePayController::class, 'validate_student_id']);

//Admition
Route::get('superadmin/admition', [App\Http\Controllers\SuperAdmin\SuAdminAdmitionCon::class, 'index']);
Route::get('superadmin/admition/create', [App\Http\Controllers\SuperAdmin\SuAdminAdmitionCon::class, 'create']);
Route::post('superadmin/admition/store', [App\Http\Controllers\SuperAdmin\SuAdminAdmitionCon::class, 'store']);
//Route::get('superadmin/admition/view/{id}', [App\Http\Controllers\SuperAdmin\SuAdminAdmitionCon::class, 'view']);
Route::get('superadmin/admition/print/{id}', [App\Http\Controllers\SuperAdmin\SuAdminAdmitionCon::class, 'print']);
Route::get('/superadmin/validate-admition-pay', [App\Http\Controllers\SuperAdmin\SuAdminAdmitionCon::class, 'validate_student_id']);
Route::get('/superadmin/admition/student_id', [App\Http\Controllers\SuperAdmin\SuAdminAdmitionCon::class, 'student_id']);


//Reports application
Route::get('/superadmin/reports/application', [App\Http\Controllers\SuperAdmin\SuAdminApplicationRepotCon::class, 'index']);
Route::post('superadmin/application/date', [App\Http\Controllers\SuperAdmin\SuAdminApplicationRepotCon::class, 'date_vi']);
Route::post('superadmin/application/daterange/loard', [App\Http\Controllers\SuperAdmin\SuAdminApplicationRepotCon::class, 'date_vi']);
Route::post('superadmin/application/daterange', [App\Http\Controllers\SuperAdmin\SuAdminApplicationRepotCon::class, 'date_range']);

//Reports Due
Route::get('/superadmin/reports/school_due', [App\Http\Controllers\SuperAdmin\SuAdminReportDueController::class, 'index']);
Route::post('/superadmin/duefee/date', [App\Http\Controllers\SuperAdmin\SuAdminReportDueController::class, 'date_range']);
Route::post('superadmin/duefee/daterange', [App\Http\Controllers\SuperAdmin\SuAdminReportDueController::class, 'date_range']);

//Reports income
Route::get('superadmin/reports/income', [App\Http\Controllers\SuperAdmin\SuAdminIncomeRepotCon::class, 'index']);
Route::get('superadmin/reports/income/date', [App\Http\Controllers\SuperAdmin\SuAdminIncomeRepotCon::class, 'date_loard']);
Route::post('superadmin/income/date', [App\Http\Controllers\SuperAdmin\SuAdminIncomeRepotCon::class, 'date_vise']);
Route::post('superadmin/income/daterange', [App\Http\Controllers\SuperAdmin\SuAdminIncomeRepotCon::class, 'date_range']);

//Reports Admition
Route::get('/superadmin/reports/admition', [App\Http\Controllers\SuperAdmin\SuAdminReportAdmitionCon::class, 'index']);
Route::get('/superadmin/reports/admition/date', [App\Http\Controllers\SuperAdmin\SuAdminReportAdmitionCon::class, 'date_loard']);
Route::post('/superadmin/reports/admition/date_vise', [App\Http\Controllers\SuperAdmin\SuAdminReportAdmitionCon::class, 'date_vi']);
Route::post('/superadmin/reports/admition/daterange', [App\Http\Controllers\SuperAdmin\SuAdminReportAdmitionCon::class, 'date_range']);


});


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Registar______________________________________________________________________________________________________________________________________
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::group(['middleware' => 'App\Http\Middleware\IsRegistar'], function()
{

//User
Route::get('registar/users', [App\Http\Controllers\Registar\ReUserController::class, 'index']);
Route::get('registar/users/create', [App\Http\Controllers\Registar\ReUserController::class, 'create']);
Route::post('registar/users/store', [App\Http\Controllers\Registar\ReUserController::class, 'store']);
Route::get('registar/users/view/{id}', [App\Http\Controllers\Registar\ReUserController::class, 'view']);
Route::get('registar/users/edit/{id}', [App\Http\Controllers\Registar\ReUserController::class, 'edit']);
Route::post('registar/users/update/{id}', [App\Http\Controllers\Registar\ReUserController::class, 'update']);
Route::get('registar/users/password/{id}', [App\Http\Controllers\Registar\ReUserController::class, 'update_pas_view']);
Route::post('registar/users/password/update/{id}', [App\Http\Controllers\Registar\ReUserController::class, 'update_pasword']);
Route::get('/registar/validate-email',[App\Http\Controllers\Registar\ReUserController::class, 'emailvalidate']);
Route::get('/registar/validate-nic',[App\Http\Controllers\Registar\ReUserController::class, 'nicvalidate']);
Route::get('/registar/validate-mobile',[App\Http\Controllers\Registar\ReUserController::class, 'mobilevalidate']);
Route::post('/registar/profile_update_email', [App\Http\Controllers\Registar\ReUserController::class, 'profile_update_email_validation']);
Route::post('/registar/profile_update_mobile', [App\Http\Controllers\Registar\ReUserController::class, 'mobilevalidate_edit']);
Route::post('/registar/profile_update_nic', [App\Http\Controllers\Registar\ReUserController::class, 'edit_nicvalidate']);

//Profile
Route::get('/registar/profile', [App\Http\Controllers\Registar\ReUserController::class, 'profileView']);
Route::get('/registar/profile/update', [App\Http\Controllers\Registar\ReUserController::class, 'profileEdit']);
Route::get('/registar/profile/password', [App\Http\Controllers\Registar\ReUserController::class, 'profilePassword']);
Route::get('/registar/profile/password/edit', [App\Http\Controllers\Registar\ReUserController::class, 'profile_pass_update']);
Route::post('/registar/profile/password/update', [App\Http\Controllers\Registar\ReUserController::class, 'profilepassword_update']);
Route::post('/registar/profile/edit/update', [App\Http\Controllers\Registar\ReUserController::class, 'profile_update']);

//Institute
Route::get('/registar/institutes', [App\Http\Controllers\Registar\ReInstiController::class, 'index']);
Route::get('/registar/institutes/create', [App\Http\Controllers\Registar\ReInstiController::class, 'create']);
Route::post('/registar/institutes/store', [App\Http\Controllers\Registar\ReInstiController::class, 'store']);
Route::get('/registar/institutes/view/{id}', [App\Http\Controllers\Registar\ReInstiController::class, 'view']);
Route::get('/registar/institutes/edit/{id}', [App\Http\Controllers\Registar\ReInstiController::class, 'edit']);
Route::post('/registar/institutes/update/{id}', [App\Http\Controllers\Registar\ReInstiController::class, 'update']);
Route::get('/registar/validate-email',[App\Http\Controllers\Registar\ReInstiController::class, 'emailvalidate']);
Route::get('/registar/validate-phone',[App\Http\Controllers\Registar\ReInstiController::class, 'phonevalidate']);
Route::get('/registar/validate-name',[App\Http\Controllers\Registar\ReInstiController::class, 'namevalidate']);
Route::get('/registar/check_edit_email',[App\Http\Controllers\Registar\ReInstiController::class, 'oldemailvalidate']);
Route::get('/registar/validate-code',[App\Http\Controllers\Registar\ReInstiController::class, 'codevalidate']);
Route::post('/registar/validate_code_edit',[App\Http\Controllers\Registar\ReInstiController::class, 'edit_codevalidate']);
Route::post('/registar/validate_ins_mail_edit',[App\Http\Controllers\Registar\ReInstiController::class, 'edit_mail_validate']);
Route::post('/registar/validate_ins_cont_edit',[App\Http\Controllers\Registar\ReInstiController::class, 'edit_cont_validate']);
Route::post('/registar/validate_ins_name_edit',[App\Http\Controllers\Registar\ReInstiController::class, 'edit_name_validate']);

//Bank
Route::get('/registar/banks', [App\Http\Controllers\Registar\ReBankController::class, 'create']);
Route::post('/registar/banks/store', [App\Http\Controllers\Registar\ReBankController::class, 'store']);
Route::get('/registar/banks/edit/{id}', [App\Http\Controllers\Registar\ReBankController::class, 'edit']);
Route::post('/registar/banks/update/{id}', [App\Http\Controllers\Registar\ReBankController::class, 'update']);
Route::get('/registar/validate-bank', [App\Http\Controllers\Registar\ReBankController::class, 'validatebank']);

//Inquries
Route::get('/registar/inqueries', [App\Http\Controllers\Registar\ReInqueryController::class, 'index']);
Route::get('/registar/inqueries/create', [App\Http\Controllers\Registar\ReInqueryController::class, 'create']);
Route::post('registar/inqueries/store', [App\Http\Controllers\Registar\ReInqueryController::class, 'store']);
Route::get('/registar/inqueries/view/{pid}', [App\Http\Controllers\Registar\ReInqueryController::class, 'view']);
Route::get('/registar/inqueries/edit/{id}', [App\Http\Controllers\Registar\ReInqueryController::class, 'edit']);
Route::post('/registar/inqueries/update/{id}', [App\Http\Controllers\Registar\ReInqueryController::class, 'update']);

//Inquries Primary
Route::get('/registar/primary/inqueries', [App\Http\Controllers\Registar\RePrimaryInquController::class, 'index']);
Route::get('/registar/primary/inqueries/create', [App\Http\Controllers\Registar\RePrimaryInquController::class, 'create']);
Route::post('registar/primary/inqueries/store', [App\Http\Controllers\Registar\RePrimaryInquController::class, 'store']);
Route::get('/registar/primary/inqueries/view/{pid}', [App\Http\Controllers\Registar\RePrimaryInquController::class, 'view']);
Route::get('/registar/primary/inqueries/edit/{id}', [App\Http\Controllers\Registar\RePrimaryInquController::class, 'edit']);
Route::post('/registar/primary/inqueries/update/{id}', [App\Http\Controllers\Registar\RePrimaryInquController::class, 'update']);

//Application

Route::post('/registar/applications/update/{id}', [App\Http\Controllers\Registar\ReApplicationController::class, 'update']);

//Application Primary
Route::post('/registar/primary/applications/update/{id}', [App\Http\Controllers\Registar\RePrimaryApplicController::class, 'update']);

//student
Route::post('/registar/inqueries/registration/update/{id}', [App\Http\Controllers\Registar\ReStudentController::class, 'update']);
Route::get('/registar/student/parent2_nic', [App\Http\Controllers\Registar\ReStudentController::class, 'parent2_details']);
Route::get('/registar/student/siblins', [App\Http\Controllers\Registar\ReStudentController::class, 'siblins']);
Route::post('/registar/sibilin_temp_insert', [App\Http\Controllers\Registar\ReStudentController::class, 'temp_in']);
Route::post('/registar/school/student/update/{id}', [App\Http\Controllers\Registar\ReStudentController::class, 'update_data']);
Route::post('/registar/temp_sib_remove', [App\Http\Controllers\Registar\ReStudentController::class, 'tempremove']);
Route::post('/registar/lord_temp_edit_syblin_tbl', [App\Http\Controllers\Registar\ReStudentController::class, 'temp_edit_load']);
Route::get('/registar/school/students/table', [App\Http\Controllers\Registar\ReStudentController::class, 'index']);
Route::get('/registar/school/student/view/{id}', [App\Http\Controllers\Registar\ReStudentController::class, 'view']);
Route::get('/registar/school/student/edit/{id}', [App\Http\Controllers\Registar\ReStudentController::class, 'edit']);
Route::post('/registar/class_payment_check', [App\Http\Controllers\Registar\RePaymentController::class, 'check_payment']);

//Student Primary
Route::post('/registar/primary/inqueries/registration/update/{id}', [App\Http\Controllers\Registar\RePrimaryStudentController::class, 'update']);
Route::get('/registar/nursary/students/table', [App\Http\Controllers\Registar\RePrimaryStudentController::class, 'index']);
Route::get('/registar/nursary/student/view/{id}', [App\Http\Controllers\Registar\RePrimaryStudentController::class, 'view']);
Route::get('/registar/nursary/student/edit/{id}', [App\Http\Controllers\Registar\RePrimaryStudentController::class, 'edit']);
Route::post('/registar/nursary/student/update/{id}', [App\Http\Controllers\Registar\RePrimaryStudentController::class, 'update_nersary']);

//Scholarship
Route::get('registar/scholarship', [App\Http\Controllers\Registar\ReScholarshipController::class, 'index']);
Route::get('registar/scholarship/create', [App\Http\Controllers\Registar\ReScholarshipController::class, 'create']);
Route::post('registar/scholarship/store', [App\Http\Controllers\Registar\ReScholarshipController::class, 'store']);
Route::get('/registar/sholarship_st_id_num', [App\Http\Controllers\Registar\ReScholarshipController::class, 'autoload']);

//Student Payment
Route::get('/registar/payments', [App\Http\Controllers\Registar\RePaymentController::class, 'index']);
Route::get('/registar/payments/create', [App\Http\Controllers\Registar\RePaymentController::class, 'create']);
Route::post('/registar/payments/store', [App\Http\Controllers\Registar\RePaymentController::class, 'store']);
Route::get('/registar/payments/view', [App\Http\Controllers\Registar\RePaymentController::class, 'view']);
Route::get('/registar/payments/old/view', [App\Http\Controllers\Registar\RePaymentController::class, 'old_payment']);
Route::get('/registar/class_st_id_num', [App\Http\Controllers\Registar\RePaymentController::class, 'student_class_fee']);
Route::post('/registar/select_pay_student', [App\Http\Controllers\Registar\RePaymentController::class, 'student_select']);
Route::get('/registar/student_pay_print/{id}', [App\Http\Controllers\Registar\RePaymentController::class, 'print']);

//Academic Awards
Route::get('/registar/awards/create', [App\Http\Controllers\Registar\ReAwordsController::class, 'create']);
Route::post('/registar/awards/store', [App\Http\Controllers\Registar\ReAwordsController::class, 'store']);
Route::get('/registar/students/awards/view', [App\Http\Controllers\Registar\ReAwordsController::class, 'view']);
Route::get('/registar/students/awards/edit', [App\Http\Controllers\Registar\ReAwordsController::class, 'edit']);
Route::get('/registar/students/awards/search', [App\Http\Controllers\Registar\ReAwordsController::class, 'auto_cmplt']);

//Non Academic Awards
Route::get('/registar/nonacc/awards/create', [App\Http\Controllers\Registar\ReNonAcadAwordsController::class, 'create']);
Route::post('/registar/nonacc/awards/store', [App\Http\Controllers\Registar\ReNonAcadAwordsController::class, 'store']);
Route::get('/registar/nonacc/students/awards/view', [App\Http\Controllers\Registar\ReNonAcadAwordsController::class, 'view']);
Route::get('/registar/nonacc/students/awards/edit', [App\Http\Controllers\Registar\ReNonAcadAwordsController::class, 'edit']);
Route::get('/registar/nonacc/students/awards/search', [App\Http\Controllers\Registar\ReNonAcadAwordsController::class, 'auto_cmplt']);

// Complaints
Route::get('/registar/complaints/create', [App\Http\Controllers\Registar\ReComplaintsController::class, 'create']);
Route::get('/registar/students/complaints/view', [App\Http\Controllers\Registar\ReComplaintsController::class, 'view']);
Route::get('/registar/students/complaints/edit', [App\Http\Controllers\Registar\ReComplaintsController::class, 'edit']);
Route::get('/registar/complaints/students/search', [App\Http\Controllers\Registar\ReComplaintsController::class, 'auto_cmplt']);
Route::post('/registar/complaints/store', [App\Http\Controllers\Registar\ReComplaintsController::class, 'store']);

//Activities Pay
Route::get('/registar/activities_pay', [App\Http\Controllers\Registar\ReActivController::class, 'index']);
Route::get('/registar/activities_pay/create', [App\Http\Controllers\Registar\ReActivController::class, 'create']);
Route::get('/registar/activities_pay/view', [App\Http\Controllers\Registar\ReActivController::class, 'view']);
Route::get('/registar/activities_pay/old/view', [App\Http\Controllers\Registar\ReActivController::class, 'old_payment']);

//Activity Create
Route::get('/registar/activities', [App\Http\Controllers\Registar\ReActiviSetController::class, 'index']);
Route::get('/registar/activities/create', [App\Http\Controllers\Registar\ReActiviSetController::class, 'create']);
Route::post('/registar/activity/store', [App\Http\Controllers\Registar\ReActiviSetController::class, 'store']);
Route::get('/registar/activities/edit/{id}', [App\Http\Controllers\Registar\ReActiviSetController::class, 'edit']);
Route::post('/registar/activities/update/{id}', [App\Http\Controllers\Registar\ReActiviSetController::class, 'update']);
Route::get('/registar/validate-activity', [App\Http\Controllers\Registar\ReActiviSetController::class, 'validateactivity']);

//Event Create
Route::get('/registar/events', [App\Http\Controllers\Registar\ReEventController::class, 'index']);
Route::get('/registar/events/create', [App\Http\Controllers\Registar\ReEventController::class, 'create']);
Route::post('registar/events/store', [App\Http\Controllers\Registar\ReEventController::class, 'store']);
Route::get('/registar/events/view/{id}', [App\Http\Controllers\Registar\ReEventController::class, 'view']);
Route::get('/registar/events/edit/{id}', [App\Http\Controllers\Registar\ReEventController::class, 'edit']);
Route::post('/registar/events/update/{id}', [App\Http\Controllers\Registar\ReEventController::class, 'update']);
Route::get('/registar/events/old/view', [App\Http\Controllers\Registar\ReEventController::class, 'old_payment']);
Route::post('/registar/evt_temp_insert', [App\Http\Controllers\Registar\ReEventController::class, 'tempinsert']);

//Subject Create
Route::get('/registar/subjects', [App\Http\Controllers\Registar\ReSubjectController::class, 'create']);
Route::get('/registar/subjects/view/{id}', [App\Http\Controllers\Registar\ReSubjectController::class, 'view']);
Route::get('/registar/subjects/edit/{id}', [App\Http\Controllers\Registar\ReSubjectController::class, 'edit']);
Route::post('/registar/subjects/store', [App\Http\Controllers\Registar\ReSubjectController::class, 'store']);
Route::post('/registar/subjects/update/{id}', [App\Http\Controllers\Registar\ReSubjectController::class, 'update']);
Route::get('/registar/validate-subject',[App\Http\Controllers\Registar\ReSubjectController::class, 'subjectvalidate']);

//Event Ticket Create
Route::get('/registar/event_tickets', [App\Http\Controllers\Registar\ReTktPriceController::class, 'index']);
Route::get('/registar/event_tickets/create/{id}', [App\Http\Controllers\Registar\ReTktPriceController::class, 'create']);
Route::get('/registar/event_tickets/view/{id}', [App\Http\Controllers\Registar\ReTktPriceController::class, 'view']);
Route::get('/registar/event_tickets/edit/{id}/{t_id}', [App\Http\Controllers\Registar\ReTktPriceController::class, 'edit']);
Route::post('/registar/event_tickets/store', [App\Http\Controllers\Registar\ReTktPriceController::class, 'store']);
Route::post('/registar/event_tickets/update/{id}/{t_id}', [App\Http\Controllers\Registar\ReTktPriceController::class, 'update']);
Route::get('/registar/check_ticket_category',[App\Http\Controllers\Registar\ReTktPriceController::class, 'validateactivity']);

//Class Fee
Route::get('/registar/classfee', [App\Http\Controllers\Registar\ReClassFeeController::class, 'index']);
Route::get('/registar/classfee/create/{id}', [App\Http\Controllers\Registar\ReClassFeeController::class, 'create']);
Route::get('/registar/classfee/view/{id}', [App\Http\Controllers\Registar\ReClassFeeController::class, 'view']);
Route::get('/registar/classfee/edit/{ins_id}/{id}', [App\Http\Controllers\Registar\ReClassFeeController::class, 'edit']);
Route::post('/registar/classfee/store', [App\Http\Controllers\Registar\ReClassFeeController::class, 'store']);
Route::post('/registar/classfee/update/{id}', [App\Http\Controllers\Registar\ReClassFeeController::class, 'update']);
Route::get('/registar/check_grade_validation',[App\Http\Controllers\Registar\ReClassFeeController::class, 'validateclassfee']);

//Application Payment
Route::get('/registar/student/profile', [App\Http\Controllers\Registar\ReStuProfileController::class, 'index']);
Route::get('/registar/student/profile/id', [App\Http\Controllers\Registar\ReStuProfileController::class, 'auto_cmplt']);
Route::get('/registar/validate_profile', [App\Http\Controllers\Registar\ReStuProfileController::class, 'validate_student_id']);
Route::post('/registar/student/find', [App\Http\Controllers\Registar\ReStuProfileController::class, 'profile_search']);

//Application Payment
Route::get('registar/application_pay', [App\Http\Controllers\Registar\ReApplicatPayController::class, 'index']);
Route::get('registar/application_pay/create', [App\Http\Controllers\Registar\ReApplicatPayController::class, 'create']);
Route::post('registar/application_pay/store', [App\Http\Controllers\Registar\ReApplicatPayController::class, 'store']);
Route::get('registar/application_pay/view/{id}', [App\Http\Controllers\Registar\ReApplicatPayController::class, 'view']);
Route::get('registar/application_pay/print/{id}', [App\Http\Controllers\Registar\ReApplicatPayController::class, 'print']);

//Activity Payment
Route::get('registar/activities_payments', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'index']);
Route::get('registar/activities_payments/create', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'create']);
Route::post('registar/activities_payments/store', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'store']);
Route::get('registar/activities_payments/view/{id}', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'view']);
Route::get('registar/activities_payments/print/{id}', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'print']);
Route::post('/registar/activity_price_get', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'select_price']);
Route::get('/registar/student_id', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'student_id']);
Route::get('/registar/validate-activity-pay', [App\Http\Controllers\Registar\ReActiFeePayController::class, 'validate_student_id']);

});

//Admition
Route::get('registar/admition', [App\Http\Controllers\Registar\ReAdmitionCon::class, 'index']);
Route::get('registar/admition/create', [App\Http\Controllers\Registar\ReAdmitionCon::class, 'create']);
Route::post('registar/admition/store', [App\Http\Controllers\Registar\ReAdmitionCon::class, 'store']);
//Route::get('registar/admition/view/{id}', [App\Http\Controllers\Registar\ReAdmitionCon::class, 'view']);
Route::get('registar/admition/print/{id}', [App\Http\Controllers\Registar\ReAdmitionCon::class, 'print']);
Route::get('/registar/validate-admition-pay', [App\Http\Controllers\Registar\ReAdmitionCon::class, 'validate_student_id']);
Route::get('/registar/admition/student_id', [App\Http\Controllers\Registar\ReAdmitionCon::class, 'student_id']);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Deputy Registar______________________________________________________________________________________________________________________________________
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::group(['middleware' => 'App\Http\Middleware\IsDeputyRegistar'], function()
{

//User
Route::get('de_registar/users', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'index']);
Route::get('de_registar/users/create', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'create']);
Route::post('de_registar/users/store', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'store']);
Route::get('de_registar/users/view/{id}', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'view']);
Route::get('de_registar/users/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'edit']);
Route::post('de_registar/users/update/{id}', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'update']);
Route::get('de_registar/users/password/{id}', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'update_pas_view']);
Route::post('de_registar/users/password/update/{id}', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'update_pasword']);
Route::get('/de_registar/validate-email',[App\Http\Controllers\DeputyRegitar\DeUserController::class, 'emailvalidate']);
Route::get('/de_registar/validate-nic',[App\Http\Controllers\DeputyRegitar\DeUserController::class, 'nicvalidate']);
Route::get('/de_registar/validate-mobile',[App\Http\Controllers\DeputyRegitar\DeUserController::class, 'mobilevalidate']);
Route::post('/de_registar/profile_update_email', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'profile_update_email_validation']);
Route::post('/de_registar/profile_update_mobile', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'mobilevalidate_edit']);
Route::post('/de_registar/profile_update_nic', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'edit_nicvalidate']);

//Profile
Route::get('/de_registar/profile', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'profileView']);
Route::get('/de_registar/profile/update', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'profileEdit']);
Route::get('/de_registar/profile/password', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'profilePassword']);
Route::get('/de_registar/profile/password/edit', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'profile_pass_update']);
Route::post('/de_registar/profile/password/update', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'profilepassword_update']);
Route::post('/de_registar/profile/edit/update', [App\Http\Controllers\DeputyRegitar\DeUserController::class, 'profile_update']);

//Institute
Route::get('/de_registar/institutes', [App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'index']);
Route::get('/de_registar/institutes/create', [App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'create']);
Route::post('/de_registar/institutes/store', [App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'store']);
Route::get('/de_registar/institutes/view/{id}', [App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'view']);
Route::get('/de_registar/institutes/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'edit']);
Route::post('/de_registar/institutes/update/{id}', [App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'update']);
Route::get('/de_registar/validate-email',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'emailvalidate']);
Route::get('/de_registar/validate-phone',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'phonevalidate']);
Route::get('/de_registar/validate-name',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'namevalidate']);
Route::get('/de_registar/check_edit_email',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'oldemailvalidate']);
Route::get('/de_registar/validate-code',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'codevalidate']);
Route::post('/de_registar/validate_code_edit',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'edit_codevalidate']);
Route::post('/de_registar/validate_ins_mail_edit',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'edit_mail_validate']);
Route::post('/de_registar/validate_ins_cont_edit',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'edit_cont_validate']);
Route::post('/de_registar/validate_ins_name_edit',[App\Http\Controllers\DeputyRegitar\DeInstiController::class, 'edit_name_validate']);

//Bank
Route::get('/de_registar/banks', [App\Http\Controllers\DeputyRegitar\DeBankController::class, 'create']);
Route::post('/de_registar/banks/store', [App\Http\Controllers\DeputyRegitar\DeBankController::class, 'store']);
Route::get('/de_registar/banks/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeBankController::class, 'edit']);
Route::post('/de_registar/banks/update/{id}', [App\Http\Controllers\DeputyRegitar\DeBankController::class, 'update']);
Route::get('/de_registar/validate-bank', [App\Http\Controllers\DeputyRegitar\DeBankController::class, 'validatebank']);

//Inquries
Route::get('/de_registar/inqueries', [App\Http\Controllers\DeputyRegitar\DeInqueryController::class, 'index']);
Route::get('/de_registar/inqueries/create', [App\Http\Controllers\DeputyRegitar\DeInqueryController::class, 'create']);
Route::post('de_registar/inqueries/store', [App\Http\Controllers\DeputyRegitar\DeInqueryController::class, 'store']);
Route::get('/de_registar/inqueries/view/{pid}', [App\Http\Controllers\DeputyRegitar\DeInqueryController::class, 'view']);
Route::get('/de_registar/inqueries/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeInqueryController::class, 'edit']);
Route::post('/de_registar/inqueries/update/{id}', [App\Http\Controllers\DeputyRegitar\DeInqueryController::class, 'update']);

//Inquries Primary
Route::get('/de_registar/primary/inqueries', [App\Http\Controllers\DeputyRegitar\DePrimaryInquController::class, 'index']);
Route::get('/de_registar/primary/inqueries/create', [App\Http\Controllers\DeputyRegitar\DePrimaryInquController::class, 'create']);
Route::post('de_registar/primary/inqueries/store', [App\Http\Controllers\DeputyRegitar\DePrimaryInquController::class, 'store']);
Route::get('/de_registar/primary/inqueries/view/{pid}', [App\Http\Controllers\DeputyRegitar\DePrimaryInquController::class, 'view']);
Route::get('/de_registar/primary/inqueries/edit/{id}', [App\Http\Controllers\DeputyRegitar\DePrimaryInquController::class, 'edit']);
Route::post('/de_registar/primary/inqueries/update/{id}', [App\Http\Controllers\DeputyRegitar\DePrimaryInquController::class, 'update']);

//Application

Route::post('/de_registar/applications/update/{id}', [App\Http\Controllers\DeputyRegitar\DeApplicationController::class, 'update']);

//Application Primary
Route::post('/de_registar/primary/applications/update/{id}', [App\Http\Controllers\DeputyRegitar\DePrimaryApplicController::class, 'update']);

//student
Route::post('/de_registar/inqueries/registration/update/{id}', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'update']);
Route::get('/de_registar/student/parent2_nic', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'parent2_details']);
Route::get('/de_registar/student/siblins', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'siblins']);
Route::post('/de_registar/sibilin_temp_insert', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'temp_in']);
Route::post('/de_registar/school/student/update/{id}', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'update_data']);
Route::post('/de_registar/temp_sib_remove', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'tempremove']);
Route::post('/de_registar/lord_temp_edit_syblin_tbl', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'temp_edit_load']);
Route::get('/de_registar/school/students/table', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'index']);
Route::get('/de_registar/school/student/view/{id}', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'view']);
Route::get('/de_registar/school/student/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeStudentController::class, 'edit']);
Route::post('/de_registar/class_payment_check', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'check_payment']);

//Student Primary
Route::post('/de_registar/primary/inqueries/registration/update/{id}', [App\Http\Controllers\DeputyRegitar\DePrimaryStudentController::class, 'update']);
Route::get('/de_registar/nursary/students/table', [App\Http\Controllers\DeputyRegitar\DePrimaryStudentController::class, 'index']);
Route::get('/de_registar/nursary/student/view/{id}', [App\Http\Controllers\DeputyRegitar\DePrimaryStudentController::class, 'view']);
Route::get('/de_registar/nursary/student/edit/{id}', [App\Http\Controllers\DeputyRegitar\DePrimaryStudentController::class, 'edit']);
Route::post('/de_registar/nursary/student/update/{id}', [App\Http\Controllers\DeputyRegitar\DePrimaryStudentController::class, 'update_nersary']);

//Scholarship
Route::get('de_registar/scholarship', [App\Http\Controllers\DeputyRegitar\DeScholarshipController::class, 'index']);
Route::get('de_registar/scholarship/create', [App\Http\Controllers\DeputyRegitar\DeScholarshipController::class, 'create']);
Route::post('de_registar/scholarship/store', [App\Http\Controllers\DeputyRegitar\DeScholarshipController::class, 'store']);
Route::get('/de_registar/sholarship_st_id_num', [App\Http\Controllers\DeputyRegitar\DeScholarshipController::class, 'autoload']);

//Student Payment
Route::get('/de_registar/payments', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'index']);
Route::get('/de_registar/payments/create', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'create']);
Route::post('/de_registar/payments/store', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'store']);
Route::get('/de_registar/payments/view', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'view']);
Route::get('/de_registar/payments/old/view', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'old_payment']);
Route::get('/de_registar/class_st_id_num', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'student_class_fee']);
Route::post('/de_registar/select_pay_student', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'student_select']);
Route::get('/de_registar/student_pay_print/{id}', [App\Http\Controllers\DeputyRegitar\DePaymentController::class, 'print']);

//Academic Awards
Route::get('/de_registar/awards/create', [App\Http\Controllers\DeputyRegitar\DeAwordsController::class, 'create']);
Route::post('/de_registar/awards/store', [App\Http\Controllers\DeputyRegitar\DeAwordsController::class, 'store']);
Route::get('/de_registar/students/awards/view', [App\Http\Controllers\DeputyRegitar\DeAwordsController::class, 'view']);
Route::get('/de_registar/students/awards/edit', [App\Http\Controllers\DeputyRegitar\DeAwordsController::class, 'edit']);
Route::get('/de_registar/students/awards/search', [App\Http\Controllers\DeputyRegitar\DeAwordsController::class, 'auto_cmplt']);

//Non Academic Awards
Route::get('/de_registar/nonacc/awards/create', [App\Http\Controllers\DeputyRegitar\DeNonAcadAwordsController::class, 'create']);
Route::post('/de_registar/nonacc/awards/store', [App\Http\Controllers\DeputyRegitar\DeNonAcadAwordsController::class, 'store']);
Route::get('/de_registar/nonacc/students/awards/view', [App\Http\Controllers\DeputyRegitar\DeNonAcadAwordsController::class, 'view']);
Route::get('/de_registar/nonacc/students/awards/edit', [App\Http\Controllers\DeputyRegitar\DeNonAcadAwordsController::class, 'edit']);
Route::get('/de_registar/nonacc/students/awards/search', [App\Http\Controllers\DeputyRegitar\DeNonAcadAwordsController::class, 'auto_cmplt']);

// Complaints
Route::get('/de_registar/complaints/create', [App\Http\Controllers\DeputyRegitar\DeComplaintsController::class, 'create']);
Route::get('/de_registar/students/complaints/view', [App\Http\Controllers\DeputyRegitar\DeComplaintsController::class, 'view']);
Route::get('/de_registar/students/complaints/edit', [App\Http\Controllers\DeputyRegitar\DeComplaintsController::class, 'edit']);
Route::get('/de_registar/complaints/students/search', [App\Http\Controllers\DeputyRegitar\DeComplaintsController::class, 'auto_cmplt']);
Route::post('/de_registar/complaints/store', [App\Http\Controllers\DeputyRegitar\DeComplaintsController::class, 'store']);

//Activities Pay
Route::get('/de_registar/activities_pay', [App\Http\Controllers\DeputyRegitar\DeActivController::class, 'index']);
Route::get('/de_registar/activities_pay/create', [App\Http\Controllers\DeputyRegitar\DeActivController::class, 'create']);
Route::get('/de_registar/activities_pay/view', [App\Http\Controllers\DeputyRegitar\DeActivController::class, 'view']);
Route::get('/de_registar/activities_pay/old/view', [App\Http\Controllers\DeputyRegitar\DeActivController::class, 'old_payment']);

//Activity Create
Route::get('/de_registar/activities', [App\Http\Controllers\DeputyRegitar\DeActiviSetController::class, 'index']);
Route::get('/de_registar/activities/create', [App\Http\Controllers\DeputyRegitar\DeActiviSetController::class, 'create']);
Route::post('/de_registar/activity/store', [App\Http\Controllers\DeputyRegitar\DeActiviSetController::class, 'store']);
Route::get('/de_registar/activities/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeActiviSetController::class, 'edit']);
Route::post('/de_registar/activities/update/{id}', [App\Http\Controllers\DeputyRegitar\DeActiviSetController::class, 'update']);
Route::get('/de_registar/validate-activity', [App\Http\Controllers\DeputyRegitar\DeActiviSetController::class, 'validateactivity']);

//Event Create
Route::get('/de_registar/events', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'index']);
Route::get('/de_registar/events/create', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'create']);
Route::post('de_registar/events/store', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'store']);
Route::get('/de_registar/events/view/{id}', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'view']);
Route::get('/de_registar/events/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'edit']);
Route::post('/de_registar/events/update/{id}', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'update']);
Route::get('/de_registar/events/old/view', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'old_payment']);
Route::post('/de_registar/evt_temp_insert', [App\Http\Controllers\DeputyRegitar\DeEventController::class, 'tempinsert']);

//Subject Create
Route::get('/de_registar/subjects', [App\Http\Controllers\DeputyRegitar\DeSubjectController::class, 'create']);
Route::get('/de_registar/subjects/view/{id}', [App\Http\Controllers\DeputyRegitar\DeSubjectController::class, 'view']);
Route::get('/de_registar/subjects/edit/{id}', [App\Http\Controllers\DeputyRegitar\DeSubjectController::class, 'edit']);
Route::post('/de_registar/subjects/store', [App\Http\Controllers\DeputyRegitar\DeSubjectController::class, 'store']);
Route::post('/de_registar/subjects/update/{id}', [App\Http\Controllers\DeputyRegitar\DeSubjectController::class, 'update']);
Route::get('/de_registar/validate-subject',[App\Http\Controllers\DeputyRegitar\DeSubjectController::class, 'subjectvalidate']);

//Event Ticket Create
Route::get('/de_registar/event_tickets', [App\Http\Controllers\DeputyRegitar\DeTktPriceController::class, 'index']);
Route::get('/de_registar/event_tickets/create/{id}', [App\Http\Controllers\DeputyRegitar\DeTktPriceController::class, 'create']);
Route::get('/de_registar/event_tickets/view/{id}', [App\Http\Controllers\DeputyRegitar\DeTktPriceController::class, 'view']);
Route::get('/de_registar/event_tickets/edit/{id}/{t_id}', [App\Http\Controllers\DeputyRegitar\DeTktPriceController::class, 'edit']);
Route::post('/de_registar/event_tickets/store', [App\Http\Controllers\DeputyRegitar\DeTktPriceController::class, 'store']);
Route::post('/de_registar/event_tickets/update/{id}/{t_id}', [App\Http\Controllers\DeputyRegitar\DeTktPriceController::class, 'update']);
Route::get('/de_registar/check_ticket_category',[App\Http\Controllers\DeputyRegitar\DeTktPriceController::class, 'validateactivity']);

//Class Fee
Route::get('/de_registar/classfee', [App\Http\Controllers\DeputyRegitar\DeClassFeeController::class, 'index']);
Route::get('/de_registar/classfee/create/{id}', [App\Http\Controllers\DeputyRegitar\DeClassFeeController::class, 'create']);
Route::get('/de_registar/classfee/view/{id}', [App\Http\Controllers\DeputyRegitar\DeClassFeeController::class, 'view']);
Route::get('/de_registar/classfee/edit/{ins_id}/{id}', [App\Http\Controllers\DeputyRegitar\DeClassFeeController::class, 'edit']);
Route::post('/de_registar/classfee/store', [App\Http\Controllers\DeputyRegitar\DeClassFeeController::class, 'store']);
Route::post('/de_registar/classfee/update/{id}', [App\Http\Controllers\DeputyRegitar\DeClassFeeController::class, 'update']);
Route::get('/de_registar/check_grade_validation',[App\Http\Controllers\DeputyRegitar\DeClassFeeController::class, 'validateclassfee']);

//Application Payment
Route::get('/de_registar/student/profile', [App\Http\Controllers\DeputyRegitar\DeStuProfileController::class, 'index']);
Route::get('/de_registar/student/profile/id', [App\Http\Controllers\DeputyRegitar\DeStuProfileController::class, 'auto_cmplt']);
Route::get('/de_registar/validate_profile', [App\Http\Controllers\DeputyRegitar\DeStuProfileController::class, 'validate_student_id']);
Route::post('/de_registar/student/find', [App\Http\Controllers\DeputyRegitar\DeStuProfileController::class, 'profile_search']);

//Application Payment
Route::get('de_registar/application_pay', [App\Http\Controllers\DeputyRegitar\DeApplicatPayController::class, 'index']);
Route::get('de_registar/application_pay/create', [App\Http\Controllers\DeputyRegitar\DeApplicatPayController::class, 'create']);
Route::post('de_registar/application_pay/store', [App\Http\Controllers\DeputyRegitar\DeApplicatPayController::class, 'store']);
Route::get('de_registar/application_pay/view/{id}', [App\Http\Controllers\DeputyRegitar\DeApplicatPayController::class, 'view']);
Route::get('de_registar/application_pay/print/{id}', [App\Http\Controllers\DeputyRegitar\DeApplicatPayController::class, 'print']);

//Activity Payment
Route::get('de_registar/activities_payments', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'index']);
Route::get('de_registar/activities_payments/create', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'create']);
Route::post('de_registar/activities_payments/store', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'store']);
Route::get('de_registar/activities_payments/view/{id}', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'view']);
Route::get('de_registar/activities_payments/print/{id}', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'print']);
Route::post('/de_registar/activity_price_get', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'select_price']);
Route::get('/de_registar/student_id', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'student_id']);
Route::get('/de_registar/validate-activity-pay', [App\Http\Controllers\DeputyRegitar\DeActiFeePayController::class, 'validate_student_id']);

});

//Admition
Route::get('de_registar/admition', [App\Http\Controllers\DeputyRegitar\DeAdmitionCon::class, 'index']);
Route::get('de_registar/admition/create', [App\Http\Controllers\DeputyRegitar\DeAdmitionCon::class, 'create']);
Route::post('de_registar/admition/store', [App\Http\Controllers\DeputyRegitar\DeAdmitionCon::class, 'store']);
//Route::get('de_registar/admition/view/{id}', [App\Http\Controllers\DeputyRegitar\DeAdmitionCon::class, 'view']);
Route::get('de_registar/admition/print/{id}', [App\Http\Controllers\DeputyRegitar\DeAdmitionCon::class, 'print']);
Route::get('/de_registar/validate-admition-pay', [App\Http\Controllers\DeputyRegitar\DeAdmitionCon::class, 'validate_student_id']);
Route::get('/de_registar/admition/student_id', [App\Http\Controllers\DeputyRegitar\DeAdmitionCon::class, 'student_id']);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//accountant______________________________________________________________________________________________________________________________________
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::group(['middleware' => 'App\Http\Middleware\IsAccountant'], function()
{

//User
Route::get('accountant/users', [App\Http\Controllers\Accountant\AccUserController::class, 'index']);
Route::get('accountant/users/create', [App\Http\Controllers\Accountant\AccUserController::class, 'create']);
Route::post('accountant/users/store', [App\Http\Controllers\Accountant\AccUserController::class, 'store']);
Route::get('accountant/users/view/{id}', [App\Http\Controllers\Accountant\AccUserController::class, 'view']);
Route::get('accountant/users/edit/{id}', [App\Http\Controllers\Accountant\AccUserController::class, 'edit']);
Route::post('accountant/users/update/{id}', [App\Http\Controllers\Accountant\AccUserController::class, 'update']);
Route::get('accountant/users/password/{id}', [App\Http\Controllers\Accountant\AccUserController::class, 'update_pas_view']);
Route::post('accountant/users/password/update/{id}', [App\Http\Controllers\Accountant\AccUserController::class, 'update_pasword']);
Route::get('/accountant/validate-email',[App\Http\Controllers\Accountant\AccUserController::class, 'emailvalidate']);
Route::get('/accountant/validate-nic',[App\Http\Controllers\Accountant\AccUserController::class, 'nicvalidate']);
Route::get('/accountant/validate-mobile',[App\Http\Controllers\Accountant\AccUserController::class, 'mobilevalidate']);
Route::post('/accountant/profile_update_email', [App\Http\Controllers\Accountant\AccUserController::class, 'profile_update_email_validation']);
Route::post('/accountant/profile_update_mobile', [App\Http\Controllers\Accountant\AccUserController::class, 'mobilevalidate_edit']);
Route::post('/accountant/profile_update_nic', [App\Http\Controllers\Accountant\AccUserController::class, 'edit_nicvalidate']);

//Profile
Route::get('/accountant/profile', [App\Http\Controllers\Accountant\AccUserController::class, 'profileView']);
Route::get('/accountant/profile/update', [App\Http\Controllers\Accountant\AccUserController::class, 'profileEdit']);
Route::get('/accountant/profile/password', [App\Http\Controllers\Accountant\AccUserController::class, 'profilePassword']);
Route::get('/accountant/profile/password/edit', [App\Http\Controllers\Accountant\AccUserController::class, 'profile_pass_update']);
Route::post('/accountant/profile/password/update', [App\Http\Controllers\Accountant\AccUserController::class, 'profilepassword_update']);
Route::post('/accountant/profile/edit/update', [App\Http\Controllers\Accountant\AccUserController::class, 'profile_update']);

//Institute
Route::get('/accountant/institutes', [App\Http\Controllers\Accountant\AccInstiController::class, 'index']);
Route::get('/accountant/institutes/create', [App\Http\Controllers\Accountant\AccInstiController::class, 'create']);
Route::post('/accountant/institutes/store', [App\Http\Controllers\Accountant\AccInstiController::class, 'store']);
Route::get('/accountant/institutes/view/{id}', [App\Http\Controllers\Accountant\AccInstiController::class, 'view']);
Route::get('/accountant/institutes/edit/{id}', [App\Http\Controllers\Accountant\AccInstiController::class, 'edit']);
Route::post('/accountant/institutes/update/{id}', [App\Http\Controllers\Accountant\AccInstiController::class, 'update']);
Route::get('/accountant/validate-email',[App\Http\Controllers\Accountant\AccInstiController::class, 'emailvalidate']);
Route::get('/accountant/validate-phone',[App\Http\Controllers\Accountant\AccInstiController::class, 'phonevalidate']);
Route::get('/accountant/validate-name',[App\Http\Controllers\Accountant\AccInstiController::class, 'namevalidate']);
Route::get('/accountant/check_edit_email',[App\Http\Controllers\Accountant\AccInstiController::class, 'oldemailvalidate']);
Route::get('/accountant/validate-code',[App\Http\Controllers\Accountant\AccInstiController::class, 'codevalidate']);
Route::post('/accountant/validate_code_edit',[App\Http\Controllers\Accountant\AccInstiController::class, 'edit_codevalidate']);
Route::post('/accountant/validate_ins_mail_edit',[App\Http\Controllers\Accountant\AccInstiController::class, 'edit_mail_validate']);
Route::post('/accountant/validate_ins_cont_edit',[App\Http\Controllers\Accountant\AccInstiController::class, 'edit_cont_validate']);
Route::post('/accountant/validate_ins_name_edit',[App\Http\Controllers\Accountant\AccInstiController::class, 'edit_name_validate']);

//Bank
Route::get('/accountant/banks', [App\Http\Controllers\Accountant\AccBankController::class, 'create']);
Route::post('/accountant/banks/store', [App\Http\Controllers\Accountant\AccBankController::class, 'store']);
Route::get('/accountant/banks/edit/{id}', [App\Http\Controllers\Accountant\AccBankController::class, 'edit']);
Route::post('/accountant/banks/update/{id}', [App\Http\Controllers\Accountant\AccBankController::class, 'update']);
Route::get('/accountant/validate-bank', [App\Http\Controllers\Accountant\AccBankController::class, 'validatebank']);

//Inquries
Route::get('/accountant/inqueries', [App\Http\Controllers\Accountant\AccInqueryController::class, 'index']);
Route::get('/accountant/inqueries/create', [App\Http\Controllers\Accountant\AccInqueryController::class, 'create']);
Route::post('accountant/inqueries/store', [App\Http\Controllers\Accountant\AccInqueryController::class, 'store']);
Route::get('/accountant/inqueries/view/{pid}', [App\Http\Controllers\Accountant\AccInqueryController::class, 'view']);
Route::get('/accountant/inqueries/edit/{id}', [App\Http\Controllers\Accountant\AccInqueryController::class, 'edit']);
Route::post('/accountant/inqueries/update/{id}', [App\Http\Controllers\Accountant\AccInqueryController::class, 'update']);

//Inquries Primary
Route::get('/accountant/primary/inqueries', [App\Http\Controllers\Accountant\AccPrimaryInquController::class, 'index']);
Route::get('/accountant/primary/inqueries/create', [App\Http\Controllers\Accountant\AccPrimaryInquController::class, 'create']);
Route::post('accountant/primary/inqueries/store', [App\Http\Controllers\Accountant\AccPrimaryInquController::class, 'store']);
Route::get('/accountant/primary/inqueries/view/{pid}', [App\Http\Controllers\Accountant\AccPrimaryInquController::class, 'view']);
Route::get('/accountant/primary/inqueries/edit/{id}', [App\Http\Controllers\Accountant\AccPrimaryInquController::class, 'edit']);
Route::post('/accountant/primary/inqueries/update/{id}', [App\Http\Controllers\Accountant\AccPrimaryInquController::class, 'update']);

//Application

Route::post('/accountant/applications/update/{id}', [App\Http\Controllers\Accountant\AccApplicationController::class, 'update']);

//Application Primary
Route::post('/accountant/primary/applications/update/{id}', [App\Http\Controllers\Accountant\AccPrimaryApplicController::class, 'update']);

//student
Route::post('/accountant/inqueries/registration/update/{id}', [App\Http\Controllers\Accountant\AccStudentController::class, 'update']);
Route::get('/accountant/student/parent2_nic', [App\Http\Controllers\Accountant\AccStudentController::class, 'parent2_details']);
Route::get('/accountant/student/siblins', [App\Http\Controllers\Accountant\AccStudentController::class, 'siblins']);
Route::post('/accountant/sibilin_temp_insert', [App\Http\Controllers\Accountant\AccStudentController::class, 'temp_in']);
Route::post('/accountant/school/student/update/{id}', [App\Http\Controllers\Accountant\AccStudentController::class, 'update_data']);
Route::post('/accountant/temp_sib_remove', [App\Http\Controllers\Accountant\AccStudentController::class, 'tempremove']);
Route::post('/accountant/lord_temp_edit_syblin_tbl', [App\Http\Controllers\Accountant\AccStudentController::class, 'temp_edit_load']);
Route::get('/accountant/school/students/table', [App\Http\Controllers\Accountant\AccStudentController::class, 'index']);
Route::get('/accountant/school/student/view/{id}', [App\Http\Controllers\Accountant\AccStudentController::class, 'view']);
Route::get('/accountant/school/student/edit/{id}', [App\Http\Controllers\Accountant\AccStudentController::class, 'edit']);
Route::post('/accountant/class_payment_check', [App\Http\Controllers\Accountant\AccPaymentController::class, 'check_payment']);

//Student Primary
Route::post('/accountant/primary/inqueries/registration/update/{id}', [App\Http\Controllers\Accountant\AccPrimaryStudentController::class, 'update']);
Route::get('/accountant/nursary/students/table', [App\Http\Controllers\Accountant\AccPrimaryStudentController::class, 'index']);
Route::get('/accountant/nursary/student/view/{id}', [App\Http\Controllers\Accountant\AccPrimaryStudentController::class, 'view']);
Route::get('/accountant/nursary/student/edit/{id}', [App\Http\Controllers\Accountant\AccPrimaryStudentController::class, 'edit']);
Route::post('/accountant/nursary/student/update/{id}', [App\Http\Controllers\Accountant\AccPrimaryStudentController::class, 'update_nersary']);

//Scholarship
Route::get('accountant/scholarship', [App\Http\Controllers\Accountant\AccScholarshipController::class, 'index']);
Route::get('accountant/scholarship/create', [App\Http\Controllers\Accountant\AccScholarshipController::class, 'create']);
Route::post('accountant/scholarship/store', [App\Http\Controllers\Accountant\AccScholarshipController::class, 'store']);
Route::get('/accountant/sholarship_st_id_num', [App\Http\Controllers\Accountant\AccScholarshipController::class, 'autoload']);

//Student Payment
Route::get('/accountant/payments', [App\Http\Controllers\Accountant\AccPaymentController::class, 'index']);
Route::get('/accountant/payments/create', [App\Http\Controllers\Accountant\AccPaymentController::class, 'create']);
Route::post('/accountant/payments/store', [App\Http\Controllers\Accountant\AccPaymentController::class, 'store']);
Route::get('/accountant/payments/view', [App\Http\Controllers\Accountant\AccPaymentController::class, 'view']);
Route::get('/accountant/payments/old/view', [App\Http\Controllers\Accountant\AccPaymentController::class, 'old_payment']);
Route::get('/accountant/class_st_id_num', [App\Http\Controllers\Accountant\AccPaymentController::class, 'student_class_fee']);
Route::post('/accountant/select_pay_student', [App\Http\Controllers\Accountant\AccPaymentController::class, 'student_select']);
Route::get('/accountant/student_pay_print/{id}', [App\Http\Controllers\Accountant\AccPaymentController::class, 'print']);

//Academic Awards
Route::get('/accountant/awards/create', [App\Http\Controllers\Accountant\AccAwordsController::class, 'create']);
Route::post('/accountant/awards/store', [App\Http\Controllers\Accountant\AccAwordsController::class, 'store']);
Route::get('/accountant/students/awards/view', [App\Http\Controllers\Accountant\AccAwordsController::class, 'view']);
Route::get('/accountant/students/awards/edit', [App\Http\Controllers\Accountant\AccAwordsController::class, 'edit']);
Route::get('/accountant/students/awards/search', [App\Http\Controllers\Accountant\AccAwordsController::class, 'auto_cmplt']);

//Non Academic Awards
Route::get('/accountant/nonacc/awards/create', [App\Http\Controllers\Accountant\AccNonAcadAwordsController::class, 'create']);
Route::post('/accountant/nonacc/awards/store', [App\Http\Controllers\Accountant\AccNonAcadAwordsController::class, 'store']);
Route::get('/accountant/nonacc/students/awards/view', [App\Http\Controllers\Accountant\AccNonAcadAwordsController::class, 'view']);
Route::get('/accountant/nonacc/students/awards/edit', [App\Http\Controllers\Accountant\AccNonAcadAwordsController::class, 'edit']);
Route::get('/accountant/nonacc/students/awards/search', [App\Http\Controllers\Accountant\AccNonAcadAwordsController::class, 'auto_cmplt']);

// Complaints
Route::get('/accountant/complaints/create', [App\Http\Controllers\Accountant\AccComplaintsController::class, 'create']);
Route::get('/accountant/students/complaints/view', [App\Http\Controllers\Accountant\AccComplaintsController::class, 'view']);
Route::get('/accountant/students/complaints/edit', [App\Http\Controllers\Accountant\AccComplaintsController::class, 'edit']);
Route::get('/accountant/complaints/students/search', [App\Http\Controllers\Accountant\AccComplaintsController::class, 'auto_cmplt']);
Route::post('/accountant/complaints/store', [App\Http\Controllers\Accountant\AccComplaintsController::class, 'store']);

//Activities Pay
Route::get('/accountant/activities_pay', [App\Http\Controllers\Accountant\AccActivController::class, 'index']);
Route::get('/accountant/activities_pay/create', [App\Http\Controllers\Accountant\AccActivController::class, 'create']);
Route::get('/accountant/activities_pay/view', [App\Http\Controllers\Accountant\AccActivController::class, 'view']);
Route::get('/accountant/activities_pay/old/view', [App\Http\Controllers\Accountant\AccActivController::class, 'old_payment']);

//Activity Create
Route::get('/accountant/activities', [App\Http\Controllers\Accountant\AccActiviSetController::class, 'index']);
Route::get('/accountant/activities/create', [App\Http\Controllers\Accountant\AccActiviSetController::class, 'create']);
Route::post('/accountant/activity/store', [App\Http\Controllers\Accountant\AccActiviSetController::class, 'store']);
Route::get('/accountant/activities/edit/{id}', [App\Http\Controllers\Accountant\AccActiviSetController::class, 'edit']);
Route::post('/accountant/activities/update/{id}', [App\Http\Controllers\Accountant\AccActiviSetController::class, 'update']);
Route::get('/accountant/validate-activity', [App\Http\Controllers\Accountant\AccActiviSetController::class, 'validateactivity']);

//Event Create
Route::get('/accountant/events', [App\Http\Controllers\Accountant\AccEventController::class, 'index']);
Route::get('/accountant/events/create', [App\Http\Controllers\Accountant\AccEventController::class, 'create']);
Route::post('accountant/events/store', [App\Http\Controllers\Accountant\AccEventController::class, 'store']);
Route::get('/accountant/events/view/{id}', [App\Http\Controllers\Accountant\AccEventController::class, 'view']);
Route::get('/accountant/events/edit/{id}', [App\Http\Controllers\Accountant\AccEventController::class, 'edit']);
Route::post('/accountant/events/update/{id}', [App\Http\Controllers\Accountant\AccEventController::class, 'update']);
Route::get('/accountant/events/old/view', [App\Http\Controllers\Accountant\AccEventController::class, 'old_payment']);
Route::post('/accountant/evt_temp_insert', [App\Http\Controllers\Accountant\AccEventController::class, 'tempinsert']);

//Subject Create
Route::get('/accountant/subjects', [App\Http\Controllers\Accountant\AccSubjectController::class, 'create']);
Route::get('/accountant/subjects/view/{id}', [App\Http\Controllers\Accountant\AccSubjectController::class, 'view']);
Route::get('/accountant/subjects/edit/{id}', [App\Http\Controllers\Accountant\AccSubjectController::class, 'edit']);
Route::post('/accountant/subjects/store', [App\Http\Controllers\Accountant\AccSubjectController::class, 'store']);
Route::post('/accountant/subjects/update/{id}', [App\Http\Controllers\Accountant\AccSubjectController::class, 'update']);
Route::get('/accountant/validate-subject',[App\Http\Controllers\Accountant\AccSubjectController::class, 'subjectvalidate']);

//Event Ticket Create
Route::get('/accountant/event_tickets', [App\Http\Controllers\Accountant\AccTktPriceController::class, 'index']);
Route::get('/accountant/event_tickets/create/{id}', [App\Http\Controllers\Accountant\AccTktPriceController::class, 'create']);
Route::get('/accountant/event_tickets/view/{id}', [App\Http\Controllers\Accountant\AccTktPriceController::class, 'view']);
Route::get('/accountant/event_tickets/edit/{id}/{t_id}', [App\Http\Controllers\Accountant\AccTktPriceController::class, 'edit']);
Route::post('/accountant/event_tickets/store', [App\Http\Controllers\Accountant\AccTktPriceController::class, 'store']);
Route::post('/accountant/event_tickets/update/{id}/{t_id}', [App\Http\Controllers\Accountant\AccTktPriceController::class, 'update']);
Route::get('/accountant/check_ticket_category',[App\Http\Controllers\Accountant\AccTktPriceController::class, 'validateactivity']);

//Class Fee
Route::get('/accountant/classfee', [App\Http\Controllers\Accountant\AccClassFeeController::class, 'index']);
Route::get('/accountant/classfee/create/{id}', [App\Http\Controllers\Accountant\AccClassFeeController::class, 'create']);
Route::get('/accountant/classfee/view/{id}', [App\Http\Controllers\Accountant\AccClassFeeController::class, 'view']);
Route::get('/accountant/classfee/edit/{ins_id}/{id}', [App\Http\Controllers\Accountant\AccClassFeeController::class, 'edit']);
Route::post('/accountant/classfee/store', [App\Http\Controllers\Accountant\AccClassFeeController::class, 'store']);
Route::post('/accountant/classfee/update/{id}', [App\Http\Controllers\Accountant\AccClassFeeController::class, 'update']);
Route::get('/accountant/check_grade_validation',[App\Http\Controllers\Accountant\AccClassFeeController::class, 'validateclassfee']);

//Application Payment
Route::get('/accountant/student/profile', [App\Http\Controllers\Accountant\AccStuProfileController::class, 'index']);
Route::get('/accountant/student/profile/id', [App\Http\Controllers\Accountant\AccStuProfileController::class, 'auto_cmplt']);
Route::get('/accountant/validate_profile', [App\Http\Controllers\Accountant\AccStuProfileController::class, 'validate_student_id']);
Route::post('/accountant/student/find', [App\Http\Controllers\Accountant\AccStuProfileController::class, 'profile_search']);

//Application Payment
Route::get('accountant/application_pay', [App\Http\Controllers\Accountant\AccApplicatPayController::class, 'index']);
Route::get('accountant/application_pay/create', [App\Http\Controllers\Accountant\AccApplicatPayController::class, 'create']);
Route::post('accountant/application_pay/store', [App\Http\Controllers\Accountant\AccApplicatPayController::class, 'store']);
Route::get('accountant/application_pay/view/{id}', [App\Http\Controllers\Accountant\AccApplicatPayController::class, 'view']);
Route::get('accountant/application_pay/print/{id}', [App\Http\Controllers\Accountant\AccApplicatPayController::class, 'print']);

//Activity Payment
Route::get('accountant/activities_payments', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'index']);
Route::get('accountant/activities_payments/create', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'create']);
Route::post('accountant/activities_payments/store', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'store']);
Route::get('accountant/activities_payments/view/{id}', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'view']);
Route::get('accountant/activities_payments/print/{id}', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'print']);
Route::post('/accountant/activity_price_get', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'select_price']);
Route::get('/accountant/student_id', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'student_id']);
Route::get('/accountant/validate-activity-pay', [App\Http\Controllers\Accountant\AccActiFeePayController::class, 'validate_student_id']);

//Admition
Route::get('accountant/admition', [App\Http\Controllers\Accountant\AccAdmitionCon::class, 'index']);
Route::get('accountant/admition/create', [App\Http\Controllers\Accountant\AccAdmitionCon::class, 'create']);
Route::post('accountant/admition/store', [App\Http\Controllers\Accountant\AccAdmitionCon::class, 'store']);
//Route::get('accountant/admition/view/{id}', [App\Http\Controllers\Accountant\AccAdmitionCon::class, 'view']);
Route::get('accountant/admition/print/{id}', [App\Http\Controllers\Accountant\AccAdmitionCon::class, 'print']);
Route::get('/accountant/validate-admition-pay', [App\Http\Controllers\Accountant\AccAdmitionCon::class, 'validate_student_id']);
Route::get('/accountant/admition/student_id', [App\Http\Controllers\Accountant\AccAdmitionCon::class, 'student_id']);

//Reports application
Route::get('/accountant/reports/application', [App\Http\Controllers\Accountant\AccApplicationRepotCon::class, 'index']);
Route::post('accountant/application/date', [App\Http\Controllers\Accountant\AccApplicationRepotCon::class, 'date_vi']);
Route::post('accountant/application/daterange/loard', [App\Http\Controllers\Accountant\AccApplicationRepotCon::class, 'date_vi']);
Route::post('accountant/application/daterange', [App\Http\Controllers\Accountant\AccApplicationRepotCon::class, 'date_range']);

//Reports Due
Route::get('/accountant/reports/school_due', [App\Http\Controllers\Accountant\AccReportDueController::class, 'index']);
Route::post('/accountant/duefee/date', [App\Http\Controllers\Accountant\SuAdminReportDueController::class, 'date_range']);
Route::post('accountant/duefee/daterange', [App\Http\Controllers\Accountant\SuAdminReportDueController::class, 'date_range']);

//Reports income
Route::get('accountant/reports/income', [App\Http\Controllers\Accountant\AccIncomeRepotCon::class, 'index']);
Route::get('accountant/reports/income/date', [App\Http\Controllers\Accountant\AccIncomeRepotCon::class, 'date_loard']);
Route::post('accountant/income/date', [App\Http\Controllers\Accountant\AccIncomeRepotCon::class, 'date_vise']);
Route::post('accountant/income/daterange', [App\Http\Controllers\Accountant\AccIncomeRepotCon::class, 'date_range']);

//Reports Admition
Route::get('/accountant/reports/admition', [App\Http\Controllers\Accountant\AccReportAdmitionCon::class, 'index']);
Route::get('/accountant/reports/admition/date', [App\Http\Controllers\Accountant\AccReportAdmitionCon::class, 'date_loard']);
Route::post('/accountant/reports/admition/date_vise', [App\Http\Controllers\Accountant\AccReportAdmitionCon::class, 'date_vi']);
Route::post('/accountant/reports/admition/daterange', [App\Http\Controllers\Accountant\AccReportAdmitionCon::class, 'date_range']);

});



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Data Entry______________________________________________________________________________________________________________________________________
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::group(['middleware' => 'App\Http\Middleware\IsDataEntry'], function()
{

//User
Route::get('data_entry/users', [App\Http\Controllers\DataEntry\DaUserController::class, 'index']);
Route::get('data_entry/users/create', [App\Http\Controllers\DataEntry\DaUserController::class, 'create']);
Route::post('data_entry/users/store', [App\Http\Controllers\DataEntry\DaUserController::class, 'store']);
Route::get('data_entry/users/view/{id}', [App\Http\Controllers\DataEntry\DaUserController::class, 'view']);
Route::get('data_entry/users/edit/{id}', [App\Http\Controllers\DataEntry\DaUserController::class, 'edit']);
Route::post('data_entry/users/update/{id}', [App\Http\Controllers\DataEntry\DaUserController::class, 'update']);
Route::get('data_entry/users/password/{id}', [App\Http\Controllers\DataEntry\DaUserController::class, 'update_pas_view']);
Route::post('data_entry/users/password/update/{id}', [App\Http\Controllers\DataEntry\DaUserController::class, 'update_pasword']);
Route::get('/data_entry/validate-email',[App\Http\Controllers\DataEntry\DaUserController::class, 'emailvalidate']);
Route::get('/data_entry/validate-nic',[App\Http\Controllers\DataEntry\DaUserController::class, 'nicvalidate']);
Route::get('/data_entry/validate-mobile',[App\Http\Controllers\DataEntry\DaUserController::class, 'mobilevalidate']);
Route::post('/data_entry/profile_update_email', [App\Http\Controllers\DataEntry\DaUserController::class, 'profile_update_email_validation']);
Route::post('/data_entry/profile_update_mobile', [App\Http\Controllers\DataEntry\DaUserController::class, 'mobilevalidate_edit']);
Route::post('/data_entry/profile_update_nic', [App\Http\Controllers\DataEntry\DaUserController::class, 'edit_nicvalidate']);

//Profile
Route::get('/data_entry/profile', [App\Http\Controllers\DataEntry\DaUserController::class, 'profileView']);
Route::get('/data_entry/profile/update', [App\Http\Controllers\DataEntry\DaUserController::class, 'profileEdit']);
Route::get('/data_entry/profile/password', [App\Http\Controllers\DataEntry\DaUserController::class, 'profilePassword']);
Route::get('/data_entry/profile/password/edit', [App\Http\Controllers\DataEntry\DaUserController::class, 'profile_pass_update']);
Route::post('/data_entry/profile/password/update', [App\Http\Controllers\DataEntry\DaUserController::class, 'profilepassword_update']);
Route::post('/data_entry/profile/edit/update', [App\Http\Controllers\DataEntry\DaUserController::class, 'profile_update']);

//Institute
Route::get('/data_entry/institutes', [App\Http\Controllers\DataEntry\DaInstiController::class, 'index']);
Route::get('/data_entry/institutes/create', [App\Http\Controllers\DataEntry\DaInstiController::class, 'create']);
Route::post('/data_entry/institutes/store', [App\Http\Controllers\DataEntry\DaInstiController::class, 'store']);
Route::get('/data_entry/institutes/view/{id}', [App\Http\Controllers\DataEntry\DaInstiController::class, 'view']);
Route::get('/data_entry/institutes/edit/{id}', [App\Http\Controllers\DataEntry\DaInstiController::class, 'edit']);
Route::post('/data_entry/institutes/update/{id}', [App\Http\Controllers\DataEntry\DaInstiController::class, 'update']);
Route::get('/data_entry/validate-email',[App\Http\Controllers\DataEntry\DaInstiController::class, 'emailvalidate']);
Route::get('/data_entry/validate-phone',[App\Http\Controllers\DataEntry\DaInstiController::class, 'phonevalidate']);
Route::get('/data_entry/validate-name',[App\Http\Controllers\DataEntry\DaInstiController::class, 'namevalidate']);
Route::get('/data_entry/check_edit_email',[App\Http\Controllers\DataEntry\DaInstiController::class, 'oldemailvalidate']);
Route::get('/data_entry/validate-code',[App\Http\Controllers\DataEntry\DaInstiController::class, 'codevalidate']);
Route::post('/data_entry/validate_code_edit',[App\Http\Controllers\DataEntry\DaInstiController::class, 'edit_codevalidate']);
Route::post('/data_entry/validate_ins_mail_edit',[App\Http\Controllers\DataEntry\DaInstiController::class, 'edit_mail_validate']);
Route::post('/data_entry/validate_ins_cont_edit',[App\Http\Controllers\DataEntry\DaInstiController::class, 'edit_cont_validate']);
Route::post('/data_entry/validate_ins_name_edit',[App\Http\Controllers\DataEntry\DaInstiController::class, 'edit_name_validate']);

//Bank
Route::get('/data_entry/banks', [App\Http\Controllers\DataEntry\DaBankController::class, 'create']);
Route::post('/data_entry/banks/store', [App\Http\Controllers\DataEntry\DaBankController::class, 'store']);
Route::get('/data_entry/banks/edit/{id}', [App\Http\Controllers\DataEntry\DaBankController::class, 'edit']);
Route::post('/data_entry/banks/update/{id}', [App\Http\Controllers\DataEntry\DaBankController::class, 'update']);
Route::get('/data_entry/validate-bank', [App\Http\Controllers\DataEntry\DaBankController::class, 'validatebank']);

//Inquries
Route::get('/data_entry/inqueries', [App\Http\Controllers\DataEntry\DaInqueryController::class, 'index']);
Route::get('/data_entry/inqueries/create', [App\Http\Controllers\DataEntry\DaInqueryController::class, 'create']);
Route::post('data_entry/inqueries/store', [App\Http\Controllers\DataEntry\DaInqueryController::class, 'store']);
Route::get('/data_entry/inqueries/view/{pid}', [App\Http\Controllers\DataEntry\DaInqueryController::class, 'view']);
Route::get('/data_entry/inqueries/edit/{id}', [App\Http\Controllers\DataEntry\DaInqueryController::class, 'edit']);
Route::post('/data_entry/inqueries/update/{id}', [App\Http\Controllers\DataEntry\DaInqueryController::class, 'update']);

//Inquries Primary
Route::get('/data_entry/primary/inqueries', [App\Http\Controllers\DataEntry\DaPrimaryInquController::class, 'index']);
Route::get('/data_entry/primary/inqueries/create', [App\Http\Controllers\DataEntry\DaPrimaryInquController::class, 'create']);
Route::post('data_entry/primary/inqueries/store', [App\Http\Controllers\DataEntry\DaPrimaryInquController::class, 'store']);
Route::get('/data_entry/primary/inqueries/view/{pid}', [App\Http\Controllers\DataEntry\DaPrimaryInquController::class, 'view']);
Route::get('/data_entry/primary/inqueries/edit/{id}', [App\Http\Controllers\DataEntry\DaPrimaryInquController::class, 'edit']);
Route::post('/data_entry/primary/inqueries/update/{id}', [App\Http\Controllers\DataEntry\DaPrimaryInquController::class, 'update']);

//Application

Route::post('/data_entry/applications/update/{id}', [App\Http\Controllers\DataEntry\DaApplicationController::class, 'update']);

//Application Primary
Route::post('/data_entry/primary/applications/update/{id}', [App\Http\Controllers\DataEntry\DaPrimaryApplicController::class, 'update']);

//student
Route::post('/data_entry/inqueries/registration/update/{id}', [App\Http\Controllers\DataEntry\DaStudentController::class, 'update']);
Route::get('/data_entry/student/parent2_nic', [App\Http\Controllers\DataEntry\DaStudentController::class, 'parent2_details']);
Route::get('/data_entry/student/siblins', [App\Http\Controllers\DataEntry\DaStudentController::class, 'siblins']);
Route::post('/data_entry/sibilin_temp_insert', [App\Http\Controllers\DataEntry\DaStudentController::class, 'temp_in']);
Route::post('/data_entry/school/student/update/{id}', [App\Http\Controllers\DataEntry\DaStudentController::class, 'update_data']);
Route::post('/data_entry/temp_sib_remove', [App\Http\Controllers\DataEntry\DaStudentController::class, 'tempremove']);
Route::post('/data_entry/lord_temp_edit_syblin_tbl', [App\Http\Controllers\DataEntry\DaStudentController::class, 'temp_edit_load']);
Route::get('/data_entry/school/students/table', [App\Http\Controllers\DataEntry\DaStudentController::class, 'index']);
Route::get('/data_entry/school/student/view/{id}', [App\Http\Controllers\DataEntry\DaStudentController::class, 'view']);
Route::get('/data_entry/school/student/edit/{id}', [App\Http\Controllers\DataEntry\DaStudentController::class, 'edit']);
Route::post('/data_entry/class_payment_check', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'check_payment']);

//Student Primary
Route::post('/data_entry/primary/inqueries/registration/update/{id}', [App\Http\Controllers\DataEntry\DaPrimaryStudentController::class, 'update']);
Route::get('/data_entry/nursary/students/table', [App\Http\Controllers\DataEntry\DaPrimaryStudentController::class, 'index']);
Route::get('/data_entry/nursary/student/view/{id}', [App\Http\Controllers\DataEntry\DaPrimaryStudentController::class, 'view']);
Route::get('/data_entry/nursary/student/edit/{id}', [App\Http\Controllers\DataEntry\DaPrimaryStudentController::class, 'edit']);
Route::post('/data_entry/nursary/student/update/{id}', [App\Http\Controllers\DataEntry\DaPrimaryStudentController::class, 'update_nersary']);

//Scholarship
Route::get('data_entry/scholarship', [App\Http\Controllers\DataEntry\DaScholarshipController::class, 'index']);
Route::get('data_entry/scholarship/create', [App\Http\Controllers\DataEntry\DaScholarshipController::class, 'create']);
Route::post('data_entry/scholarship/store', [App\Http\Controllers\DataEntry\DaScholarshipController::class, 'store']);
Route::get('/data_entry/sholarship_st_id_num', [App\Http\Controllers\DataEntry\DaScholarshipController::class, 'autoload']);

//Student Payment
Route::get('/data_entry/payments', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'index']);
Route::get('/data_entry/payments/create', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'create']);
Route::post('/data_entry/payments/store', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'store']);
Route::get('/data_entry/payments/view', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'view']);
Route::get('/data_entry/payments/old/view', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'old_payment']);
Route::get('/data_entry/class_st_id_num', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'student_class_fee']);
Route::post('/data_entry/select_pay_student', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'student_select']);
Route::get('/data_entry/student_pay_print/{id}', [App\Http\Controllers\DataEntry\DaPaymentController::class, 'print']);

//Academic Awards
Route::get('/data_entry/awards/create', [App\Http\Controllers\DataEntry\DaAwordsController::class, 'create']);
Route::post('/data_entry/awards/store', [App\Http\Controllers\DataEntry\DaAwordsController::class, 'store']);
Route::get('/data_entry/students/awards/view', [App\Http\Controllers\DataEntry\DaAwordsController::class, 'view']);
Route::get('/data_entry/students/awards/edit', [App\Http\Controllers\DataEntry\DaAwordsController::class, 'edit']);
Route::get('/data_entry/students/awards/search', [App\Http\Controllers\DataEntry\DaAwordsController::class, 'auto_cmplt']);

//Non Academic Awards
Route::get('/data_entry/nonacc/awards/create', [App\Http\Controllers\DataEntry\DaNonAcadAwordsController::class, 'create']);
Route::post('/data_entry/nonacc/awards/store', [App\Http\Controllers\DataEntry\DaNonAcadAwordsController::class, 'store']);
Route::get('/data_entry/nonacc/students/awards/view', [App\Http\Controllers\DataEntry\DaNonAcadAwordsController::class, 'view']);
Route::get('/data_entry/nonacc/students/awards/edit', [App\Http\Controllers\DataEntry\DaNonAcadAwordsController::class, 'edit']);
Route::get('/data_entry/nonacc/students/awards/search', [App\Http\Controllers\DataEntry\DaNonAcadAwordsController::class, 'auto_cmplt']);

// Complaints
Route::get('/data_entry/complaints/create', [App\Http\Controllers\DataEntry\DaComplaintsController::class, 'create']);
Route::get('/data_entry/students/complaints/view', [App\Http\Controllers\DataEntry\DaComplaintsController::class, 'view']);
Route::get('/data_entry/students/complaints/edit', [App\Http\Controllers\DataEntry\DaComplaintsController::class, 'edit']);
Route::get('/data_entry/complaints/students/search', [App\Http\Controllers\DataEntry\DaComplaintsController::class, 'auto_cmplt']);
Route::post('/data_entry/complaints/store', [App\Http\Controllers\DataEntry\DaComplaintsController::class, 'store']);

//Activities Pay
Route::get('/data_entry/activities_pay', [App\Http\Controllers\DataEntry\DaActivController::class, 'index']);
Route::get('/data_entry/activities_pay/create', [App\Http\Controllers\DataEntry\DaActivController::class, 'create']);
Route::get('/data_entry/activities_pay/view', [App\Http\Controllers\DataEntry\DaActivController::class, 'view']);
Route::get('/data_entry/activities_pay/old/view', [App\Http\Controllers\DataEntry\DaActivController::class, 'old_payment']);

//Activity Create
Route::get('/data_entry/activities', [App\Http\Controllers\DataEntry\DaActiviSetController::class, 'index']);
Route::get('/data_entry/activities/create', [App\Http\Controllers\DataEntry\DaActiviSetController::class, 'create']);
Route::post('/data_entry/activity/store', [App\Http\Controllers\DataEntry\DaActiviSetController::class, 'store']);
Route::get('/data_entry/activities/edit/{id}', [App\Http\Controllers\DataEntry\DaActiviSetController::class, 'edit']);
Route::post('/data_entry/activities/update/{id}', [App\Http\Controllers\DataEntry\DaActiviSetController::class, 'update']);
Route::get('/data_entry/validate-activity', [App\Http\Controllers\DataEntry\DaActiviSetController::class, 'validateactivity']);

//Event Create
Route::get('/data_entry/events', [App\Http\Controllers\DataEntry\DaEventController::class, 'index']);
Route::get('/data_entry/events/create', [App\Http\Controllers\DataEntry\DaEventController::class, 'create']);
Route::post('data_entry/events/store', [App\Http\Controllers\DataEntry\DaEventController::class, 'store']);
Route::get('/data_entry/events/view/{id}', [App\Http\Controllers\DataEntry\DaEventController::class, 'view']);
Route::get('/data_entry/events/edit/{id}', [App\Http\Controllers\DataEntry\DaEventController::class, 'edit']);
Route::post('/data_entry/events/update/{id}', [App\Http\Controllers\DataEntry\DaEventController::class, 'update']);
Route::get('/data_entry/events/old/view', [App\Http\Controllers\DataEntry\DaEventController::class, 'old_payment']);
Route::post('/data_entry/evt_temp_insert', [App\Http\Controllers\DataEntry\DaEventController::class, 'tempinsert']);

//Subject Create
Route::get('/data_entry/subjects', [App\Http\Controllers\DataEntry\DaSubjectController ::class, 'create']);
Route::get('/data_entry/subjects/view/{id}', [App\Http\Controllers\DataEntry\DaSubjectController ::class, 'view']);
Route::get('/data_entry/subjects/edit/{id}', [App\Http\Controllers\DataEntry\DaSubjectController ::class, 'edit']);
Route::post('/data_entry/subjects/store', [App\Http\Controllers\DataEntry\DaSubjectController ::class, 'store']);
Route::post('/data_entry/subjects/update/{id}', [App\Http\Controllers\DataEntry\DaSubjectController ::class, 'update']);
Route::get('/data_entry/validate-subject',[App\Http\Controllers\DataEntry\DaSubjectController ::class, 'subjectvalidate']);

//Event Ticket Create
Route::get('/data_entry/event_tickets', [App\Http\Controllers\DataEntry\DaTktPriceController::class, 'index']);
Route::get('/data_entry/event_tickets/create/{id}', [App\Http\Controllers\DataEntry\DaTktPriceController::class, 'create']);
Route::get('/data_entry/event_tickets/view/{id}', [App\Http\Controllers\DataEntry\DaTktPriceController::class, 'view']);
Route::get('/data_entry/event_tickets/edit/{id}/{t_id}', [App\Http\Controllers\DataEntry\DaTktPriceController::class, 'edit']);
Route::post('/data_entry/event_tickets/store', [App\Http\Controllers\DataEntry\DaTktPriceController::class, 'store']);
Route::post('/data_entry/event_tickets/update/{id}/{t_id}', [App\Http\Controllers\DataEntry\DaTktPriceController::class, 'update']);
Route::get('/data_entry/check_ticket_category',[App\Http\Controllers\DataEntry\DaTktPriceController::class, 'validateactivity']);

//Class Fee
Route::get('/data_entry/classfee', [App\Http\Controllers\DataEntry\DaClassFeeController::class, 'index']);
Route::get('/data_entry/classfee/create/{id}', [App\Http\Controllers\DataEntry\DaClassFeeController::class, 'create']);
Route::get('/data_entry/classfee/view/{id}', [App\Http\Controllers\DataEntry\DaClassFeeController::class, 'view']);
Route::get('/data_entry/classfee/edit/{ins_id}/{id}', [App\Http\Controllers\DataEntry\DaClassFeeController::class, 'edit']);
Route::post('/data_entry/classfee/store', [App\Http\Controllers\DataEntry\DaClassFeeController::class, 'store']);
Route::post('/data_entry/classfee/update/{id}', [App\Http\Controllers\DataEntry\DaClassFeeController::class, 'update']);
Route::get('/data_entry/check_grade_validation',[App\Http\Controllers\DataEntry\DaClassFeeController::class, 'validateclassfee']);

//Application Payment
Route::get('/data_entry/student/profile', [App\Http\Controllers\DataEntry\DaStuProfileController::class, 'index']);
Route::get('/data_entry/student/profile/id', [App\Http\Controllers\DataEntry\DaStuProfileController::class, 'auto_cmplt']);
Route::get('/data_entry/validate_profile', [App\Http\Controllers\DataEntry\DaStuProfileController::class, 'validate_student_id']);
Route::post('/data_entry/student/find', [App\Http\Controllers\DataEntry\DaStuProfileController::class, 'profile_search']);

//Application Payment
Route::get('data_entry/application_pay', [App\Http\Controllers\DataEntry\DaApplicatPayController::class, 'index']);
Route::get('data_entry/application_pay/create', [App\Http\Controllers\DataEntry\DaApplicatPayController::class, 'create']);
Route::post('data_entry/application_pay/store', [App\Http\Controllers\DataEntry\DaApplicatPayController::class, 'store']);
Route::get('data_entry/application_pay/view/{id}', [App\Http\Controllers\DataEntry\DaApplicatPayController::class, 'view']);
Route::get('data_entry/application_pay/print/{id}', [App\Http\Controllers\DataEntry\DaApplicatPayController::class, 'print']);

//Activity Payment
Route::get('data_entry/activities_payments', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'index']);
Route::get('data_entry/activities_payments/create', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'create']);
Route::post('data_entry/activities_payments/store', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'store']);
Route::get('data_entry/activities_payments/view/{id}', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'view']);
Route::get('data_entry/activities_payments/print/{id}', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'print']);
Route::post('/data_entry/activity_price_get', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'select_price']);
Route::get('/data_entry/student_id', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'student_id']);
Route::get('/data_entry/validate-activity-pay', [App\Http\Controllers\DataEntry\DaActiFeePayController::class, 'validate_student_id']);


//Admition
Route::get('data_entry/admition', [App\Http\Controllers\DataEntry\DaAdmitionCon::class, 'index']);
Route::get('data_entry/admition/create', [App\Http\Controllers\DataEntry\DaAdmitionCon::class, 'create']);
Route::post('data_entry/admition/store', [App\Http\Controllers\DataEntry\DaAdmitionCon::class, 'store']);
//Route::get('accountant/admition/view/{id}', [App\Http\Controllers\DataEntry\DaAdmitionCon::class, 'view']);
Route::get('data_entry/admition/print/{id}', [App\Http\Controllers\DataEntry\DaAdmitionCon::class, 'print']);
Route::get('/data_entry/validate-admition-pay', [App\Http\Controllers\DataEntry\DaAdmitionCon::class, 'validate_student_id']);
Route::get('/data_entry/admition/student_id', [App\Http\Controllers\DataEntry\DaAdmitionCon::class, 'student_id']);
});

