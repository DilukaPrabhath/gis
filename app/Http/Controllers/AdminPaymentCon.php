<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPaymentCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
        return view('admin.payment.index');
       }

       public function create(){
        return view('admin.payment.create');
       }

       public function view(){
        return view('admin.payment.view');
       }

       public function edit(){
        return view('admin.payment.edit');
       }

       public function old_payment(){
        return view('admin.payment.old_payment');
       }


}
