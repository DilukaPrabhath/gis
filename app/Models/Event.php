<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;

    public static function tbldata() {
        $sql= DB::table('events')
            ->select('events.*', 'institutes.institute_name as institute')
            ->leftjoin('institutes','events.ins_id', '=', 'institutes.id')
            ->get();
            return $sql;
        }

        public static function data($id) {
            $sql= DB::table('events')
                ->select('events.*', 'institutes.institute_name as institute')
                ->leftjoin('institutes','events.ins_id', '=', 'institutes.id')
                ->where('events.id','=',$id)
                ->get();
                return $sql;
            }
}
