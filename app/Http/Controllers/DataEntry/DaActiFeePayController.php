<?php

namespace App\Http\Controllers\DataEntry;

use App\Models\Activity;
use App\Models\ActivityFeePayment;
use App\Models\Institute;
use App\Models\Parentm;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class DaActiFeePayController extends Controller
{
    public function index(){
        $tbl = ActivityFeePayment::tbl();
        //$tbl = ActivityFeePayment::all();
        return view('data_entry.activity_payment.index',compact('tbl'));
    }

    public function create(){
        $acti = Activity::all();
        return view('data_entry.activity_payment.create',compact('acti'));
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
            $studata = Student::where('student_id',$request->st_id_num)->get();
            $insdata = Institute::find($studata[0]->institute);
            $stuname = $studata[0]->student_full_name;
            $fatherdata = Parentm::find($studata[0]->fat_id);
            $fatemail = $fatherdata->parent_email;
            $fatname = $fatherdata->parent_name;
            $motherdata = Parentm::find($studata[0]->mom_id);
            $motname = $fatherdata->parent_name;
            $motemail = $motherdata->parent_email;
            $activitydata = Activity::find($request->activity);
            $activityname = $activitydata->activity;


            $actpat = new ActivityFeePayment();

            $actpat->price = $request->price;
            $actpat->stu_num = $request->st_id_num;
            $actpat->activity_id = $request->activity;
            $actpat->rec_num = $num;
            $actpat->inst_id = 1;
            $actpat->status = 1;
            $actpat->save();



            $data = [
                'subject' => "Activity Payments",
                'stuname' => "$stuname",
                'pay_time'=> Carbon::parse($actpat->created_at)->format('d/m/Y'),
                'email' => $fatemail,
                'parname' => $fatname,
                'fromemail' => 'task123test123@gmail.com',
                'content' => $activityname,
                'number'  => $num,
                'price'  => $request->price,
                'stu_no'  => $request->st_id_num,
                'institute' => $insdata->institute_name,
                'insemail' => $insdata->email,
                'insadd_line_1' => $insdata->address_line_1,
                'insadd_line_2' => $insdata->address_line_2,
                'city' => $insdata->city,
              ];

              $data2 = [
                'subject' => "Activity Payments",
                'stuname' => "$stuname",
                'pay_time'=> Carbon::parse($actpat->created_at)->format('d/m/Y'),
                'email' => $motemail,
                'parname' => $motname,
                'fromemail' => 'task123test123@gmail.com',
                'content' => $activityname,
                'number'  => $num,
                'price'  => $request->price,
                'stu_no'  => $request->st_id_num,
                'institute' => $insdata->institute_name,
                'insemail' => $insdata->email,
                'insadd_line_1' => $insdata->address_line_1,
                'insadd_line_2' => $insdata->address_line_2,
                'city' => $insdata->city,
              ];

            Mail::send('data_entry.emails.mail', $data, function($message) use ($data) {
                $message->to($data['email'])
                ->from('task123test123@gmail.com','test mail')
                ->subject($data['subject']);
              });

            Mail::send('data_entry.emails.mail', $data2, function($message) use ($data) {
                $message->to($data['email'])
                ->from('task123test123@gmail.com','test mail')
                ->subject($data['subject']);
              });


            $notification = array(
                'message' => 'Activity Payment Successfully!',
                'alert-type' => 'Success'
            );

            return redirect('data_entry/activities_payments')->with($notification);

        }


        public function print($id){
            $data = ActivityFeePayment::print($id);
            //return $s = $data[0]->inst_id;
             $ins = Institute::find($data[0]->inst_id);
            return view('data_entry.activity_payment.print',compact('data','ins'));
        }

           // validation ________________________________________________________________________________________

           //ID
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


