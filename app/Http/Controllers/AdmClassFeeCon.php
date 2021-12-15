<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmClassFeeCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
   public function index(){
       return view('admin.classfee.index');
   }
}
