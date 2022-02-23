<?php

namespace App\Http\Controllers\Registar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReClassController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('registar.classes.index');
    }

    public function create(){
        return view('registar.classes.create');
    }
}
