<?php

namespace App\Http\Controllers\DeputyRegitar;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DeActiviSetController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    public function index(){
        return view('de_registar.activity.index');
       }

       public function create(){
        $data = Activity::all();
        return view('de_registar.activity.create',compact('data'));
       }

       public function store(Request $request){

        $this->validate(request(), [

            'activity'  => 'required|unique:activities',
            'status'    => 'required',
            'price'     => 'required',
            ]);

        $act = new Activity();

        $act->activity = $request->activity;
        $act->status   = $request->status;
        $act->price    = $request->price;

        $act->save();

        $notification = array(
            'message' => 'Activity Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('de_registar/activities/create')->with($notification);
       }

       public function view(){
        return view('de_registar.activity.view');
       }

       public function edit($id){
        $tbl = Activity::all();
        $data = Activity::find($id);
        return view('de_registar.activity.edit',compact('data','tbl'));
       }

       public function update(Request $request, $id){

        $this->validate(request(), [

            'activity'  => ['required', 'max:100', Rule::unique('activities')->ignore($request->id)],
            'status'    => 'required',
            'price'     => 'required',
            ]);

        $act = Activity::find($id);

        $act->activity = $request->activity;
        $act->status   = $request->status;
        $act->price    = $request->price;

        $act->save();

        $notification = array(
            'message' => 'Activity Updated Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('de_registar/activities/create')->with($notification);
       }




       //_____Validation____________________________________________________________________________________________


       //name
       public function validateactivity(Request $request){
        {

            $institute = Activity::where('activity', $request->activity)->first('activity');
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
