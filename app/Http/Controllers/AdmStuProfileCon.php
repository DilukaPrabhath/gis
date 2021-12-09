<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmStuProfileCon extends Controller
{
    public function view(Request $request){
        return view('admin.student.profile');
    }
}
