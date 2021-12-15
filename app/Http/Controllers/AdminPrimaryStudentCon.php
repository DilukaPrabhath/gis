<?php

namespace App\Http\Controllers;

use App\Models\Parentm;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPrimaryStudentCon extends Controller
{
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

            $grd = 0;
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

        $motherid = $father->id;

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
}