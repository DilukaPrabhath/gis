<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventTicket;
use Illuminate\Http\Request;

class AdminTktPriceCon extends Controller
{
    public function index(){
        $data = Event::tbldata();
        return view('admin.eventticket.index',compact('data'));
    }

    public function create($id){
        $data = EventTicket::all();
        $eve = Event::where('status',1)->get();
        $tic = EventTicket::datatble($id);
        $t_id = $id;

        return view('admin.eventticket.create',compact('eve','data','tic','t_id'));
    }

    public function view($id){

        $evet = Event::data($id);
        $data = EventTicket::datatble($id);

        return view('admin.eventticket.view',compact('data','evet'));
    }


    public function store(Request $request){

        // $rules = [
        //     'price' => 'required',
        //     'status'  => 'required',
        //     'max_count'  => 'required',
        //     'ticket_category'     => ['required', function($attr, $value, $fail) use ($request){
        //         if( EventTicket::where('grd_id', $request->grade)->where('syl_id',$request->syllabus)->where('year',$request->year)->count() > 0 ){
        //             $fail("This Grade alredy fild.");
        //         }
        //     }]
        // ];

        $ticprice = new EventTicket();

        $ticprice->evt_id = $request->t_id;
        $ticprice->price = $request->price;
        $ticprice->ticket_category = $request->ticket_category;
        $ticprice->max_count = $request->max_count;
        $ticprice->status = $request->status;
        $ticprice->save();

        $notification = array(
            'message' => 'Event Ticket Category Create Successfully!',
            'alert-type' => 'Success'
        );
        $id = $request->t_id;
        return redirect('admin/event_tickets/create/'.$id)->with($notification);


    }

    public function edit($id,$t_id){
        $evid = $id;
        $ticedit = EventTicket::find($t_id);
        $t_id = $t_id;
        $tic = EventTicket::datatble($id);
        return view('admin.eventticket.edit',compact('ticedit','tic','t_id','evid'));
    }

    public function update(Request $request,$id,$t_id){
        //return $t_id;

        $ticprice = EventTicket::find($t_id);

        $ticprice->evt_id = $id;
        $ticprice->price = $request->price;
        $ticprice->ticket_category = $request->ticket_category;
        $ticprice->max_count = $request->max_count;
        $ticprice->status = $request->status;
        $ticprice->save();

        $notification = array(
            'message' => 'Event Ticket Category Updated Successfully!',
            'alert-type' => 'Success'
        );
        $id = $id;
        return redirect('admin/event_tickets/create/'.$id)->with($notification);


    }



    //_________Validation______________________________________________________________________________________________________________
    //category
    public function validateactivity(Request $request){
        {
            $institute = EventTicket::where('ticket_category', $request->ticket_category)->where('evt_id', $request->id)->first('ticket_category');
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
