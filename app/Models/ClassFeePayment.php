<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClassFeePayment extends Model
{
    use HasFactory;

    public static function datevise($request) {
        $sql= DB::table('class_fee_payments')
            ->select('class_fee_payments.*','students.student_full_name','grades.grade')
            ->leftjoin('students','class_fee_payments.stu_num', '=', 'students.student_id')
            ->leftjoin('grades','students.grade_now', '=', 'grades.id')
            ->whereDate('class_fee_payments.created_at',$request->select_date)
            ->where('class_fee_payments.institute_id','=',$request->school_date)
            ->get();
            return $sql;
        }


        public static function daterange($request) {
            $sql= DB::table('class_fee_payments')
                ->select('class_fee_payments.*','students.student_full_name','grades.grade')
                ->leftjoin('students','class_fee_payments.stu_num', '=', 'students.student_id')
                ->leftjoin('grades','students.grade_now', '=', 'grades.id')
                ->whereBetween('class_fee_payments.created_at',[$request->date_start,$request->date_end])
                ->where('class_fee_payments.institute_id','=',$request->school_daterange)
                ->get();
                return $sql;
            }



}
