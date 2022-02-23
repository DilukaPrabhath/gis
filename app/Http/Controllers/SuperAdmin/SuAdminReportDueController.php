<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\Student;
use Illuminate\Http\Request;

class SuAdminReportDueController extends Controller
{
    public function index(){
        $school = Institute::where('status',1)->get();
        return view('superadmin.reports.pending_index',compact('school'));
    }

    public function date_vise(Request $request){
        //return  $date = Carbon::today()->addMonth(-3);

           $duefee = Student::monthvise($request);
           return view('superadmin.reports.pending_loard',compact('duefee'));
       }


       public function date_range(Request $request){
           $duefee = Student::yearwise($request);
           return view('superadmin.reports.pending_loard',compact('duefee'));
       }
}

