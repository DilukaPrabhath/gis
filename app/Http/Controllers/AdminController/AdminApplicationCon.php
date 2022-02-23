<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminApplicationCon extends Controller
{
    public function __construct()
   {
    $this->middleware('auth');
    }

    public function index(){
        $app = Student::application_tbldata();
        return view('admin.application.index',compact('app'));
       }

       public function update(Request $request,$id){

        $stu =  Student::find($id);

        $stu->application_status = $request->app_pay_st;
        $stu->interview_type = $request->inter_ty;
        $stu->interview_status = $request->inter_st;
        $stu->re_interview_apply = $request->re_int;
        $stu->resipt_number = $request->recipt_no;
        // $stu->resipt_image = $request->rec_img;

        if($request->app_pay_st == 1){
            $stu->stu_status = 2;
            $stu->inq_status = 2;
        }else{
            $stu->stu_status = 1;
        }

        if($request->inter_st == 1){
            $stu->stu_status = 4;
            $stu->inq_status = 2;
        }else{
            $stu->stu_status = 2;
        }

        if($request->hasfile('rec_img')){

            $file =$request->file('rec_img');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('image/ricipt/',$filename);
            $stu->resipt_image = $filename;


           }else{

           }

        $stu->save();

        $notification = array(
            'message' => 'Registration  Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/inqueries')->with($notification);
       }
}
