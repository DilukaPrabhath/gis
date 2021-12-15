<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupPaymentCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('superadmin.paytable');
    }

    public function create(){
        return view('superadmin.paycreate');
    }
}
