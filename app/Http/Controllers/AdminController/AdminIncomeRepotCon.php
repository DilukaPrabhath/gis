<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ClassFeePayment;
use App\Models\Institute;
use App\Models\TemTbl;
use Illuminate\Http\Request;

class AdminIncomeRepotCon extends Controller
{
    public function index(){
        $school = Institute::where('status',1)->get();
        return view('admin.reports.income_index',compact('school'));
    }


    public function date_vise(Request $request){
       // return  $request;
        $data = ClassFeePayment::datevise($request);
     //return   $class_fee = ClassFeePayment::datevise($request);
        $school = Institute::where('status',1)->get();
        return view('admin.reports.income_loard',compact('data','school'));
    }



    public function date_range(Request $request){
        //return $request;
        $data = ClassFeePayment::daterange($request);
        $school = Institute::where('status',1)->get();
        return view('admin.reports.income_loard',compact('school','data'));
    }

    //public function getdata()


}
