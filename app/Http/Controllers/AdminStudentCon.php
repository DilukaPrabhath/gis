<?php

namespace App\Http\Controllers;

use App\Models\Parentm;
use App\Models\Siblin;
use App\Models\Student;
use App\Models\TemTbl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

            //$inst = $request->institute;
//        return     $users = Student::select('id', 'created_at')
// ->get()
// ->groupBy(function($date) {
//     return Carbon::parse($date->created_at)->format('Y'); // grouping by years
//     //return Carbon::parse($date->created_at)->format('m'); // grouping by months
// });


            $sc_po_co = Student::where('institute',$request->institute)->count();
            $sc_po    = $sc_po_co + 1;

            $grd = $request->grade;
            $gd  = str_pad($grd,2,"0", STR_PAD_LEFT);
            $now = Carbon::now();
            $year = $now->year;
            $isemty = Student::where('stu_status',5)->get();
            if($isemty->isEmpty()){
              // return "Empt";
                       $num = 'GIS'.'/'.$year.'/'.$gd.'/'.'001';
            }else{
                // return "Not em";
              $latnum = Student::orderBy('student_id', 'desc')->where('stu_status',5)->first()->student_id;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 3 number ex 001
              $otputyear = substr($string, 0, 4); // last number's first 4 digit, year 2021-05-10 -> 2021
              $otputgr = substr($string,4,2); //last number's first 4 digit,year
                if( $year != $otputyear){
                        $num = 'GIS'.'/'.$year.'/'.$grd.'/'.'001';
                }else{
                    if($otputgr != $gd){
                        $num = 'GIS'.'/'.$year.'/'.$grd.'/'.'0001';
                        }else{
                        $num = 'GIS'.'/'.$year.'/'.$grd.'/'. sprintf('%03d', $otputnum+1); //increment SID number in same grade
                        }
                 }
            }

        $fa_av = Parentm::select('parent_nic')->where('parent_nic',$request->father_nic)->where('fa_or_mom',1)->get();

        if($fa_av->isEmpty()){
            // return "Emp";
            $father = new Parentm();

            $father->parent_nic = $request->father_nic;
            $father->parent_name  = $request->father_name;
            $father->parent_mobile = $request->father_mobile;
            $father->parent_email  = $request->father_email;
            $father->parent_work_address = $request->father_address_of_work_place;
            $father->parent_ocupation = $request->father_occupation;
            $father->fa_or_mom = 1; //father
            $father->save();

            $fatherid = $father->id;
        }else{
            $fter = Parentm::where('parent_nic',$request->father_nic)->get();
            $fatherid = $fter[0]->id;
            //return "not Emp";
        }

        $mo_av = Parentm::select('parent_nic')->where('parent_nic',$request->mother_nic)->where('fa_or_mom',2)->get();

        if($mo_av->isEmpty()){
            // return "Emp";

        $mom = new Parentm();

        $mom->parent_nic = $request->mother_nic;
        $mom->parent_name  = $request->mother_name;
        $mom->parent_mobile = $request->mother_mobile;
        $mom->parent_email  = $request->mother_email;
        $mom->parent_work_address = $request->mother_address_of_work_place;
        $mom->parent_ocupation = $request->mother_occupation;
        $mom->fa_or_mom = 2; //mother
        $mom->save();

        $motherid = $father->id;

        }else{

        $mter = Parentm::where('parent_nic',$request->mother_nic)->get();
        $motherid = $mter[0]->id;
        //return "not Emp";
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
        $student->mom_id = $motherid;
        $student->fat_id = $fatherid;
        $student->scl_po_no = $sc_po;

        if($request->hasfile('stu_img')){

            $file =$request->file('stu_img');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('image/student/',$filename);
            $student->stu_img = $filename;

           }else{

           }

       $student->save();

       $ttn1 = $request->ttn1;
       $ttn2 = $request->ttn2;

       $temp = TemTbl::where('temp_id_1', $request->ttn1)->where('temp_id_2', $request->ttn2)->get();

       if( $temp ){
        $temp->map(function($emp) use($student){

          $siblin = new Siblin();

          $siblin->s_id   = $student->id;
          $siblin->stu_id = $emp->str_2;
          $siblin->relationship = $emp->str_3;
          $siblin->save();

          $emp->delete();
        });
      }

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

       public function temp_in(Request $request){

        $data = new TemTbl();

        $data->temp_id_1 = $request->ttn1;
        $data->temp_id_2 = $request->ttn2;
        $data->int_1     = $request->sid;
        $data->str_2     = $request->st_id;
        $data->str_3     = $request->st_rel;
        $data->save();

        $ttn1 = $request->ttn1;
        $ttn2 = $request->ttn2;
        return $this->createReservicetbl($ttn1, $ttn2);
       }

       //create temp table
public function createReservicetbl($ttn1, $ttn2){

    $data = TemTbl::where('temp_id_1',$ttn1)->where('temp_id_2',$ttn2)->get();
    $tbdt = '';
    $numb = 1;
    if(count($data) > 0){
        foreach($data as $row){
            $tbdt.="
                <tr>
                <td>".str_pad($numb,2,"0",STR_PAD_LEFT)."</td>
                <td>".$row->str_2."</td>
                <td>".$row->str_3."</td>
                <td>"."<a href='#' class='btn btn-danger btn-condensed delete' title='Delete Item' id='$row->id' ><i class='fa fa-trash'></i></a></td>
                </tr>
            ";
            $numb ++;
        }
    }
    return $tbdt;
}


public function tempremove(Request $request){


     $tememp = TemTbl::find($request->remid)->delete();
     $ttn1 = $request->tbttn1;
     $ttn2 = $request->tbttn2;
     return $this->createReservicetbl($ttn1, $ttn2);
}

       public function parent2_details(Request $request){
        $puar = array();
        $dtar = array();
        $nic = $request->father_nic;

        //return $request;
        // exit();
        // $data =Parentm::select("parent_nic")
        //         ->where("parent_nic","LIKE","{$request->parent_nic2}%")
        //         ->get();
        $data =Parentm::whereRaw('parent_nic LIKE "%'.$nic.'%"')->get();
        //$data = Parentm::load_drdwn_data($nic);
        if(count($data) > 0){
            foreach($data as $row){
                $dtar['father_nic'] = $row->parent_nic;
                $dtar['father_name'] = $row->parent_name;
                $dtar['father_mobile'] = $row->parent_mobile;
                $dtar['father_email'] = $row->parent_email;
                $dtar['father_work_address'] = $row->parent_work_address;
                $dtar['parent_ocupation'] = $row->parent_ocupation;
                $dtar['label'] = $row->parent_nic;
                $dtar['value'] = $row->parent_nic;

                array_push($puar, $dtar);
            }
        }
            return $puar;
       }


       public function siblins(Request $request){
        $puar = array();
        $dtar = array();
        $sid = $request->st_id;

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


}
