<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApplicationPay extends Model
{
    use HasFactory;


    // public static function application_tbldata() {
    //     $sql= DB::table('events')
    //         ->select('events.*', 'institutes.institute_name as institute')
    //         ->leftjoin('institutes','events.ins_id', '=', 'institutes.id')
    //         ->get();
    //         return $sql;
    //     }
}
