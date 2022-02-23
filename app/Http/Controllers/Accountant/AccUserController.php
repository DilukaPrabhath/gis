<?php

namespace App\Http\Controllers\Accountant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Institute;
use App\Models\UserRole;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AccUserController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

   public function index(){
    $usr_tbl = User::data()->where('id','!=',0);
    return view('accountant.user.index',compact('usr_tbl'));
   }
   public function create(){
    $user_type = UserRole::where('status',1)->get();
    $school = Institute::where('status',1)->get();
    return view('accountant.user.create',compact('school','user_type'));
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

    $notification = array(
     'message' => 'User Registration successfully!',
     'alert-type' => 'Success'
    );

   return redirect('accountant/users')->with($notification);
   }

   public function view($id){
    $adminuser = User::find($id);
    $school = Institute::where('id',$adminuser->ins_id)->first();
    $u_tyo = UserRole::where('id',$adminuser->user_role)->first();
    $nm = $school->institute_name;
    return view('accountant.user.view',compact('adminuser','nm','school','u_tyo'));
   }

   public function edit($id){
    $user_type = UserRole::all();
    $school = Institute::all();
    $data = User::find($id);
    return view('accountant.user.edit',compact('user_type','school','data'));
   }

   public function update(Request $request,$id){

    $blogpost =  User::find($id);

    $blogpost->name         = $request->fullname;
    $blogpost->address      = 1;
    $blogpost->email        = $request->email;
    $blogpost->mobile       = $request->mobile;
    $blogpost->nic          = $request->nic;
    $blogpost->user_role    = $request->usertype;
    $blogpost->user_number  = 1;
    $blogpost->ins_id       = $request->institute;
    $blogpost->status       = $request->status;

      if($request->hasfile('stu_img')){

              $file =$request->file('stu_img');
              $extension=$file->getClientOriginalExtension();
              $filename=time().'.'.$extension;
              $file->move('image/user/',$filename);
              $blogpost->image=$filename;
             }

    $blogpost->save();

    $notification = array(
     'message' => 'User Update successfully!',
     'alert-type' => 'Success'
    );

   return redirect('accountant/users')->with($notification);
   }

   public function update_pas_view($id){
       $id = $id;
    return view('accountant.user.password',compact('id'));
   }

   public function update_pasword(Request $request,$id){

    $pass = User::find($id);

    $pass->password = Hash::make($request->password);
    $pass->save();

    $notification = array(

        'message' => 'Password Update Successfully!',
        'alert-type' => 'Success'
       );

      return redirect('accountant/users')->with($notification);
      }

   public function profileView(){
    $id = Auth::user()->id;
    $adminuser = User::find($id);
    $school = Institute::where('id',$adminuser->ins_id)->first();
    $u_tyo = UserRole::where('id',$adminuser->user_role)->first();
    return view('accountant.profile.profile_view',compact('school','u_tyo','adminuser'));
   }

   public function profileEdit(){
    $id = Auth::user()->id;
    $user_type = UserRole::all();
    $school = Institute::all();
    $data = User::find($id);
    $u_tyo = UserRole::where('id',$data->user_role)->first();
    return view('accountant.profile.profile_update',compact('user_type','school','data','u_tyo'));
   }


   public function profile_update(Request $request){

    $id = Auth::User()->id;

    $blogpost =  User::find($id);

    $blogpost->name         = $request->fullname;
    $blogpost->email        = $request->email;
    $blogpost->mobile       = $request->mobile;
    $blogpost->nic          = $request->nic;

      if($request->hasfile('stu_img')){

              $file =$request->file('stu_img');
              $extension=$file->getClientOriginalExtension();
              $filename=time().'.'.$extension;
              $file->move('image/user/',$filename);
              $blogpost->image=$filename;
             }

    $blogpost->save();

    $notification = array(
     'message' => 'Profile Update successfully!',
     'alert-type' => 'Success'
    );

      return redirect('accountant/profile')->with($notification);
      }

      public function profile_pass_update(Request $request){
        return view('accountant.profile.profile_pasword');
      }

   public function profilepassword_update(Request $request){
    $id = Auth::User()->id;

    $pass = User::find($id);
    $pass->password = Hash::make($request->password);
    $pass->save();

    $notification = array(

        'message' => 'Password Update Successfully!',
        'alert-type' => 'Success'
       );

      return redirect('accountant/profile')->with($notification);
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

   //email
   public function profile_update_email_validation(Request $request){
    //    return $req = $request;
           $user = User::where('email', $request->email)->where('id','!=',$request->sid)->first('email');


           if($user){
              // return "Yes";
             $return =  false;
            }
            else{
                // return "no";
             $return= true;
            }
            echo json_encode($return);
            exit;

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

   public function mobilevalidate_edit(Request $request){
    //    return $req = $request;
           $user = User::where('mobile', $request->mobile)->where('id','!=',$request->sid)->first('mobile');


           if($user){
              // return "Yes";
             $return =  false;
            }
            else{
                // return "no";
             $return= true;
            }
            echo json_encode($return);
            exit;

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

   public function edit_nicvalidate(Request $request){
    {
        $user = User::where('nic', $request->nic)->where('id','!=',$request->sid)->first('nic');
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


