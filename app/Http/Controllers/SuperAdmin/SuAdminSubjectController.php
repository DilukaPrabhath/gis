<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SuAdminSubjectController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function create(){
        $data = Subject::all();
        return view('superadmin.subject.create',compact('data'));

    }


    public function store(Request $request){

        $inst = new Subject();

        $inst->subject = $request->subject;
        $inst->status  = $request->status;
        $inst->save();

        $notification = array(
            'message' => 'Subject Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('superadmin/subjects')->with($notification);

       }

       public function edit($id){
        $data = Subject::find($id);
        $tbl = Subject::all();
        return view('superadmin.subject.edit',compact('data','tbl'));
       }

       public function update(Request $request, $id){

        $this->validate(request(), [

            'subject'  => ['required', 'max:70', Rule::unique('subjects')->ignore($request->id)],
            'status'    => 'required',
            ]);

        $subject = Subject::find($id);

        $subject->subject = $request->subject;
        $subject->status  = $request->status;

        $subject->save();

        $notification = array(
            'message' => 'Subject Updated Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('superadmin/subjects')->with($notification);
       }




//______Validation Part ____________________________________________________________________________________________

    //phone
    public function subjectvalidate(Request $request){
        {
            $institute = Subject::where('subject', $request->subject)->first('subject');
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

