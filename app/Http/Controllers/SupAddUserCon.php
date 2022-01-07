<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Institute;
use App\Models\Town;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SupAddUserCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function add(){
        return view('superadmin.useradd');
    }

    public function store(Request $request){
        $latest = Institute::latest()->first();
        if (! $latest) {
            $insid = 'INS/LOC/000001';
        }
        else{
          $string = preg_replace("/[^0-9\.]/", '', $latest->inst_num);
            $insid = 'INS/LOC/' . sprintf('%06d', $string+1);
        }

        $latest2 = User::latest()->first();
        if (! $latest2) {
            $insuser = 'INS/USE/000001';
        }
        else{
          $string = preg_replace("/[^0-9\.]/", '', $latest2->user_number);
            $insuser = 'INS/USE/' . sprintf('%06d', $string+1);
        }
         $this->validate(request(), [


            'nic'       => 'required|unique:users,nic',
            'admin_name'   => 'required',
            'nwi'   => 'required',
            'admin_email'   => 'required|unique:users,email',
            'mobile'   => 'required|unique:users,mobile',
            'address'   => 'required',
            //'password'   => 'required',
            // 're_password'   => 'required',
            'institute_name'   => 'required',
            'institute_address'   => 'required',
            'Institute_email'   => 'required|unique:institutes,email',
            'telephone'   => 'required|unique:institutes,tele',
            'payment'   => 'required',
            'card'   => 'required',

            ]);



            $inst = new Institute;
            $inst->institute=$request->institute_name;
            $inst->inst_num =$insid;
            $inst->address  =$request->institute_address;
            $inst->email    =$request->Institute_email;
            $inst->tele     =$request->telephone;
            $inst->town_id  =1;
            $inst->payment  =$request->payment;
            $inst->card     =$request->card;
            $inst->comment  =$request->comment;
            $inst->ins_img  =1;
            $inst->status   =1;

            $inst->save();

            $user = new User;
            $user->full_name=$request->admin_name;
            $user->nwi      =$request->nwi;
            $user->nic      =$request->nic;
            $user->email    =$request->admin_email;
            $user->mobile   =$request->mobile;
            $user->tele     =$request->tel;
            $user->address  =$request->address;
            $user->password =Hash::make($request->nic);
            $user->user_name=$request->user_name;
            $user->ins_id   =$inst->id;
            $user->user_type_id =2;
            $user->image    ="1.jpg";
            $user->status   =1;
            $user->user_number  =$insuser;
            $user->save();

            $notification = array(
                'message' => 'Customer Registration successfully!',
                'alert-type' => 'Success'
            );

            return redirect('superadmin/user/add')->with($notification);

    }

    public function tableview(){
        $users = User::where('user_type_id',2)->get();
        return view('superadmin/usertableview',compact('users'));
    }

    public function view($id){
        $adminuser = User::find($id);
        $school = Institute::where('id',$adminuser->ins_id)->first();
        return view('superadmin/userview',compact('adminuser'));
    }

    public function edit($id){
        $adminuser = User::find($id);
        return view('superadmin/useredit',compact('adminuser'));
    }

    public function update(Request $request ,$id){

        $this->validate(request(), [


            'nic'         => ['required', 'max:10', Rule::unique('users')->ignore($request->id)],
            'admin_name'  => 'required',
            'nwi'         => 'required',
            'email'       => ['required', 'max:150', 'email' , Rule::unique('users')->ignore($request->id)],
            'mobile'      => ['required', 'max:10', Rule::unique('users')->ignore($request->id)],
            'address'     => 'required',

            ]);
            $user = User::find($id);
            $user->full_name=$request->admin_name;
            $user->nwi      =$request->nwi;
            $user->nic      =$request->nic;
            $user->email    =$request->email;
            $user->mobile   =$request->mobile;
            $user->tele     =$request->tel;
            $user->address  =$request->address;
            $user->save();

            $notification = array(
                'message' => 'Customer Details Successfully Updated !',
                'alert-type' => 'Success'
            );

            return redirect('superadmin/users')->with($notification);
    }


}
