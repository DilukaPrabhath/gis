<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuAdmClassController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('superadmin.classes.index');
    }

    public function create(){
        return view('superadmin.classes.create');
    }
}
