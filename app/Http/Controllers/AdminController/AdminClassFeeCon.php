<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Grade;
use App\Models\InstClassFee;
use App\Models\Institute;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\NurseryClassTable;
use App\Models\NurseryGradeTable;

use function PHPUnit\Framework\returnSelf;

class AdminClassFeeCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){

        $data = Institute::all();
        return view('admin.classfee.index',compact('data'));
    }

    public function create($id){

        $sch    = Institute::select('pre_or_sch','institute_name')->where('id',$id)->first();
        $cls    = Grade::where('status',1)->where('nur_or_sch',1)->get();
        $cls_n  = Grade::where('status',1)->where('nur_or_sch',2)->get();
        $syl    = Syllabus::where('status',1)->get();
        $class_data  = NurseryClassTable::where('status',$id)->get();
        $ins_id = $id;
        if($sch->pre_or_sch == 2){
            $grd    = InstClassFee::data($ins_id);
        }elseif($sch->pre_or_sch == 1){
            $grd    = InstClassFee::nursary_grd_table($ins_id);
        }
        $c_id   = $id;
       // return $grd;
        return view('admin.classfee.create',compact('cls','grd','c_id','sch','syl','cls_n','class_data'));
    }

    public function store(Request $request){
        //return $request;
        $rules = [];

        if( $request->s_ty == 2 ){
            $rules = [
                'syllabus' => 'required',
                'fee'      => 'required',
                'year'     => 'required',
                'grade'     => ['required', function($attr, $value, $fail) use ($request){
                    if( InstClassFee::where('grd_id', $request->grade)->where('ins_id',$request->c_id)->where('syl_id',$request->syllabus)->where('year',$request->year)->count() > 0 ){
                        $fail("This Grade already fild.");
                    }
                }]
            ];
        }else{
            $rules = [
                'syllabus' => 'required',
                'fee'      => 'required',
                'year'     => 'required',
                'class'    => 'required',
                'grade_n'  => ['required', function($attr, $value, $fail) use ($request){
                    if( InstClassFee::where('grd_id', $request->grade_n)->where('ins_id',$request->c_id)->where('syl_id',$request->syllabus)->where('year',$request->year)->where('class',$request->class)->count() > 0 ){
                        $fail("This Class Category already fild.");
                    }
                }]
            ];
        }


        $this->validate(request(), $rules);

        $clsfee = new InstClassFee();

        $clsfee->ins_id = $request->c_id;
        if($request->s_ty == 2){
            $clsfee->grd_id = $request->grade;
        }else{
            $clsfee->grd_id = $request->grade_n;
        }
        $clsfee->class  = $request->class;
        $clsfee->year   = $request->year;
        $clsfee->fee    = $request->fee;
        $clsfee->syl_id = $request->syllabus;
        $clsfee->status = 1;
        $clsfee->save();

        $notification = array(
            'message'    => 'Class Payment Added Successfully!',
            'alert-type' => 'Success'
        );

        $id = $request->c_id;

         return redirect('admin/classfee/create/'.$id)->with($notification);

    }

    public function view($id){
        //return $ins_id;
        $institute = Institute::find($id);
        $ins_id = $id;
        $grd = InstClassFee::data($ins_id);
        return view('admin.classfee.view',compact('grd','institute'));
    }

    public function edit($ins_id,$id){
        $fee = InstClassFee::find($id);
        $sch = Institute::select('pre_or_sch','institute_name')->where('id',$ins_id)->first();
        $cls = Grade::where('status',1)->where('nur_or_sch',1)->get();
        $cls_n  = Grade::where('status',1)->where('nur_or_sch',2)->get();
        $ins_id = $ins_id;
        $cls_id = $id;
        $class_data  = NurseryClassTable::all();
        $grade_data  = NurseryGradeTable::where('nursery_class_id',$fee->class)->get();
        if($sch->pre_or_sch == 2){
            $grd    = InstClassFee::data($ins_id);
        }elseif($sch->pre_or_sch == 1){
            $grd    = InstClassFee::nursary_grd_table($ins_id);
        }
        return view('admin.classfee.edit',compact('fee','ins_id','grd','sch','cls','cls_id','cls_n','class_data','grade_data'));
    }

    public function update(Request $request,$id){
       // return $request;

        $rules = [];

        if( $request->s_ty == 2 ){
            $rules = [
                'syllabus' => 'required',
                'fee'      => 'required',
                'year'     => 'required',
                'grade'     => ['required', function($attr, $value, $fail) use ($request){
                    if( InstClassFee::where('grd_id', $request->grade)->where('ins_id',$request->c_id)->where('syl_id',$request->syllabus)->where('year',$request->year)->count() > 0 ){
                        $fail("This Grade already fild.");
                    }
                }]
            ];
        }else{
            $rules = [
                'syllabus' => 'required',
                'fee'      => 'required',
                'year'     => 'required',
                'class'    => 'required',
                'grade_n'  => ['required', function($attr, $value, $fail) use ($request){
                    if( InstClassFee::where('grd_id', $request->grade_n)->where('ins_id',$request->c_id)->where('syl_id',$request->syllabus)->where('year',$request->year)->where('class',$request->class)->count() > 0 ){
                        $fail("This Class Category already fild.");
                    }
                }]
            ];
        }
 //return $request;
        $clsfee = InstClassFee::find($id);

        $clsfee->ins_id = $request->c_id;
        if($request->s_ty == 2){
            $clsfee->grd_id = $request->grade;
        }else{
            $clsfee->grd_id = $request->grade_n;
        }
        $clsfee->class  = $request->class;
        $clsfee->year   = $request->year;
        $clsfee->fee    = $request->fee;
        $clsfee->syl_id = $request->syllabus;
        $clsfee->status = 1;
        $clsfee->save();

        $notification = array(
            'message' => 'Class Payment Updated Successfully!',
            'alert-type' => 'Success'
        );
        $cid = $request->c_id;
        return redirect('admin/classfee/create/'.$cid)->with($notification);
    }


    public function get_grades(Request $request){
        $data = NurseryGradeTable::where('nursery_class_id',$request->class_id)->get();
        //return $data;
        $option = '<option value="">Select Make</option>';
        foreach ($data as $row) {
            $option .= '<option value="' . $row['id'] . '">' . $row['grade_name'] . '</option>';
        }
        return  response()->json($option);
    }


    //______Validation Part ____________________________________________________________________________________________


       //grade
       public function validateclassfee(Request $request){
        {

            return $request;
            $institute = Grade::where('grade', $request->grade)->first('grade');
               if($institute){
                 $return =  false;
                }
                else{
                 $return= true;
                }
                echo json_encode($return);
                exit;
           }
       }



}
