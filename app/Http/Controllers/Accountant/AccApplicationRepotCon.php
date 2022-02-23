<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Models\ApplicationPay;
use App\Models\Institute;
use Illuminate\Http\Request;

class AccApplicationRepotCon extends Controller
{
    public function index(){
        $school = Institute::where('status',1)->get();
        return view('accountant.reports.application_index',compact('school'));
    }

    public function date_vi(Request $request){
        $school = Institute::where('status',1)->get();
        $app_repo = ApplicationPay::datetbl_load($request);
        $data = $request;
        return view('accountant.reports.application_loard',compact('app_repo','school','data'));
    }

    public function date_range(Request $request){
        //return $request;
        $data = $request;
        $school = Institute::where('status',1)->get();
        $app_repo = ApplicationPay::tbl_load($request);
       //$app_repo = ApplicationPay::whereBetween('created_at',[$request->date_start,$request->date_end])->get();
       return view('accountant.reports.application_loard',compact('app_repo','school','data'));
    }

    public function export(Request $request){
        return $request;
    }

}
