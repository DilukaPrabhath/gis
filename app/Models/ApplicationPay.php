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



    public static function tbl_load($request) {
        $sql= DB::table('application_pays')
            ->select('application_pays.*','students.student_full_name','students.created_at as stu_cre')
            ->leftjoin('students','application_pays.inq_id', '=', 'students.inq_number')
            ->whereBetween('application_pays.created_at',[$request->date_start,$request->date_end])
            ->where('application_pays.institute_id','=',$request->school_daterange)
            ->get();
            return $sql;
        }

        public static function datetbl_load($request) {
            $sql= DB::table('application_pays')
                ->select('application_pays.*','students.student_full_name','students.created_at as stu_cre')
                ->leftjoin('students','application_pays.inq_id', '=', 'students.inq_number')
                ->whereDate('application_pays.created_at',$request->select_date)
                ->where('application_pays.institute_id','=',$request->school_date)
                ->get();
                return $sql;
            }

}
