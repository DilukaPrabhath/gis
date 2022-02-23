<?php

namespace App\Http\Controllers\Registar;

use App\Models\Complaint;
use App\Models\Grade;
use App\Models\Institute;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReComplaintsController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function create(){
        return view('registarregistar.complain.create');
    }

    public function store(Request $request){
        //return $request;

          $awa = new Complaint();

          $sid = Student::where('student_id',$request->stu_id)->first()->id;
          $awa->stu_id = $sid;
          $awa->ins_id = $request->ins;
          $awa->title = $request->complaints;
          $awa->discription = $request->discription;
          $awa->save();

          $notification = array(
              'message' => 'Complaints Added Successfully!',
              'alert-type' => 'Success'
          );

          return redirect('registar/complaints/create')->with($notification);
         }

    public function view(){
        return view('registar.complain.view');
    }

    public function edit(){
        return view('registar.complain.edit');
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
                $dtar['ins_id'] = $row->institute;
                $dtar['ins'] = Institute::where('id',$row->institute)->first()->institute_name;
                $dtar['grd'] = Grade::where('id',$row->grade_now)->first()->grade;
                $dtar['label'] = $row->student_id;
                $dtar['value'] = $row->student_id;

                array_push($puar, $dtar);
            }
        }
            return $puar;

    }
}
