<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuAdminActivController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('superadmin.activity_pay.index');
       }

       public function create(){
        return view('superadmin.activity_pay.create');
       }

       public function view(){
        return view('superadmin.activity_pay.view');
       }

       public function old_payment(){
        return view('superadmin.activity_pay.old_payment');
       }
}
