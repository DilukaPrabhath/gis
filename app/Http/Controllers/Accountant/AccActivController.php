<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccActivController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('accountant.activity_pay.index');
       }

       public function create(){
        return view('accountant.activity_pay.create');
       }

       public function view(){
        return view('accountant.activity_pay.view');
       }

       public function old_payment(){
        return view('accountant.activity_pay.old_payment');
       }
}

