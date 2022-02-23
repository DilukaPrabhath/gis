<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuAdmClassFeeController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
   public function index(){
       return view('superadmin.classfee.index');
   }
}
