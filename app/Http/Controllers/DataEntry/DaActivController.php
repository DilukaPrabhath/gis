<?php

namespace App\Http\Controllers\DataEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaActivController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('data_entry.activity_pay.index');
       }

       public function create(){
        return view('data_entry.activity_pay.create');
       }

       public function view(){
        return view('data_entry.activity_pay.view');
       }

       public function old_payment(){
        return view('data_entry.activity_pay.old_payment');
       }
}

