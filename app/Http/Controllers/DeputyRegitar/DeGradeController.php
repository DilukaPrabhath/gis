<?php

namespace App\Http\Controllers\DeputyRegitar;

use App\Models\Grade;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeGradeController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){

    }

    public function create(){
        $data = Grade::all();
        $ins  = Institute::where('status',1)->get();
        return view('de_registar.grade.create',compact('data','ins'));

    }

    public function store(Request $request){

        // $this->validate(request(), [

        //     'grade'  => 'required',
        //     'status' => 'required',
        //     ]);

        $inst = new Grade();

        $inst->grade  = $request->grade;
        $inst->status = $request->status;
        $inst->save();

        $notification = array(
            'message' => 'Grade Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('de_registar/grades')->with($notification);

       }




    //______Validation Part ____________________________________________________________________________________________


       //name
       public function validateactivity(Request $request){
        {

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

