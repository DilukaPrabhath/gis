<?php

namespace App\Http\Controllers\Registar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReActivController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('registar.activity_pay.index');
       }

       public function create(){
        return view('registar.activity_pay.create');
       }

       public function view(){
        return view('registar.activity_pay.view');
       }

       public function old_payment(){
        return view('registar.activity_pay.old_payment');
       }
}

