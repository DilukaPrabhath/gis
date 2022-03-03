<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Grade;
use App\Models\InstClassFee;
use App\Models\Institute;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;



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

        $sch = Institute::select('pre_or_sch','institute_name')->where('id',$id)->first();
        $cls = Grade::where('status',1)->where('nur_or_sch',1)->get();
        $cls_n = Grade::where('status',1)->where('nur_or_sch',2)->get();
        $syl = Syllabus::where('status',1)->get();
        $ins_id = $id;
        $grd = InstClassFee::data($ins_id);
        $c_id = $id;

        return view('admin.classfee.create',compact('cls','grd','c_id','sch','syl','cls_n'));
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
                'grade'     => ['required', function($attr, $value, $fail) use ($request){
                    if( InstClassFee::where('grd_id', $request->grade)->where('ins_id',$request->c_id)->where('syl_id',$request->syllabus)->where('year',$request->year)->count() > 0 ){
                        $fail("This Class Category already fild.");
                    }
                }]
            ];
        }


        $this->validate(request(), $rules);

        $clsfee = new InstClassFee();

        $clsfee->ins_id = $request->c_id;
        $clsfee->grd_id = $request->grade;
        $clsfee->year   = $request->year;
        $clsfee->fee    = $request->fee;
        $clsfee->syl_id = $request->syllabus;
        $clsfee->status = 1;
        $clsfee->save();

        $notification = array(
            'message' => 'Class Payment Added Successfully!',
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
        // $cls = Grade::where('status',1)->get();
        $cls = Grade::where('status',1)->where('nur_or_sch',1)->get();
        $cls_n = Grade::where('status',1)->where('nur_or_sch',2)->get();
        $ins_id = $ins_id;
        $cls_id = $id;
        $grd = InstClassFee::data($ins_id);
        return view('admin.classfee.edit',compact('fee','ins_id','grd','sch','cls','cls_id','cls_n'));
    }

    public function update(Request $request,$id){
        //return $request->c_id;

        $this->validate(request(), [
            'grade'    => 'required',
            'fee'      => 'required',
            'year'     => 'required',
            ]);

        $fee = InstClassFee::find($id);

        $fee->ins_id = $request->c_id;
        $fee->grd_id = $request->grade;
        $fee->year   = $request->year;
        $fee->fee    = $request->fee;
        $fee->syl_id = $request->syllabus;
        $fee->status = 1;
        $fee->save();

        $notification = array(
            'message' => 'Class Payment Updated Successfully!',
            'alert-type' => 'Success'
        );
        $cid = $request->c_id;
        return redirect('admin/classfee/create/'.$cid)->with($notification);
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
