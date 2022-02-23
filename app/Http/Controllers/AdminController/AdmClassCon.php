<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmClassCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('admin.classes.index');
    }

    public function create(){
        return view('admin.classes.create');
    }
}
