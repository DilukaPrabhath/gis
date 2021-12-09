<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdmInstiCon extends Controller
{
    public function index(){
        $data = Institute::orderBy('id', 'DESC')->get();
        return view('admin.institute.index',compact('data'));
       }
       public function create(){
        return view('admin.institute.create');
       }

       public function store(Request $request){

        //return $request;

        $inst = new Institute();

        $inst->institute_name = $request->name;
        $inst->contact_number = $request->phone;
        $inst->address_line_1 = $request->address_line_1;
        $inst->address_line_2 = $request->address_line_2;
        $inst->city           = $request->city;
        $inst->email          = $request->email;

        if($request->pre_or_sch == "on"){
            $inst->pre_or_sch     = 1;
            }else{
            $inst->pre_or_sch     = 2;
        }

        $inst->status         = $request->status;
        $inst->save();

        $notification = array(
            'message' => 'Institute Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/institutes')->with($notification);

       }

       public function view($id){
        $value = Institute::find($id);
        return view('admin.institute.view',compact('value'));
       }

       public function edit($id){
        $value = Institute::find($id);
        return view('admin.institute.edit',compact('value'));
       }


       public function update(Request $request ,$id){

        $this->validate(request(), [

            'institute_name' => ['required', 'max:100', Rule::unique('institutes')->ignore($request->id)],
            'email'          => ['required','email', 'max:100', Rule::unique('institutes')->ignore($request->id)],
            'contact_number' => ['required','max:10', Rule::unique('institutes')->ignore($request->id)],
            'address_line_1' => 'required',
            'city'           => 'required',
            'status'         => 'required',
            ]);

        $inst = Institute::find($id);

        $inst->institute_name = $request->institute_name;
        $inst->contact_number = $request->contact_number;
        $inst->address_line_1 = $request->address_line_1;
        $inst->address_line_2 = $request->address_line_2;
        $inst->city           = $request->city;
        $inst->email          = $request->email;

        if($request->pre_or_sch == "on"){
            $inst->pre_or_sch     = 1;
            }else{
            $inst->pre_or_sch     = 2;
        }

        $inst->status         = $request->status;
        $inst->save();

        $notification = array(
            'message' => 'Institute Updated Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('admin/institutes')->with($notification);

       }



       //______Validation Part ____________________________________________________________________________________________

       //name
       public function namevalidate(Request $request){
        {

            $institute = Institute::where('institute_name', $request->name)->first('institute_name');
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

       //phone
       public function phonevalidate(Request $request){
        {
            $institute = Institute::where('contact_number', $request->phone)->first('contact_number');
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

       //email
       public function emailvalidate(Request $request){
        {
            $institute = Institute::where('email', $request->email)->first('email');
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

       //email
       public function oldemailvalidate(Request $request){
        {
            return $request;
            $institute = Institute::where('email', $request->email)->first('email');
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
