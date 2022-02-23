<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdmInstiCon extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

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
        $inst->pre_or_sch     = $request->pre_or_sch;
        $inst->status         = $request->status;
        $inst->code           = strtoupper($request->code);
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
            'ins_email'      => 'required',
            'con_number'     => 'required',
            'address_line_1' => 'required',
            'city'           => 'required',
            'pre_or_sch'     => 'required',
            'status'         => 'required',
            ]);

        $inst = Institute::find($id);

        $inst->institute_name = $request->institute_name;
        $inst->contact_number = $request->con_number;
        $inst->address_line_1 = $request->address_line_1;
        $inst->address_line_2 = $request->address_line_2;
        $inst->city           = $request->city;
        $inst->email          = $request->ins_email;
        $inst->pre_or_sch     = $request->pre_or_sch;
        if($request->pre_or_sch == 1){
            $inst->code = $request->code;
        }else{
            $inst->code = "";
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

       //name edit_name_validate
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

       //edit_name_validate
       public function edit_name_validate(Request $request){
        {

            $institute = Institute::where('institute_name', $request->institute_name)->where('id','!=',$request->i_id)->first('institute_name');
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

       //code
       public function codevalidate(Request $request){
        {

            $code = Institute::where('code', $request->code)->first('code');
               if($code){
                 $return =  false;
                }
                else{
                 $return= true;
                }
                echo json_encode($return);
                exit;
           }
       }

       //code edit
       public function edit_codevalidate(Request $request){
        {

            $ins = Institute::where('code', $request->code)->where('id','!=',$request->i_id)->first('code');

            //$code = Institute::where('code', $request->code)->first('code');
               if($ins){
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

       //phone edit
       public function edit_cont_validate(Request $request){
        {
            //return $request;
            $ins = Institute::where('contact_number', $request->con_number)->where('id','!=',$request->i_id)->first('contact_number');
            //$institute = Institute::where('contact_number', $request->phone)->first('contact_number');
               if($ins){
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

       //edit email
       public function edit_mail_validate(Request $request){
        {
           $ins = Institute::where('email', $request->ins_email)->where('id','!=',$request->i_id)->first('email');
           // $institute = Institute::where('email', $request->email)->first('email');
               if($ins){
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
