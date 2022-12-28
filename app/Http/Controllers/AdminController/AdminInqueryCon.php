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
use App\Models\InstClassFee;

class AdminInqueryCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){

        $inq = Student::tbldata();
        //$inq = Student::orderBy('id','DESC')->tbldata();
        return view('admin.inquery.index',compact('inq'));
       }

       public function create(){
        $institute = Institute::where('status',1)->get();
        return view('admin.inquery.create',compact('institute'));
       }

       public function store(Request $request){

        DB::beginTransaction();

        $this->validate(request(), [

            'student_name'       => 'required',
            'name_with_initial'  => 'required',
            'dob'                => 'required',
            'religion'           => 'required',
            'nationality'        => 'required',
            'inquery_type'       => 'required',
            'contact_number'     => 'required',
            'address'            => 'required',
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
              $otputnum = substr($string, 6); //last 3 number ex 0001
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
        $stu->gender    = $request->gender;
        $stu->inq_status  = 1;
        $stu->stu_status  = 1;
        $stu->prmy = 2;

       // return  $stu->gender;
        $stu->save();

        DB::commit();

        $notification = array(
            'message' => 'Inquery Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/inqueries')->with($notification);

       }

       public function view($pid){

        $data  = Student::find($pid);
        $institute = Institute::orderBy('institute_name', 'ASC')->where('status',1)->get();
        $grade = Grade::orderBy('grade', 'ASC')->where('status',1)->where('nur_or_sch',1)->get();
        $st    = $data->stu_status;
      if($st == 5 || $st == 6){

        $fa = Parentm::where('id',$data->fat_id)->where('fa_or_mom',1)->first();
        $mo = Parentm::where('id',$data->mom_id)->where('fa_or_mom',2)->first();
      }else{

        $fa = 0;
        $mo = 0;
      }

      $sibl = Siblin::where('s_id',$pid)->get();
        // $institute = Institute::where('status',1)->get();
        $ttn1 = Str::random(6);
        $ttn2 = Str::random(6);
        return view('admin.inquery.view',compact('data','institute','grade','ttn1','ttn2','sibl','fa','mo','st'));
       }

       public function edit($pid){
        $data  = Student::find($pid);
        return view('admin.inquery.edit',compact('data'));
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

        $stu =  Student::find($id);

        $stu->student_full_name  = $request->student_name;
        $stu->dob = $request->dob;
        $stu->nwi = $request->name_with_initial;
        $stu->contact_number = $request->contact_number;
        $stu->religion = $request->religion;
        $stu->nationality = $request->nationality;
        $stu->address = $request->address;
        $stu->inq_type  = $request->inquery_type; //inquery = 1 /appliction = 2/ interview = 3 / registration = 4 / student = 5
        $stu->gender    = $request->gender;
        $stu->inq_status  = $request->inquery_status;
        // $stu->stu_status = 1;
        $stu->save();

        $notification = array(
            'message' => 'Inquery Updated Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/inqueries')->with($notification);

       }

       public function get_available_years(Request $request){
        //return $request->institute;
        $year_now = Carbon::now()->format('Y');
        // return  $institute;InstClassFee
        $clz_year = InstClassFee::where('ins_id',$request->institute)->where('year', '>=',$year_now)->get()->pluck('year');
        // ->pluck('investment_name');
        // $duplicateFields = ["list_id" => array(), "list_title" => array()];
        // foreach ($clz_year as $index => $value) {
        //   if(in_array($value['id'], $duplicateFields['year'])){
        //     unset($array[$index]);
        //   }else{
        //     array_push($duplicateFields['list_id'], $value['list_id']);
        //   }
        // }
        //return $clz_year->toArray();
        //$a = array_unique($clz_year);
        //print_r(array_unique($clz_year->toArray(), SORT_REGULAR));
            $new_years = array_unique($clz_year->toArray(), SORT_REGULAR);
           //return $new_years;
            $option = '<option value="">Select Model</option>';
             foreach ($new_years as $row) {
                $option .= '<option value="' . $row . '">' . $row . '</option>';
              }
            return  response()->json($option);
        //$array = array_unique($clz_year);
        //$array = array_unique($clz_year['year'], SORT_REGULAR);
        //return $clz_year;

    //     $data = InstClassFee::whereIn('id', $clz_year->pluck('id'))
    // ->groupBy(['year']) // group by query
    // ->get()
    // ->groupBy('year');
    //return $data;

    // $data = InstClassFee::whereInwhereIn('id', $clz_year->pluck('id'))
    // ->groupBy(['year']) // group by query
    // ->get()
    // ->mapToGroups(function ($item, $key) {
    //     return [$item['year'] => $item['year']];
    // });

    // return $data;
       }


       public function get_available_grade(Request $request){
        //return $request->institute;
        // return  $institute;InstClassFee
        $clz_year = InstClassFee::grade_get($request);
        //$clz_year = InstClassFee::where('ins_id',$request->institute)->where('year',$request->register_year)->where('syl_id',$request->sy_type)->get();

           // $new_years = array_unique($clz_year->toArray(), SORT_REGULAR);

            $option = '<option value="">Select Grade</option>';
             foreach ($clz_year as $row) {
                $option .= '<option value="' . $row->id . '">' . $row->grade . '</option>';
              }
            return  response()->json($option);

       }
}
