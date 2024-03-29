<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Grade;
use App\Models\Institute;
use App\Models\Parentm;
use App\Models\Siblin;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\NurseryClassTable;
use App\Models\NurseryGradeTable;

class AdminPrimaryInquCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){

        $inq = Student::primarytbldata();
        return view('admin.primary_inquery.index',compact('inq'));
       }

       public function create(){
        $institute = Institute::where('status',1)->where('pre_or_sch',1)->get();
        return view('admin.primary_inquery.create',compact('institute'));
       }

       public function store(Request $request){
       //return $request;
        DB::beginTransaction();

        $this->validate(request(), [

            'student_name'  => 'required',
            'name_with_initial'  => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'inquery_type'  => 'required',
            'contact_number' => 'required',
            'address'  => 'required',
            ]);

            $now = Carbon::now();
            $year = $now->year;
            $mon    = $now->month;
            $mo  = str_pad($mon,2,"0", STR_PAD_LEFT);
            $timcode = $year.$mo;
            $isemty = Student::all();
            if($isemty->isEmpty()){
                $num = 'IQ'.'/'.$year.$mo.'/'. '0001';
            }else{
              $latnum = Student::orderBy('inq_number', 'desc')->first()->inq_number;
              $string =  preg_replace("/[^0-9\.]/", '', $latnum);
              $otputnum = substr($string, 6); //last 4 number ex 0001
              $otputyemo = substr($string, 0, 6); // last number's first 6 digit, year and month 2021-05 -> 202105
              $otputyea = substr($string, 0, 4); //last number's first 4 digit,year
                if( $year != $otputyea){
                        $num = 'IQ'.'/'.$year.$mo.'/'.'0001';
                }else{
                    if($timcode != $otputyemo){
                         $num = 'IQ'.'/'.$year.$mo.'/'.'0001';
                        }else{
                        $num = 'IQ'.'/'.$year.$mo.'/'. sprintf('%04d', $otputnum+1); //increment IQ number in same month
                        }
                 }
            }

            if( $request->gender == 'on'){
                $gen = 1;
            }else{
                $gen = 2;
            }
        $stu = new Student();

        $stu->student_full_name  = $request->student_name;
        $stu->nwi  = $request->name_with_initial;
        $stu->inq_number = $num;
        $stu->dob  = $request->dob;
        $stu->religion  = $request->religion;
        $stu->nationality  = $request->nationality;
        $stu->address  = $request->address;
        $stu->contact_number  = $request->contact_number;
        $stu->inq_type  = $request->inquery_type; //inquery = 1 /appliction = 2/ interview = 3 / registration = 4 / student = 5
        $stu->gender    = $gen;
        $stu->inq_status  = 1;
        $stu->stu_status = 1;
        $stu->prmy = 1;
        $stu->save();

        DB::commit();

        $notification = array(
            'message' => 'Inquery Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/primary/inqueries')->with($notification);

       }

       public function edit($pid){
        $data  = Student::find($pid);
        return view('admin.primary_inquery.edit',compact('data'));
       }

       public function update(Request $request,$id){
        //return  $request;
       $this->validate(request(), [

           'student_name'  => 'required',
           'dob' => 'required',
           'name_with_initial'  => 'required',
           'religion' => 'required',
           'nationality'  => 'required',
           'contact_number' => 'required',
           'inquery_type'  => 'required',
           'inquery_status' => 'required',
           'address'  => 'required',
           ]);

           if( $request->gender == 'on'){
            $gen = 1;
        }else{
            $gen = 2;
        }

           $stu =  Student::find($id);

       $stu->student_full_name  = $request->student_name;
       $stu->dob = $request->dob;
       $stu->nwi = $request->name_with_initial;
       $stu->contact_number = $request->contact_number;
       $stu->religion = $request->religion;
       $stu->nationality = $request->nationality;
       $stu->address = $request->address;
       $stu->inq_type  = $request->inquery_type; //inquery = 1 /appliction = 2/ interview = 3 / registration = 4 / student = 5
       $stu->gender    = $gen;
       $stu->inq_status  = $request->inquery_status;
       // $stu->stu_status = 1;
       $stu->save();

       $notification = array(
           'message' => 'Inquery Updated Successfully!',
           'alert-type' => 'Success'
       );

       return redirect('admin/primary/inqueries')->with($notification);

      }


      public function view($pid){
        $data      = Student::find($pid);
        $institute = Institute::orderBy('institute_name', 'ASC')->where('status',1)->where('pre_or_sch',1)->get();
        $grade     = Grade::orderBy('grade', 'ASC')->where('status',1)->where('nur_or_sch',2)->get();
        $class     = NurseryClassTable::where('status',1)->get();
        $grade_set = NurseryGradeTable::all();
        $st        = $data->stu_status;
      if($st == 5 || $st == 6){
        $fa = Parentm::where('id',$data->fat_id)->where('fa_or_mom',1)->first();
        $mo = Parentm::where('id',$data->mom_id)->where('fa_or_mom',2)->first();
      }else{
        $fa = 0;
        $mo = 0;
      }

      $sibl = Siblin::where('s_id',$pid)->get();
        $ttn1 = Str::random(6);
        $ttn2 = Str::random(6);
        return view('admin.primary_inquery.view',compact('data','institute','grade','ttn1','ttn2','sibl','fa','mo','st','grade_set','class'));

       }

}
