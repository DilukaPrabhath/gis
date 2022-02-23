<?php

namespace App\Http\Controllers\Accountant;

use App\Models\Event;
use App\Models\Institute;
use App\Models\TemTbl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class AccEventController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
       $data = Event::tbldata();
        return view('accountant.event.index',compact('data'));
    }

    public function create(){
        $t_n1  = Str::random(15);
        $t_n2  = Str::random(15);
        $ins = Institute::where('status',1)->get();
        return view('accountant.event.create',compact('ins','t_n1','t_n2'));
    }

    public function store(Request $request){

        $this->validate(request(), [

            'event'          => 'required',
            'date'           => 'required|date_format:Y-m-d|after:tomorrow',
            'venue'          => 'required',
            'time'           => 'required',
            'institute'      => 'required',
            'status'         => 'required',
            ]);

        $evet = new Event();

        $evet->event = $request->event;
        $evet->date  = $request->date;
        $evet->time  = $request->time;
        $evet->ins_id = $request->institute;
        $evet->discription = $request->descreption;
        $evet->status = $request->status;
        $evet->venue = $request->venue;
        $evet->save();

        $notification = array(
            'message' => 'Event Created Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('accountant/events')->with($notification);

    }

    public function view($id){
     $evet = Event::data($id);
        return view('accountant.event.view',compact('evet'));
    }

    public function edit($id){
        $evet = Event::data($id);
        $ins = Institute::where('status',1)->get();
        return view('accountant.event.edit',compact('evet','ins'));
    }

    public function update(Request $request, $id){

        $this->validate(request(), [

            'event'          => 'required',
            'date'           => 'required|date_format:Y-m-d|after:tomorrow',
            'venue'          => 'required',
            'time'           => 'required',
            'institute'      => 'required',
            'status'         => 'required',
            ]);

        $evet = Event::find($id);

        $evet->event = $request->event;
        $evet->date  = $request->date;
        $evet->time  = $request->time;
        $evet->ins_id = $request->institute;
        $evet->discription = $request->descreption;
        $evet->status = $request->status;
        $evet->venue = $request->venue;
        $evet->save();

        $notification = array(
            'message' => 'Event Updated Successfully!',
            'alert-type' => 'Success'
        );

        return redirect('accountant/events')->with($notification);

    }

    public function tempinsert(Request $request){

        $tem = new TemTbl();

        $tem->temp_id_1 = $request->t_n1;
        $tem->temp_id_2 = $request->t_n2;
        $tem->str_1 = $request->name;
        $tem->int_1 = $request->price;
        $tem->int_2 = $request->tic;
        $tem->dt_1  = $request->dt;
        $tem->save();
        $ttn1 = $request->t_n1;
        $ttn2 = $request->t_n2;
        return $this->createReservicetbl($ttn1, $ttn2);
    }

    //create temp table
 public function createReservicetbl($ttn1, $ttn2){
    $data = TemTbl::where('temp_id_1',$ttn1)->where('temp_id_2',$ttn2)->get();
    $tbdt = '';
    $numb = 1;
    if(count($data) > 0){
        foreach($data as $row){
            $tbdt.="
                <tr>
                <td>".str_pad($numb,2,"0",STR_PAD_LEFT)."</td>
                <td>".$row->str_1."</td>
                <td>".$row->int_1."</td>
                <td>".$row->int_2."</td>
                <td>".$row->dt_1."</td>
                <td>"."<a href='#' class='btn btn-danger btn-condensed delete' title='Delete Item' id='$row->id' ><i class='mdi mdi-close'></i></a></td>
                </tr>
            ";
            $numb ++;
        }
    }
    return $tbdt;
}


}


