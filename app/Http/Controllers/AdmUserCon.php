<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Institute;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdmUserCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

   public function index(){
    return view('admin.user.index');
   }
   public function create(){
    return view('admin.user.create');
   }

   public function store(Request $request){

    $blogpost = new User();

    $blogpost->name         = $request->fullname;
    $blogpost->address      = 1;
    $blogpost->email        = $request->email;
    $blogpost->mobile       = $request->mobile;
    $blogpost->nic          = $request->nic;
    $blogpost->user_role    = $request->usertype;
    $blogpost->user_number  = 1;
    $blogpost->ins_id       = $request->institute;
    $blogpost->status       = 1;
    $blogpost->password     = Hash::make($request->nic);
    $blogpost->image        = $request->image;

      if($request->hasfile('image')){

              $file =$request->file('image');
              $extension=$file->getClientOriginalExtension();
              $filename=time().'.'.$extension;
              $file->move('image/user/',$filename);
              $blogpost->image=$filename;
             }

  $blogpost->save();
   }

   public function view(){
    return view('admin.user.view');
   }

   public function edit(){
    return view('admin.user.edit');
   }

   public function update_password(){
    return view('admin.user.password');
   }

   public function profileView(){
    return view('admin.profile.profile_view');
   }

   public function profileEdit(){
    return view('admin.profile.profile_update');
   }

   public function profilePassword(){
    return view('admin.profile.profile_pasword');
   }

   //__Validation Part_______________________________________________________________________________________________


   //email
   public function emailvalidate(Request $request){
    {
        $user = User::where('email', $request->email)->first('email');
           if($user){
             $return =  false;
            }
            else{
             $return= true;
            }
            echo json_encode($return);
            exit;
       }
   }


   //mobile
   public function mobilevalidate(Request $request){
    {
        $user = User::where('mobile', $request->mobile)->first('mobile');
           if($user){
             $return =  false;
            }
            else{
             $return= true;
            }
            echo json_encode($return);
            exit;
       }
   }

   //nic
   public function nicvalidate(Request $request){
    {
        $user = User::where('nic', $request->nic)->first('nic');
           if($user){
             $return =  false;
            }
            else{
             $return= true;
            }
            echo json_encode($return);
            exit;
       }
   }



}
