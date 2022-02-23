<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Models\Admition;
use App\Models\Institute;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccAdmitionCon extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        $data = Admition::all();
        return view('accountant.admition.index',compact('data'));
       }

       public function Create(){
        // $data = Admition::all();
        return view('accountant.admition.create');
       }

       public function store(Request $request){
            //return $request;

            $now = Carbon::now();
            $year = $now->year;
            $mon  = $now->month;
            $mo  = str_pad($mon,2,"0", STR_PAD_LEFT);
            $timcode = $year.$mo;
            $isemty = Admition::all();
            if($isemty->isEmpty()){
                //return "rm";
                  $num = 'ADM'.'/'.$year.$mo.'/'. '0001';
            }else{
              $latnum = Admition::orderBy('recipt_no', 'desc')->first()->recipt_no;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 4 number ex 0001
              $otputyemo = substr($string, 0, 6); // last number's first 6 digit, year and month 2021-05 -> 202105
              $otputyea = substr($string, 0, 4); //last number's first 4 digit,year
                if( $year != $otputyea){
                    //return "check year";
                      $num = 'ADM'.'/'.$year.$mo.'/'.'0001';
                }else{
                    if($timcode != $otputyemo){
                        //return "check month";
                        return     $num = 'ADM'.'/'.$year.$mo.'/'.'0001';
                        }else{
                            // return "check id";
                             $num = 'ADM'.'/'.$year.$mo.'/'. sprintf('%04d', $otputnum+1); //increment RE number in same month
                        }
                 }
            }

            $studid = Student::select('id')->where('student_id',$request->st_id_num)->first();
            $sntid = $studid->id;
            $pay = new Admition();
            $pay->student_sid = $request->st_id_num;
            $pay->price  = $request->price;
            $pay->recipt_no = $num;
            $pay->school_id = Auth::user()->ins_id;
            $pay->user_id = Auth::user()->id;
            $pay->status   = 1;
            $pay->save();

            $student = Student::find($sntid);

            $student->admition_fee = 1;
            $student->save();

            $notification = array(
                'message' => 'Payment Successfully!',
                'alert-type' => 'Success'
            );

            return redirect('accountant/admition')->with($notification);
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


       public function print($id){
        $data = Admition::find($id);
        $ins = Institute::find($data->school_id);
        return view('accountant.admition.print',compact('data','ins'));
    }



         // validation ________________________________________________________________________________________

           //ID
           public function  validate_student_id(Request $request){
            {
                //return $request;

                $stu = Student::where('student_id', $request->st_id_num)->where('admition_fee' ,'!=', 1)->first('student_id');
                   if($stu){
                    $return= false;
                    }
                    else{
                     $return =  true;
                    }
                    echo json_encode($return);
                    exit;
               }
           }


}
