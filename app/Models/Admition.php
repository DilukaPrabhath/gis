<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admition extends Model
{
    use HasFactory;


    public static function tbl_load($request) {
        $sql= DB::table('admitions')
            ->select('admitions.*','students.student_full_name','students.created_at as stu_cre','grades.grade',)
            ->leftjoin('students','admitions.student_sid', '=', 'students.student_id')
            ->leftjoin('grades','students.grade_now', '=', 'grades.id')
            ->whereBetween('admitions.created_at',[$request->date_start,$request->date_end])
            ->where('admitions.school_id','=',$request->school_daterange)
            ->get();
            return $sql;
        }

        public static function datetbl_load($request) {
            $sql= DB::table('admitions')
                ->select('admitions.*','students.student_full_name','students.created_at as stu_cre','grades.grade',)
                ->leftjoin('students','admitions.student_sid', '=', 'students.student_id')
                ->leftjoin('grades','students.grade_now', '=', 'grades.id')
                ->whereDate('admitions.created_at',$request->select_date)
                ->where('admitions.school_id','=',$request->school_date)
                ->get();
                return $sql;
            }
}
