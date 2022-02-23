<?php

namespace App\Http\Controllers\DeputyRegitar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeClassFee2Controller extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
   public function index(){
       return view('de_registar.classfee.index');
   }
}
