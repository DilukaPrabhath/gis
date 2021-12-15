<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\User;
use Illuminate\Validation\Rule;

class SupInstCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        $institute = Institute::all();
        return view('superadmin/instableview',compact('institute'));
    }

    public function create(){
        $users = User::where('user_type_id',2)->where('status',1)->get();
        return view('superadmin/inscreate',compact('users'));
    }

    public function view($id){
        $institute = Institute::find($id);
        return view('superadmin/insview',compact('institute'));
    }

    public function edit($id){
        $institute = Institute::find($id);
        return view('superadmin/insedit',compact('institute'));
    }

    public function update(Request $request,$id){
         //return $request;
        $this->validate(request(), [

            'institute_name'     => 'required',
            'institute_address'  => 'required',
            'email'              => 'required',
            'telephone'          => 'required',
            'card'               => 'required',
            'payment'            => 'required',
            'status'             => 'required',

            ]);
            $inst = Institute::find($id);
            $inst->institute =$request->institute_name;
            $inst->address   =$request->institute_address;
            $inst->tele      =$request->telephone;
            $inst->email     =$request->email;
            $inst->card      =$request->card;
            $inst->payment   =$request->payment;
            $inst->status    =$request->status;
            $inst->save();

            $notification = array(
                'message' => 'Institiute Details Successfully Updated !',
                'alert-type' => 'Success'
            );

            return redirect('superadmin/institutes')->with($notification);
    }



}
