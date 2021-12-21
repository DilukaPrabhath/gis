<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityFeePayment;
use App\Models\Institute;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminActiFeePayCon extends Controller
{
    public function index(){
        $tbl = ActivityFeePayment::tbl();
        //$tbl = ActivityFeePayment::all();
        return view('admin.activity_payment.index',compact('tbl'));
    }

    public function create(){
        $acti = Activity::all();
        return view('admin.activity_payment.create',compact('acti'));
    }

    public function select_price(Request $request){

        //$id = $request->id;
        $data = Activity::find( $request->id);
        $price = $data->price;

        if($price){
            return $price;
        }else{
            $price = null;
            return $price;
        }

    }

    public function student_id(Request $request){

            //return $request;
            $puar = array();
            $dtar = array();
            $sid = $request->st_id_num;

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

           public function store(Request $request){

            $now = Carbon::now();
            $year = $now->year;
            $mon    = $now->month;
            $timcode = $year.$mon;
            $isemty = ActivityFeePayment::all();
            if($isemty->isEmpty()){
                $num = 'ACT'.'/'.$year.$mon.'/'. '0001';
            }else{
              $latnum = ActivityFeePayment::orderBy('rec_num', 'desc')->first()->rec_num;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 4 number ex 0001
              $otputyemo = substr($string, 0, 6); // last number's first 6 digit, year and month 2021-05 -> 202105
              $otputyea = substr($string, 0, 4); //last number's first 4 digit,year
                if( $year != $otputyea){
                        $num = 'ACT'.'/'.$year.$mon.'/'.'0001';
                }else{
                    if($timcode != $otputyemo){
                         $num = 'ACT'.'/'.$year.$mon.'/'.'0001';
                        }else{
                         $num = 'ACT'.'/'.$year.$mon.'/'. sprintf('%04d', $otputnum+1); //increment RE number in same month
                        }
                 }
            }
            //$id = $request->id;
            $actpat = new ActivityFeePayment();

            $actpat->price = $request->price;
            $actpat->stu_num = $request->st_id_num;
            $actpat->activity_id = $request->activity;
            $actpat->rec_num = $num;
            $actpat->inst_id = 1;
            $actpat->status = 1;
            $actpat->save();

            $notification = array(
                'message' => 'Activity Payment Successfully!',
                'alert-type' => 'Success'
            );

            return redirect('admin/activities_payments')->with($notification);

        }


        public function print($id){
            $data = ActivityFeePayment::print($id);
            //return $s = $data[0]->inst_id;
             $ins = Institute::find($data[0]->inst_id);
            return view('admin.activity_payment.print',compact('data','ins'));
        }

           // validation ________________________________________________________________________________________

           //name
       public function  validate_student_id(Request $request){
        {
            //return $request;

            $stu = Student::where('student_id', $request->st_id_num)->first('student_id');
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
