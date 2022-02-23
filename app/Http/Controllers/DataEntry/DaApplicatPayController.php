<?php

namespace App\Http\Controllers\DataEntry;

use App\Models\ApplicationPay;
use App\Models\Institute;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaApplicatPayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //$tbl = ApplicationPay::application_tbldata();
        $tbl = ApplicationPay::all();
        return view('data_entry.application_pay.index',compact('tbl'));
       }

       public function create(){
        return view('data_entry.application_pay.create');
       }

       public function store(Request $request){

        $this->validate(request(), [

            'price'  => 'required',
            'inq_num'    => 'required',
            ]);

            $now = Carbon::now();
            $year = $now->year;
            $mon    = $now->month;
            $mo  = str_pad($mon,2,"0", STR_PAD_LEFT);
            $timcode = $year.$mo;
            $isemty = ApplicationPay::all();
            if($isemty->isEmpty()){
                $num = 'RE'.'/'.$year.$mo.'/'. '0001';
            }else{
              $latnum = ApplicationPay::orderBy('slip_num', 'desc')->first()->slip_num;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 4 number ex 0001
              $otputyemo = substr($string, 0, 6); // last number's first 6 digit, year and month 2021-05 -> 202105
              $otputyea = substr($string, 0, 4); //last number's first 4 digit,year
                if( $year != $otputyea){
                        $num = 'RE'.'/'.$year.$mo.'/'.'0001';
                }else{
                    if($timcode != $otputyemo){
                         $num = 'RE'.'/'.$year.$mo.'/'.'0001';
                        }else{
                         $num = 'RE'.'/'.$year.$mo.'/'. sprintf('%04d', $otputnum+1); //increment RE number in same month
                        }
                 }
            }

          //  return $request;

           $pay = new ApplicationPay();
           $pay->inq_id = $request->inq_num;
           $pay->price  = $request->price;
           $pay->institute_id = 1;
           $pay->slip_num = $num;
           $pay->status   = 1;
           $pay->save();

         $data = Student::where('inq_number',$request->inq_num)->get();
         $i_id = $data[0]->id;

         $inqu = Student::find($i_id);

         $inqu->resipt_number = $num;
         $inqu->application_status = 1;
         $inqu->save();

         $notification = array(
            'message' => 'Payment Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('data_entry/application_pay')->with($notification);
       }

       public function view($id){
        return view('data_entry.application_pay.view');
    }

       public function print($id){
           $data = ApplicationPay::find($id);
           $ins = Institute::find($data->institute_id);
           return view('data_entry.application_pay.print',compact('data','ins'));
       }

}


