<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmScholarshipCon extends Controller
{
    public function index(){
        return view('admin.scholarship_request.index');
       }

       public function create(){

        return view('admin.scholarship_request.create');
       }
}
