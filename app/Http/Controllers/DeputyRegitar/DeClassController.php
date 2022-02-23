<?php

namespace App\Http\Controllers\DeputyRegitar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeClassController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('de_registar.classes.index');
    }

    public function create(){
        return view('de_registar.classes.create');
    }
}
