<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminActivCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('admin.activity_pay.index');
       }

       public function create(){
        return view('admin.activity_pay.create');
       }

       public function view(){
        return view('admin.activity_pay.view');
       }

       public function old_payment(){
        return view('admin.activity_pay.old_payment');
       }
}
