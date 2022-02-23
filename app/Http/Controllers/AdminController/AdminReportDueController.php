<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ClassFeePayment;
use App\Models\Institute;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminReportDueController extends Controller
{
    public function index(){
        $school = Institute::where('status',1)->get();
        return view('admin.reports.pending_index',compact('school'));
    }

    public function date_vise(Request $request){
        //return  $date = Carbon::today()->addMonth(-3);

           $duefee = Student::monthvise($request);
           return view('admin.reports.pending_loard',compact('duefee'));
       }


       public function date_range(Request $request){
           $duefee = Student::yearwise($request);
           return view('admin.reports.pending_loard',compact('duefee'));
       }
}
