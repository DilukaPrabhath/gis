<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Achievement;
use App\Models\Complaint;
use App\Models\Grade;
use App\Models\Institute;
use App\Models\Parentm;
use App\Models\ProfileImage;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentEventImage;

class AdmStuProfileCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(Request $request){
        //return "HI";
        return view('admin.studentprofile.index');
    }

    public function auto_cmplt(Request $request){

        $puar = array();
        $dtar = array();
        $sid = $request->stu_id;

        //return $nic;
        // exit();
        // $data =Parentm::select("parent_nic")
        //         ->where("parent_nic","LIKE","{$request->parent_nic2}%")
        //         ->get();
        $data =Student::whereRaw('student_id LIKE "%'.$sid.'%"')->get();
        //$data = Parentm::load_drdwn_data($nic);
        if(count($data) > 0){
            foreach($data as $row){

                $dtar['student_name'] = $row->student_full_name;
                $dtar['sid'] = $row->id;
                $dtar['label'] = $row->student_id;
                $dtar['value'] = $row->student_id;

                array_push($puar, $dtar);
            }
        }
            return $puar;

    }


    public function profile_search(Request $request){

        $this->validate(request(), [
            'student_id'    => 'required',
            ]);
       //return  $request;
        $stu_data = Student::where('student_id',$request->student_id)->get();
       // return  $stu_data;
        $data  = Student::find($stu_data[0]->id);
        $stu_img_count = ProfileImage::where('stu_id',$stu_data[0]->id)->count();
        $stu_img = ProfileImage::where('stu_id',$stu_data[0]->id)->get();
        $stu_ev_img = StudentEventImage::where('stu_id',$stu_data[0]->id)->get();
        $school = Institute::find($stu_data[0]->institute);
        $grd = Grade::find($stu_data[0]->grade_now);
        $father = Parentm::find($stu_data[0]->fat_id);
        $mother = Parentm::find($stu_data[0]->mom_id);
        $acc_award = Achievement::where('stu_id',$stu_data[0]->id)->where('ac_or_ex',1)->get();
        $non_acc_award = Achievement::where('stu_id',$stu_data[0]->id)->where('ac_or_ex',2)->get();
        $complain = Complaint::where('stu_id',$stu_data[0]->id)->where('status',1)->get();
        return view('admin.studentprofile.profile',compact('stu_data','grd','stu_ev_img','father','mother','data','school','stu_img_count','stu_img','non_acc_award','acc_award','complain'));
    }




    //image upload

    public function eventimage(Request $request){
     // return $request->student_id;

        $stu_data = Student::where('student_id',$request->student_id)->first();
       // $stu_data = Student::where('student_id',$request->student_id)->get();
        //return $stu_data;
        //return $stu_data->id;
        $stimg = new StudentEventImage();

        $stimg->stu_id = $stu_data->id;
        $stimg->event  = $request->event;
        $stimg->status = 1;

        if($request->hasfile('stu_img')){

            $file =$request->file('stu_img');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('image/student/',$filename);
            $stimg->image = $filename;

           }
        //return $stimg;
       $stimg->save();

    //    return redirect()->back();
        // //$stu_data = Student::where('student_id',$request->stu_id)->get();

        // $notification = array(
        //     'message' => 'Image Added Successfully!',
        //     'alert-type' => 'Success'
        // );
        // $request->request->add(['stu_id' => $request->stu_id]);
       // return $request;
       return $this->profile_search($request);

    }







    //___________ Vlalidations __________________________________________________________________________________________________________

    public function  validate_student_id(Request $request){
        {
            //return $request;

            $stu = Student::where('student_id', $request->stu_id)->first('student_id');
               if($stu){
                $return= true;
                }
                else{
                 $return =  false;
                }
                echo json_encode($return);
                exit;
           }
       }

}
