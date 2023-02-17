<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\NurseryGradeTable;
use App\Models\NurseryClassTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NurseryGradeController extends Controller
{
    public function index(){
        $data = NurseryGradeTable::tbldata();
        return view('admin.nursery_grades.index',compact('data'));
    }

    public function create(){
        $data = NurseryClassTable::all();
        return view('admin.nursery_grades.create',compact('data'));
    }

    public function store(Request $request){

        $this->validate(request(), [
            'grade_name'           => 'required',
            'nursery_class_id'     => 'required',
            'nursery_grade_status' => 'required',
        ]);

        $class = new NurseryGradeTable();

        $class->grade_name       = $request->grade_name;
        $class->nursery_class_id = $request->nursery_class_id;
        $class->status           = $request->nursery_grade_status;
        $class->save();

        $notification = array(
            'message'    => 'Nursery Grade Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/nursery_grades')->with($notification);
    }

    public function view($id){
        $class = NurseryClassTable::where('status',1)->get();
        $data  = NurseryGradeTable::find($id);
        return view('admin.nursery_grades.view',compact('class','data'));
    }

    public function edit($id){
        $data  = NurseryGradeTable::find($id);
        $class = NurseryClassTable::where('status',1)->get();
        return view('admin.nursery_grades.edit',compact('class','data'));
    }

    public function update(Request $request,$id){

        $this->validate(request(), [
            'grade_name'           => 'required',
            'nursery_class_id'     => 'required',
            'nursery_grade_status' => 'required',
        ]);

        $class = NurseryGradeTable::find($id);

        $class->grade_name       = $request->grade_name;
        $class->nursery_class_id = $request->nursery_class_id;
        $class->status           = $request->nursery_grade_status;
        $class->save();

        $notification = array(
            'message'    => 'Nursery Grade Updated Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/nursery_grades')->with($notification);
    }

   //__Validation Part_______________________________________________________________________________________________

   //validate_grade_name_store
   public function validate_grade_name(Request $request){
    {
       // return $request;
        $data = NurseryGradeTable::where('grade_name', $request->grade_name)->where('nursery_class_id', $request->class_id)->first('grade_name');
           if($data){
             $return =  false;
            }
            else{
             $return= true;
            }
            echo json_encode($return);
            exit;
       }
   }

   //validate update grade name
   public function validate_update_grade_name(Request $request){
    {
        $data = NurseryGradeTable::where('grade_name', $request->grade_name)->where('nursery_class_id', $request->class_id)->first();

        if($data){
           $data_id =  $data->id;
           if($data_id == $request->grd_id){
                $chk_id = 1;
           }else{
                $chk_id = 0;
           }

           if($chk_id == 0){
            $return =  false;
           }else{
            $return= true;
           }
           echo json_encode($return);
            exit;
        }else{
            $return= true;
            echo json_encode($return);
            exit;
        }

       }
   }
}

