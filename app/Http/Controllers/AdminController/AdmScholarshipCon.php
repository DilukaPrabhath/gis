<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Grade;
use App\Models\Institute;
use App\Models\Scholarship;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdmScholarshipCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
        return view('admin.scholarship_request.index');
       }

       public function create(){

        return view('admin.scholarship_request.create');
       }

       public function store(Request $request){
           //return $request;
           $s_ship = new Scholarship();

           $s_ship->st_num = $request->stu_id;
           $s_ship->disc_prtg = $request->precentage;
           $s_ship->disc_amount = $request->dicu_amo;
           $s_ship->user_id = Auth::user()->id;
           $s_ship->scl_shp_typ = $request->dis_type;
           $s_ship->years_count = $request->year_count;
           $s_ship->note = $request->note;
           $s_ship->save();

           $stu = Student::where('student_id',$request->stu_id)->first();

           //$tnp = $stu->total_need_pay - $request->prtg_am;

           $stu_data = Student::find($stu->id);

           $stu_data->disct_typ   = $request->dis_type;
           $stu_data->prtg_amount = $request->prtg_am;
           $stu_data->dis_amount  = $request->dicu_amo;

           if($request->dis_type == 1){
           $stu_data->total_need_pay  = $stu->total_need_pay - $request->prtg_am;
           $stu_data->total_nd_pay_cot  = $stu->total_nd_pay_cot - $request->prtg_am;
           $stu_data->due_fee  = $stu->due_fee - $request->prtg_am;
           $stu_data->grade_fee  = $stu->grade_fee - $request->prtg_am;
           }

           if($request->dis_type == 2){
           $stu_data->total_need_pay  = $stu->total_need_pay - $request->dicu_amo;
           $stu_data->total_nd_pay_cot  = $stu->total_nd_pay_cot - $request->dicu_amo;
           $stu_data->due_fee  = $stu->due_fee - $request->dicu_amo;
           $stu_data->grade_fee  = $stu->grade_fee - $request->dicu_amo;
           }

           $stu_data->save();

           $notification = array(
            'message' => 'Scholarship Added Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/scholarship')->with($notification);

        }

       public function autoload(Request $request){
            //return $request;
            $puar = array();
            $dtar = array();
           $sid = $request->stu_id;

            $data =Student::whereRaw('student_id LIKE "%'.$sid.'%"')->get();
            //$data = Parentm::load_drdwn_data($nic);
            if(count($data) > 0){
                foreach($data as $row){

                    $dtar['student_name'] = $row->student_full_name;
                    if($row->prmy != 1){
                        $gd_name = Grade::find($row->grade_now);
                        $dtar['gd_name'] = $gd_name->grade;
                    }else{
                        $dtar['gd_name'] = "Primary";
                    }

                    $dtar['class_fee'] = $row->grade_fee;
                    $sc_name = Institute::find($row->institute);
                    $dtar['school'] = $sc_name->institute_name;
                    $dtar['sid']   = $row->id;
                    $dtar['label'] = $row->student_id;
                    $dtar['value'] = $row->student_id;

                    array_push($puar, $dtar);
                }
            }
                return $puar;
          }

}
