<?php

namespace App\Http\Controllers\AdminController;

use App\Models\ClassFeePayment;
use App\Models\Institute;
use App\Models\Parentm;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\PaymentCorrection;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class AdminPaymentCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
        $tbl = ClassFeePayment::all();
        return view('admin.payment.index',compact('tbl'));
       }

       public function check_payment(Request $request){
        return $request;
       }

       public function create(){
        return view('admin.payment.create');
       }


       public function view(){
        return view('admin.payment.view');
       }

       public function edit(){
        return view('admin.payment.edit');
       }

       public function old_payment(){
        return view('admin.payment.old_payment');
       }

       public function student_class_fee(Request $request){
         //return $request;
         $puar = array();
         $dtar = array();
         $sid = $request->stu_id;

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



       public function student_select(Request $request){
            $ins_val = $request->stu_id;
            $data = Student::where('student_id',$request->stu_id)->first();
            $tbl  = ClassFeePayment::orderBy('id', 'DESC')->where('stu_num',$request->stu_id)->take(5)->get();
            return view('admin.payment.create',compact('data','tbl','ins_val'));
            // return $data;
         }


         public function store(Request $request){
           // return $request;
            $this->validate(request(), [
                'amout'    => 'required',
                'prtg'     => 'required',
                'pay_type' => 'required',
                ]);

            $now = Carbon::now();
            $year = $now->year;
            $mon  = $now->month;
            $mo  = str_pad($mon,2,"0", STR_PAD_LEFT);
            $timcode = $year.$mo;
            $isemty = ClassFeePayment::all();
            // return $request;
            if($isemty->isEmpty()){
                //return "rm";
                  $num = 'Fee'.'/'.$year.$mo.'/'. '0001';
            }else{
              $latnum = ClassFeePayment::orderBy('recipt_id', 'desc')->first()->recipt_id;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 4 number ex 0001
              $otputyemo = substr($string, 0, 6); // last number's first 6 digit, year and month 2021-05 -> 202105
              $otputyea = substr($string, 0, 4); //last number's first 4 digit,year
                if( $year != $otputyea){
                    //return "check year";
                      $num = 'Fee'.'/'.$year.$mo.'/'.'0001';
                }else{
                    if($timcode != $otputyemo){
                        //return "check month";
                             $num = 'Fee'.'/'.$year.$mo.'/'.'0001';
                        }else{
                            // return "check id";
                             $num = 'Fee'.'/'.$year.$mo.'/'. sprintf('%04d', $otputnum+1); //increment RE number in same month
                        }
                 }
            }

            //return $num;
                $fee = new ClassFeePayment();

                $fee->recipt_id = $num;
                $fee->stu_num = $request->stu_id_1;
                $fee->price   = $request->amout;
                $fee->intrest    = $request->prtg;
                $fee->sub_total = $request->total;
                $fee->payment_type = $request->pay_type;
                $fee->pay_date = $request->dip_date;
                $fee->ref_num  = $request->ref_num;
                $fee->user_id      = Auth::user()->id;
                $fee->institute_id = Auth::user()->ins_id;
                $fee->pay_note         = $request->note;

                if($request->hasfile('ref_img')){

                    $file =$request->file('ref_img');
                    $extension=$file->getClientOriginalExtension();
                    $filename=time().'.'.$extension;
                    $file->move('image/fee/',$filename);
                    $fee->slip_img = $filename;


                   }else{

                   }

                $fee->save();

                $stud_id = Student::where('student_id',$request->stu_id_1)->get();
              // return count($stud_id);


                $stid = $stud_id[0]->id;
                $payment_cot = $stud_id[0]->payment_cot;
                $total_nd_pay_cot = $stud_id[0]->total_nd_pay_cot;
                $total_intrest = $stud_id[0]->intrest;
                $intrest = $request->total - $request->amout;
                $old_due = $stud_id[0]->due_fee;
                $old_paid_amount = $stud_id[0]->paid_amount;

                $insdata = Institute::find($stud_id[0]->institute);

                $total_intrest = $stud_id[0]->intrest;

                $stud = Student::find($stid);

                $stud->paid_amount = $request->amout + $old_paid_amount;
                $stud->payment_cot = $payment_cot + $request->total;
                $stud->intrest = $total_intrest + $intrest;
                $stud->total_nd_pay_cot = $intrest + $total_nd_pay_cot;
                $stud->due_fee = $intrest + $total_nd_pay_cot - $payment_cot - $request->amout;
                $stud->last_payment_time = $now;
                if( $old_due <= 0){
                    $stud->is_pending_fee = 2;
                }else{
                    $stud->is_pending_fee = 1;
                }
                $stud->save();

                if(count($stud_id) == 0){

                }else{
                    $fatherdata = Parentm::find($stud_id[0]->fat_id);
                    $fatemail   = $fatherdata->parent_email;
                    $fatname    = $fatherdata->parent_name;
                    $motherdata = Parentm::find($stud_id[0]->mom_id);
                    $motname    = $fatherdata->parent_name;
                    $motemail   = $motherdata->parent_email;


                $data = [
                    'subject' => "Class Fee Payments",
                    'stuname' => $stud_id[0]->student_full_name,
                    'pay_time'=> Carbon::parse($fee->created_at)->format('d/m/Y'),
                    'email' => $fatemail,
                    'parname' => $fatname,
                    'fromemail' => 'task123test123@gmail.com',
                    'content' => "Class Fee Payments",
                    'number'  => $num,
                    'price'  => $request->amout,
                    'stu_no'  => $request->stu_id,
                    'institute' => $insdata->institute_name,
                    'insemail' => $insdata->email,
                    'insadd_line_1' => $insdata->address_line_1,
                    'insadd_line_2' => $insdata->address_line_2,
                    'city' => $insdata->city,
                  ];

                  $data2 = [
                    'subject' => "Class Fee Payments",
                    'stuname' => $stud_id[0]->student_full_name,
                    'pay_time'=> Carbon::parse($fee->created_at)->format('d/m/Y'),
                    'email' => $motemail,
                    'parname' => $motname,
                    'fromemail' => 'task123test123@gmail.com',
                    'content' => "Class Fee Payments",
                    'number'  => $num,
                    'price'  => $request->amout,
                    'stu_no'  => $request->stu_id,
                    'institute' => $insdata->institute_name,
                    'insemail' => $insdata->email,
                    'insadd_line_1' => $insdata->address_line_1,
                    'insadd_line_2' => $insdata->address_line_2,
                    'city' => $insdata->city,
                  ];

                  Mail::send('admin.emails.mail_fee', $data, function($message) use ($data) {
                    $message->to($data['email'])
                    ->from('task123test123@gmail.com','test mail')
                    ->subject($data['subject']);
                  });

                  Mail::send('admin.emails.mail_fee', $data2, function($message) use ($data) {
                    $message->to($data['email'])
                    ->from('task123test123@gmail.com','test mail')
                    ->subject($data['subject']);
                  });
                }

                $notification = array(
                    'message' => 'Payment Sended Successfully!',
                    'alert-type' => 'Success'
                );

                return redirect('admin/payments')->with($notification);
         }

         public function print($id){
            $data = ClassFeePayment::find($id);
            $snum = $data->stu_num;
            $stud_id = Student::where('student_id',$data->stu_num)->get();
            $iid = $stud_id[0]->institute;

            $ins = Institute::find($iid);
            return view('admin.payment.print',compact('data','ins','snum'));
        }

        public function student_payment_correction($id){
            $payment = ClassFeePayment::where('id',$id)->first();
            $data = Student::where('student_id',$payment->stu_num)->first();
            //return $payment;
            return view('admin.payment.correction_page',compact('payment','data'));
        }

        public function student_payment_correction_store(Request $request){
            //return $request;

            $pay_correction = new PaymentCorrection();
            $pay_correction->price = $request->amout;
            $pay_correction->note  = $request->note;
            $pay_correction->student_sid  = $request->student_id_numb;
            $pay_correction->school_id  = $request->student_instu_numb;
            $pay_correction->recipt_no  = $request->recipt_id_numb;
            $pay_correction->user_id    = Auth::user()->id;
            $pay_correction->save();

            $delete_id    = ClassFeePayment::select('id')->where('recipt_id',$request->recipt_id_numb)->first();
            $last_payment = ClassFeePayment::where('recipt_id',$request->recipt_id_numb)->first();
            $stn_data     = Student::where('student_id',$request->student_id_numb)->first();

            $stud = Student::find($stn_data->id);
            $stud->paid_amount      = $stn_data->paid_amount - $last_payment->price;
            $stud->payment_cot      = $stn_data->payment_cot - $last_payment->price;
            $stud->total_nd_pay_cot = $stn_data->total_nd_pay_cot - $last_payment->price;
            $stud->due_fee          = $stn_data->total_need_pay + $last_payment->price;
            $stud->save();

            ClassFeePayment::where('id', $delete_id->id)->delete();

            $notification = array(
                'message' => 'Payment Correction Done Successfully!',
                'alert-type' => 'Success'
            );

            return redirect('admin/payments')->with($notification);
        }


}
