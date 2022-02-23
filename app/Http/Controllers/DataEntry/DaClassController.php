<?php

namespace App\Http\Controllers\DataEntry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaClassController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('data_entry.classes.index');
    }

    public function create(){
        return view('data_entry.classes.create');
    }
}
