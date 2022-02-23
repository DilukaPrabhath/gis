<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
            if(Auth::user()->user_role =='1'){
                return view('admin.index');
            }elseif( Auth::user()->user_role =='6'){
                return view('superadmin.index');
            }elseif( Auth::user()->user_role =='2'){
                return view('registar.index');
            }elseif( Auth::user()->user_role =='3'){
                return view('de_registar.index');
            }elseif( Auth::user()->user_role =='4'){
                return view('accountant.index');
            }elseif( Auth::user()->user_role =='5'){
                return view('data_entry.index');
            }else{
                return view('login');
            }
    }

}
