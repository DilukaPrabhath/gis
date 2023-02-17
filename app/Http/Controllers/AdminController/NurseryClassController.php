<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\NurseryClassTable;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class NurseryClassController extends Controller
{
    //
    public function index(){
        $data = NurseryClassTable::all();
        return view('admin.nursery_classes.index',compact('data'));
    }

    public function create(){
        return view('admin.nursery_classes.create');
    }

    public function store(Request $request){

        $this->validate(request(), [
            'nursery_class_name'        => 'required|unique:nursery_class_tables',
            'nursery_class_status'      => 'required',
        ]);

        $class = new NurseryClassTable();

        $class->nursery_class_name = $request->nursery_class_name;
        $class->status             = $request->nursery_class_status;
        $class->save();

        $notification = array(
            'message'    => 'Nursery Class Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/nursery_classes')->with($notification);
    }

    public function view($id){
        $data = NurseryClassTable::find($id);
        return view('admin.nursery_classes.view',compact('data'));
    }

    public function edit($id){
        $data = NurseryClassTable::find($id);
        return view('admin.nursery_classes.edit',compact('data'));
    }

    public function update(Request $request,$id){
        //return $request;
        $this->validate(request(), [
            'nursery_class_name'        => ['required', 'max:70', Rule::unique('nursery_class_tables')->ignore($id)],
            'nursery_class_status'      => 'required',
        ]);

        $class = NurseryClassTable::find($id);

        $class->nursery_class_name = $request->nursery_class_name;
        $class->status             = $request->nursery_class_status;
        $class->save();

        $notification = array(
            'message'    => 'Nursery Class Updated Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/nursery_classes')->with($notification);
    }


   //__Validation Part_______________________________________________________________________________________________

   //email
   public function validate_class_name(Request $request){
    {
        $user = NurseryClassTable::where('nursery_class_name', $request->nursery_class_name)->first('nursery_class_name');
           if($user){
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
