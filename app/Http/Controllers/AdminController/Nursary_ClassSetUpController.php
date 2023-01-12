<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Institute;
use App\Models\Nursary_class_type;
use App\Models\Nursary_grade_type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Nursary_ClassSetUpController extends Controller
{


    public function index(){
        $data = Nursary_class_type::data_table();
        return view('admin.nursary_class_type.index',compact('data'));
    }

    public function create(){
        $school = Institute::where('pre_or_sch',1)->get();
        return view('admin.nursary_class_type.create_class_type',compact('school'));
    }

     public function view($id){
        $school = Institute::where('pre_or_sch',1)->get();
        $data   = Nursary_class_type::where('id',$id)->first();
        //return  $data;
        return view('admin.nursary_class_type.view_class_type',compact('data','school'));
    }

    public function edit($id){
        $school = Institute::where('pre_or_sch',1)->get();
        $data   = Nursary_class_type::where('id',$id)->first();
        //return  $data;
        return view('admin.nursary_class_type.edit_class_type',compact('data','school','id'));
    }

    public function store(Request $request){
        //return $request;
        $this->validate(request(), [
            'institute'        => 'required',
            'class_types_name'  => 'required|unique:nursary_class_types',
            ]);

        $inst = new Nursary_class_type();

        $inst->school_id         = $request->institute;
        $inst->class_types_name	 = $request->class_types_name;
        $inst->status            = 1;
        $inst->save();

        $notification = array(
            'message' => 'Class Type Create Successfully!',
            'alert-type' => 'Success'
           );

          return redirect('admin/nursary/class_type')->with($notification);
    }

    public function update(Request $request,$id){
        //return $request;
        $this->validate(request(), [
            'school_id'         => 'required',
            'class_types_name'  => ['required', Rule::unique('nursary_class_types')->ignore($id)],
            'status'            => 'required',
            ]);

        $inst = Nursary_class_type::find($id);

        $inst->school_id         = $request->school_id;
        $inst->class_types_name	 = $request->class_types_name;
        $inst->status            = $request->status;
        $inst->save();

        $notification = array(
            'message' => 'Class Type Update Successfully!',
            'alert-type' => 'Success'
           );

          return redirect('admin/nursary/class_type')->with($notification);
    }

    //grade_type index
    public function grade_type_create($id){
        $data = Nursary_grade_type::where('class_type_id',$id)->get();
        return view('admin.nursary_class_type.create_class_grade',compact('data','id'));
    }

     //grade_type index
     public function grade_type_store(Request $request){

        $this->validate(request(), [
            'grade_types_name'  => 'required|unique:nursary_grade_types',
            ]);

        $grd = new Nursary_grade_type();

        $grd->grade_types_name  = $request->grade_types_name;
        $grd->class_type_id	    = $request->id;
        $grd->status            = 1;
        $grd->save();

        $notification = array(
            'message' => 'Grade Type Create Successfully!',
            'alert-type' => 'Success'
           );

          return redirect('admin/nursary/class_type')->with($notification);
    }

    //grade_type view
    public function grade_type_view($id,$gd_id){
        $data   = Nursary_grade_type::where('class_type_id',$id)->where('id',$gd_id)->first();
        //return  $data;
        return view('admin.nursary_class_type.view_grade_type',compact('data'));
    }

    //grade_type edit
    public function grade_type_edit($id,$gd_id){
        $data      = Nursary_grade_type::where('class_type_id',$id)->get();
        $gd_type   = Nursary_grade_type::where('class_type_id',$id)->where('id',$gd_id)->first();
        //return  $data;
        return view('admin.nursary_class_type.edit_class_grade',compact('data','gd_type','gd_id','id'));
        // return redirect('admin/nursary/class_type/add/'.$cid)->with($notification);
    }

    public function grade_type_update(Request $request,$id,$gd_id){
        //return $request;
        $this->validate(request(), [
            'grade_types_name'  => ['required', Rule::unique('nursary_grade_types')->ignore($gd_id)],
            'status'            => 'required',
            ]);

        $inst = Nursary_grade_type::find($gd_id);

        $inst->grade_types_name	 = $request->grade_types_name;
        $inst->status            = $request->status;
        $inst->save();
       // return  $inst;
        $notification = array(
            'message' => 'Grade Type Update Successfully!',
            'alert-type' => 'Success'
           );

          return redirect('admin/nursary/class_type/add/'.$id)->with($notification);
    }

}
