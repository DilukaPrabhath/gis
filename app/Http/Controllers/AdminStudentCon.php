<?php

namespace App\Http\Controllers;

use App\Models\Parentm;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminStudentCon extends Controller
{
    public function index(){
        $reg = Student::reg_tbldata();
        return view('admin.student.index',compact('reg'));
       }

       public function update(Request $request,$id){
        //return $request;
        // $this->validate(request(), [

        //     'parent_nic2' => 'required',
        //     'parent_name2' => 'required',
        //     'parent_email2' => 'required',
        //     'parent_mobile2' => 'required',
        //     'address2' => 'required',
        //     'relationship2' => 'required',
        //     ]);


        $now = Carbon::now();
            $year = $now->year;
            $mon    = $now->month;
            $timcode = $year.$mon;
            $isemty = Student::where('stu_status',5)->get();
            if($isemty->isEmpty()){
              // return "Empt";
               $num = 'GIS'.'/'.$year.$mon.'/'. '0001';
            }else{
                // return "Not em";
              $latnum = Student::orderBy('student_id', 'desc')->where('stu_status',5)->first()->student_id;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 4 number ex 0001
              $otputyemo = substr($string, 0, 6); // last number's first 6 digit, year and month 2021-05 -> 202105
              $otputyea = substr($string, 0, 4); //last number's first 4 digit,year
                if( $year != $otputyea){
                        $num = 'GIS'.'/'.$year.$mon.'/'.'0001';
                }else{
                    if($timcode != $otputyemo){
                         $num = 'GIS'.'/'.$year.$mon.'/'.'0001';
                        }else{
                        $num = 'GIS'.'/'.$year.$mon.'/'. sprintf('%04d', $otputnum+1); //increment IQ number in same month
                        }
                 }
            }

        // return $request;
       $s_id = Student::find($id)->student_id;

        $student = Student::find($id);

        $student->institute   = $request->institute;
        if($s_id == null){
            $student->student_id  = $num;
           }
        $student->grade_now   = $request->grade;
        $student->registration_date  = $request->register_date;
        $student->pre_sc_att  = $request->gis_pr_sc_at;
        $student->pre_school_id  = $request->gis_sid;
        $student->recod       = $request->recod;
        $student->is_id_issue = $request->is_id_issue;
        $student->is_id_fee_paid = $request->is_id_paid;
        $student->syllubus_type = $request->sy_type;
        $student->pamt_typ    = $request->paymnt_type;
        $student->emergency_contact_nic = $request->nic;
        $student->emergency_contact_name = $request->name;
        $student->emergency_contact_mobile = $request->mobile;
        $student->emergency_contact_relationship = $request->relationship;
        $student->stu_status  = 5;
        $student->inq_status =4;

        if($request->hasfile('stu_img')){

            $file =$request->file('stu_img');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('image/student/',$filename);
            $student->stu_img = $filename;

           }else{

           }

        $student->save();


        $parent = Parentm::find($request->prt_id);

        $parent->st_id = $student->id;
        $parent->parent_nic = $request->parent1_nic;
        $parent->parent_name  = $request->parent1_name;
        $parent->parent_mobile = $request->parent1_mobile;
        $parent->parent_email  = $request->parent1_email;
        $parent->parent_address = $request->address1;
        $parent->parent_relationship = $request->relationship1;
        $parent->save();

           if($request->prt2_id == 0){
            $parent = new Parentm();
           }else{
            $parent = Parentm::find($request->prt2_id);
           }

        $parent->st_id = $student->id;
        $parent->parent_nic = $request->parent_nic2;
        $parent->parent_name  = $request->parent_name2;
        $parent->parent_mobile = $request->parent_mobile2;
        $parent->parent_email  = $request->parent_email2;
        $parent->parent_address = $request->address2;
        $parent->parent_relationship = $request->relationship2;
        $parent->save();

        $notification = array(
            'message' => 'Stutend Registration Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/inqueries')->with($notification);
       }

       public function create(){
        return view('admin.student.create');
       }

       public function view(){
        return view('admin.student.view');
       }

       public function edit(){
        return view('admin.student.edit');
       }

       public function parent2_details(Request $request){
        $puar = array();
        $dtar = array();
        $nic = $request->parent_nic2;

        //return $request;
        // exit();
        // $data =Parentm::select("parent_nic")
        //         ->where("parent_nic","LIKE","{$request->parent_nic2}%")
        //         ->get();
        $data =Parentm::whereRaw('parent_nic LIKE "%'.$nic.'%"')->get();
        //$data = Parentm::load_drdwn_data($nic);
        if(count($data) > 0){
            foreach($data as $row){
                $dtar['parent_nic2'] = $row->parent_nic;
                $dtar['parent_name2'] = $row->parent_name;
                $dtar['parent_mobile2'] = $row->parent_mobile;
                $dtar['parent_email2'] = $row->parent_email;
                $dtar['parent_address2'] = $row->parent_address;
                $dtar['parent_relationship2'] = $row->parent_relationship;
                $dtar['label'] = $row->parent_nic;
                $dtar['value'] = $row->parent_nic;

                array_push($puar, $dtar);
            }
        }
            return $puar;
       }
}
