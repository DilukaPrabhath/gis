<?php

namespace App\Http\Controllers\DeputyRegitar;

use App\Models\Grade;
use App\Models\InstClassFee;
use App\Models\Institute;
use App\Models\Parentm;
use App\Models\ProfileImage;
use App\Models\Siblin;
use App\Models\Student;
use App\Models\TemTbl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class DeStudentController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
        $reg = Student::application_tbldata()->whereNotIn('prmy', 1);
        return view('de_registar.student.index',compact('reg'));
       }

       public function update(Request $request,$id){

        $x = $request->register_date;
            $now = new Carbon( $x );


            $clz_fee = InstClassFee::where('ins_id',$request->institute)->where('year', $now->year)->where('grd_id',$request->grade)->where('syl_id',$request->sy_type)->first();
            if($clz_fee != null){
                  $fee = $clz_fee->fee;
             //return    $fee = 00.00;
            }else{
              //return   $fee = $clz_fee[0]->fee;
                   $fee = 00.00;
            }

            $sc_po_co = Student::where('institute',$request->institute)->count();
            $sc_po    = $sc_po_co + 1;
            $year = $now->year;
            $grd = $request->grade;
            $gd  = str_pad($grd,2,"0", STR_PAD_LEFT);

            $isemty = Student::where('stu_status',5)->get();
            if($isemty->isEmpty()){
              // return "Empt";
                       $num = 'GIS'.'/'.$year.'/'.$gd.'/'.'001';
            }else{
                // return "Not em";
              $latnum = Student::orderBy('student_id', 'desc')->where('stu_status',5)->whereyear('registration_date', $year)->first()->student_id;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 3 number ex 001
              $otputyear = substr($string, 0, 4); // last number's first 4 digit, year 2021-05-10 -> 2021
              $otputgr = substr($string,4,2); //grd 2 digit,year
                if( $year != $otputyear){
                      $num = 'GIS'.'/'.$year.'/'.$gd.'/'.'001';
                }else{

                    if($otputgr != $gd){

                        $lst_grd_st = Student::orderBy('student_id', 'desc')->where('grade_now',$request->grade)->whereyear('registration_date', $year)->get();

                        if($lst_grd_st->isEmpty()){
                             $num = 'GIS'.'/'.$year.'/'.$gd.'/'.'001';
                        }else{
                            $stu_id = $lst_grd_st[0]->student_id;
                            $sting =  preg_replace("/[^0-9\.]/", '', $stu_id);
                            $otputnum2 = substr($sting, 6); //last 3 number ex 001
                            $num = 'GIS'.'/'.$year.'/'.$gd.'/'. sprintf('%03d', $otputnum2+1);
                        }

                        //    if($lst_grd_st->isEmpty()){
                    //     // return "Empt";
                    //          return    $num = 'GIS'.'/'.$year.'/'.$gd.'/'.'001';
                    //   }else{
                    //    return $string_lst =  preg_replace("/[^0-9\.]/", '', $lst_grd_st);
                    //   }
                    // return    $num = 'GIS'.'/'.$year.'/'.$gd.'/'.'001';
                    //     }else{
                    //         return  "Equal";
                    // return    $num = 'GIS'.'/'.$year.'/'.$gd.'/'. sprintf('%03d', $otputnum+1); //increment SID number in same grade
                    //     }
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

        $motherid = $mom->id;

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
        $student->grade_fee = $fee;
        $student->total_need_pay = $fee;
        $student->total_nd_pay_cot = $fee;
        $student->due_fee = $fee;



        if($request->hasfile('stu_img')){

            $file =$request->file('stu_img');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('image/student/',$filename);
            $student->stu_img = $filename;

           }else{

           }

       $student->save();

       if($student->stu_img != null){
        $proimg = new ProfileImage();

        $proimg->stu_id = $student->id;
        $proimg->pro_image = $student->stu_img;
        $proimg->status = 1;

        $proimg->save();
       }

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

        return redirect('de_registar/inqueries')->with($notification);
       }

       public function create(){
        return view('de_registar.student.create');
       }

       public function view($id){

        $data  = Student::find($id);
        $institute = Institute::orderBy('institute_name', 'ASC')->where('status',1)->get();
        $grade = Grade::orderBy('grade', 'ASC')->where('status',1)->where('nur_or_sch',1)->get();
        //$grade = Grade::orderBy('grade', 'ASC')->where('status',1)->get();
        $st = $data->stu_status;
      if($st == 5 || $st == 6){

        $fa = Parentm::where('id',$data->fat_id)->where('fa_or_mom',1)->first();
        $mo = Parentm::where('id',$data->mom_id)->where('fa_or_mom',2)->first();
      }else{

        $fa = 0;
        $mo = 0;
      }

        $sibl = Siblin::where('s_id',$id)->get();
        // $institute = Institute::where('status',1)->get();

        return view('de_registar.student.student_view',compact('data','institute','grade','sibl','fa','mo','st'));

       }

       public function edit($id){
        $data  = Student::find($id);
        $institute = Institute::orderBy('institute_name', 'ASC')->where('status',1)->where('pre_or_sch',2)->get();
        //$grade = Grade::orderBy('grade', 'ASC')->where('status',1)->get();
        $grade = Grade::orderBy('grade', 'ASC')->where('status',1)->where('nur_or_sch',1)->get();
        $st = $data->stu_status;
      if($st == 5 || $st == 6){

        $fa = Parentm::where('id',$data->fat_id)->where('fa_or_mom',1)->first();
        $mo = Parentm::where('id',$data->mom_id)->where('fa_or_mom',2)->first();
      }else{

        $fa = 0;
        $mo = 0;
      }
        $ttn1 = Str::random(6);
        $ttn2 = Str::random(6);

    //    $tabdata = Siblin::where('s_id',$id)->get();
       $sql= DB::table('siblins')
            ->select('siblins.*')
            ->where('siblins.s_id', '=', $id)
            ->get();



       if($sql){
            //return "yes"; temp data inserting

            $sql->map(function($emp) use($ttn1,$ttn2){

                $data = new TemTbl();

                $data->temp_id_1 = $ttn1;
                $data->temp_id_2 = $ttn2;
                $data->int_1     = $emp->s_id;
                $data->str_2     = $emp->stu_id;
                $data->str_3     = $emp->relationship;
                $data->save();

              });

       }

        $sibl = Siblin::where('s_id',$id)->get();
        // $institute = Institute::where('status',1)->get();
        return view('de_registar.student.student_edit',compact('data','institute','grade','sibl','fa','mo','st','ttn1','ttn2'));
       }


       //temperory data insert
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


//temp Edit table priview
public function temp_edit_load(Request $request){
    // return"Hi";
 //return $request;
     $ttn1 = $request->ttn1;
     $ttn2 = $request->ttn2;
     return $this->createReservicetbl($ttn1, $ttn2);
 }


//remove temp table
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


       //search
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


       //Update mood on student tab
       public function update_data(Request $request,$id){


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

        $motherid = $mom->id;

        }else{

        $mter = Parentm::where('parent_nic',$request->mother_nic)->get();
        $motherid = $mter[0]->id;
        //return "not Emp";
        }

       // return $request;
       $s_id = Student::find($id)->student_id;

        $student = Student::find($id);

        $student->institute   = $request->institute;

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
        $student->stu_status  = $request->student_status;
        $student->inq_status =4;
        $student->mom_id = $motherid;
        $student->fat_id = $fatherid;

        if($request->hasfile('stu_img')){

            $file =$request->file('stu_img');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('image/student/',$filename);
            $student->stu_img = $filename;

           }else{

           }

       $student->save();

       $proimg = new ProfileImage();

       $proimg->stu_id = $id;
       $proimg->stu_id = $student->stu_img;
       $proimg->status = 1;

       $proimg->save();

       $temp = TemTbl::where('temp_id_1', $request->ttn1)->where('temp_id_2', $request->ttn2)->get();

       $data = Siblin::where('s_id',$id)->get();

       if( $data ){
         Siblin::where('s_id',$id)->delete();
       }

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
            'message' => 'Stutend Update Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('de_registar/school/students/table')->with($notification);
       }


}
