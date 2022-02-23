<?php

namespace App\Http\Controllers\DeputyRegitar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeActivController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('de_registar.activity_pay.index');
       }

       public function create(){
        return view('de_registar.activity_pay.create');
       }

       public function view(){
        return view('de_registar.activity_pay.view');
       }

       public function old_payment(){
        return view('de_registar.activity_pay.old_payment');
       }
}
