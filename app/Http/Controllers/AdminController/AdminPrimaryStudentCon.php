<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Grade;
use App\Models\InstClassFee;
use App\Models\Institute;
use App\Models\Parentm;
use App\Models\Siblin;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NurseryClassTable;
use App\Models\NurseryGradeTable;

class AdminPrimaryStudentCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
        $reg = Student::nursary_tbldata()->where('prmy',1);
        return view('admin.nersary_student.index',compact('reg'));
    }
    public function update(Request $request,$id){

      //return $request;
           $x = $request->register_date;
            $now = new Carbon( $x );
          //return $now = Carbon::now();
        // return  $date = Carbon::createFromFormat('Y-m-d H:i:s', $request->register_date)->format('Y');
           //return $now = Carbon::createFromFormat('Y-m-d H:i:s', $request->register_date)->format('d-m-Y');
          $year = $now->year;



           $clz_fee = InstClassFee::where('ins_id',$request->institute)->where('year', $now->year)->where('grd_id',$request->grade)->where('syl_id',$request->sy_type)->first();
          // return $clz_fee;
           if($clz_fee != null){
                 $fee = $clz_fee->fee;
            //return    $fee = 00.00;
           }else{
             //return   $fee = $clz_fee[0]->fee;
                  $fee = 00.00;
           }
           //return $fee;
            $sc_po_co = Student::where('institute',$request->institute)->count();
            $sc_po    = $sc_po_co + 1;
            $scl_code = Institute::where('id',$request->institute)->first()->code;
            $grd = 0;
            $gd  = str_pad($grd,2,"0", STR_PAD_LEFT);

            $year = $now->year;
            $isemty = Student::where('stu_status',5)->where('prmy',1)->get();
            if($isemty->isEmpty()){
                //"Empt";
                    $num = $scl_code.'/'.$year.'/'.'00001';
            }else{

              //$latnum = Student::orderBy('student_id', 'desc')->where('stu_status',5)->where('prmy',1)->whereyear('registration_date', $year)->first()->student_id;
              $latnum = Student::orderBy('student_id', 'desc')->where('stu_status',5)->where('prmy',1)->first()->student_id;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum  = substr($string, 4); //last 3 number ex 001
              $otputyear = substr($string, 0, 4); // last number's first 4 digit, year 2021-05-10 -> 2021
              //$otputgr = substr($string,4,2); //last number's first 4 digit,year

            //return $latnum;
                if( $year != $otputyear){
                    //return "Empt year";
                    //$num = $scl_code.'/'.$year.'/'.'0001';
                    $num = "GISN".'/'.$year.'/'.'00001';
                }else{
                  // return "Not Empt year";
                    //$num = $scl_code.'/'.$year.'/'. sprintf('%04d', $otputnum+1); //increment SID number in same grade
                    $num = "GISN".'/'.$year.'/'. sprintf('%05d', $otputnum+1);
                    // if($otputgr != $gd){
                    //             $num = $scl_code.'/'.$year.'/'.'0001';
                    //     }else{
                    //             $num = $scl_code.'/'.$year.'/'.$grd.'/'. sprintf('%04d', $otputnum+1); //increment SID number in same grade
                    //     }
                 }
            }
            //return $num;
             $fa_av = Parentm::select('parent_nic')->where('parent_nic',$request->father_nic)->where('fa_or_mom',1)->get();

        if($fa_av->isEmpty()){
          //  return "Emp";
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
       //$s_id = Student::find($id)->student_id;

        $student = Student::find($id);

        $student->institute   = $request->institute;
        // if($s_id == null){
        //     $student->student_id  = $num;
        //    }
        $student->student_id  = $num;
        $student->grade_now   = $request->grade;
        $student->syllubus_type = $request->sy_type;
        $student->registration_date  = $request->register_date;
        $student->recod       = $request->recod;
        $student->is_id_issue = $request->is_id_issue;
        $student->is_id_fee_paid = $request->is_id_paid;
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
        $student->any_medi_con = $request->any_medi_con;
        $student->medi_con_det = $request->medi_con_det;
        $student->special_attention = $request->special_attention;
        $student->have_siblin = $request->have_siblin;
        $student->siblin_details = $request->siblin_details;
        $student->leisure = $request->leisure;
        $student->whome_les = $request->whome_les;
        $student->doc_name = $request->doc_name;
        $student->doc_address = $request->doc_address;
        $student->helthcard = $request->helthcard;
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



        $notification = array(
            'message' => 'Stutend Registration Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/primary/inqueries')->with($notification);
       }

       public function view($id){

        $data  = Student::find($id);
        $institute = Institute::orderBy('institute_name', 'ASC')->where('status',1)->get();
        //$grade = Grade::orderBy('grade', 'ASC')->where('status',1)->get();
        $grade = Grade::orderBy('grade', 'ASC')->where('status',1)->where('nur_or_sch',2)->get();
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

        return view('admin.nersary_student.student_view',compact('data','institute','grade','sibl','fa','mo','st'));

       }

       public function edit($id){

        $data  = Student::find($id);
        $institute = Institute::orderBy('institute_name', 'ASC')->where('status',1)->where('pre_or_sch',1)->get();
        //$grade = Grade::orderBy('grade', 'ASC')->where('status',1)->get();
        $grade = Grade::orderBy('grade', 'ASC')->where('status',1)->where('nur_or_sch',2)->get();
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

        return view('admin.nersary_student.student_edit',compact('data','institute','grade','sibl','fa','mo','st'));

       }

       public function update_nersary(Request $request,$id){

         $fa_av = Parentm::select('parent_nic')->where('parent_nic',$request->father_nic)->where('fa_or_mom',1)->get();

    if($fa_av->isEmpty()){
      //  return "Emp";
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

    $student = Student::find($id);

    $student->institute   = $request->institute;

    $student->grade_now   = $request->grade;
    $student->registration_date  = $request->register_date;
    $student->recod       = $request->recod;
    $student->is_id_issue = $request->is_id_issue;
    $student->is_id_fee_paid = $request->is_id_paid;
    $student->pamt_typ    = $request->paymnt_type;
    $student->emergency_contact_nic = $request->nic;
    $student->emergency_contact_name = $request->name;
    $student->emergency_contact_mobile = $request->mobile;
    $student->emergency_contact_relationship = $request->relationship;
    $student->stu_status  = 5;
    $student->inq_status =4;
    $student->mom_id = $motherid;
    $student->fat_id = $fatherid;
    $student->any_medi_con = $request->any_medi_con;
    $student->medi_con_det = $request->medi_con_det;
    $student->special_attention = $request->special_attention;
    $student->have_siblin = $request->have_siblin;
    $student->siblin_details = $request->siblin_details;
    $student->leisure = $request->leisure;
    $student->whome_les = $request->whome_les;
    $student->doc_name = $request->doc_name;
    $student->doc_address = $request->doc_address;
    $student->helthcard = $request->helthcard;
    $student->stu_status  = $request->student_status;

    if($request->hasfile('stu_img')){

        $file =$request->file('stu_img');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('image/student/',$filename);
        $student->stu_img = $filename;

       }else{

       }

   $student->save();

    $notification = array(
        'message' => 'Stutend Update Successfully!',
        'alert-type' => 'Success'
    );

    return redirect('admin/nursary/students/table')->with($notification);
   }

   public function edit_grade($id){
    //return $id;
    $class     = NurseryClassTable::where('status',1)->get();
    $grade     = NurseryGradeTable::all();
    $data      = Student::find($id);

    $year_now = Carbon::now()->format('Y');
       // return  $institute;
    $clz_fee_year = InstClassFee::where('year', '>',$year_now)->get()->pluck('year');
    //$clz_fee_year = InstClassFee::where('ins_id',$student_data->institute)->where('year', '>',$year_now)->where('grd_id', '>',$student_data->grade_now)->where('syl_id',$student_data->syllubus_type)->get()->pluck('year');
    // return $clz_fee_year;
    $new_years = array_unique($clz_fee_year->toArray(), SORT_REGULAR);
    //return $new_years;
    return view('admin.nersary_student.grade',compact('class','grade','data','id','new_years'));
   }


   public function grade_update(Request $request,$id){
    //return $id;
        $clz_fee = InstClassFee::where('year',$request->grade_to_year)->where('grd_id',$request->grade_to_update)->first();
       //return  $clz_fee;
       if(!$clz_fee == ""){
        $fee = $clz_fee->fee;
       }else{
        $fee = "00.00";
       }
        $due_fee           = Student::select('due_fee')->where('id',$id)->first();
        $total_need_pay    = Student::select('total_need_pay')->where('id',$id)->first();
        $total_nd_pay_cot  = Student::select('total_nd_pay_cot')->where('id',$id)->first();

        $student = Student::find($id);
        $student->grade_fee        = $fee;
        $student->due_fee          = $due_fee->due_fee + $fee;
        $student->total_need_pay   = $total_need_pay->total_need_pay + $fee;
        $student->total_nd_pay_cot = $total_nd_pay_cot->total_nd_pay_cot + $fee;
        $student->is_pending_fee   = 1;
        $student->grade_now        = $request->grade_to_update;
        $student->class_now        = $request->class_new;
        $student->save();

        $notification = array(
            'message' => 'Student Update Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/school/students/table')->with($notification);
   }
}
