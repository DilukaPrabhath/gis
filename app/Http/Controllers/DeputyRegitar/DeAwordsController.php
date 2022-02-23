<?php

namespace App\Http\Controllers\DeputyRegitar;

use App\Models\Achievement;
use App\Models\Grade;
use App\Models\Institute;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeAwordsController extends Controller
{
    public function index(){
        return view('de_registar.acc_aworde.index');
       }

    public function create(){
        return view('de_registar.acc_aworde.create');
       }

    public function store(Request $request){
      //return $request;

        $awa = new Achievement();

        $sid = Student::where('student_id',$request->stu_id)->first()->id;
        $awa->stu_id = $sid;
        $awa->ins_id = $request->ins;
        $awa->title = $request->award;
        $awa->discription = $request->discription;
        $awa->ac_or_ex = 1;
        $awa->save();

        $notification = array(
            'message' => 'Award Added Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('de_registar/awards/create')->with($notification);
       }

    public function view(){
        return view('de_registar.acc_aworde.view');
       }

    public function edit(){
        return view('de_registar.acc_aworde.edit');
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
