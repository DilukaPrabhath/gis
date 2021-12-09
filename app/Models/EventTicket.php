<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventTicket extends Model
{
    use HasFactory;

    public static function datatble($id) {
        $sql= DB::table('event_tickets')
            ->select('event_tickets.*', 'events.event','events.status as st')
            ->leftjoin('events','event_tickets.evt_id', '=', 'events.id')
            ->where('event_tickets.evt_id','=',$id)
            ->get();
            return $sql;
        }
}
