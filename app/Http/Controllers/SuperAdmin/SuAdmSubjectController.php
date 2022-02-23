<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuAdmSubjectController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
        return view('superadmin.subject.index');
    }

    public function create(){
        return view('superadmin.subject.create');
    }
}
