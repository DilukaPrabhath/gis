<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Models\Admition;
use App\Models\Institute;
use Illuminate\Http\Request;

class AccReportAdmitionCon extends Controller
{
    public function index(){
        $school = Institute::where('status',1)->get();
        return view('accountant.reports.admition_index',compact('school'));
    }

    public function date_vi(Request $request){
        $school = Institute::where('status',1)->get();
        $app_repo = Admition::datetbl_load($request);
        $data = $request;
        return view('accountant.reports.admition_loard',compact('app_repo','school','data'));
    }

    public function date_range(Request $request){
        //return $request;
        $data = $request;
        $school = Institute::where('status',1)->get();
        $app_repo = Admition::tbl_load($request);
       //$app_repo = Admition::whereBetween('created_at',[$request->date_start,$request->date_end])->get();
       return view('accountant.reports.admition_loard',compact('app_repo','school','data'));
    }
}

