<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    public static function tbldata() {
        $sql= DB::table('students')
            ->select('students.*', 'institutes.institute_name as institute','grades.grade')
            ->leftjoin('institutes','students.re_ins_id', '=', 'institutes.id')
            ->leftjoin('grades','students.re_grd_id', '=', 'grades.id')
            ->Where('students.prmy','=',2)
            ->orderBy('students.id','DESC')
            ->get();
            return $sql;
        }

        public static function primarytbldata() {
            $sql= DB::table('students')
                ->select('students.*', 'institutes.institute_name as institute','grades.grade')
                ->leftjoin('institutes','students.re_ins_id', '=', 'institutes.id')
                ->leftjoin('grades','students.re_grd_id', '=', 'grades.id')
                ->Where('students.prmy','=',1)
                ->orderBy('students.id','DESC')
                ->get();
                return $sql;
            }


        public static function application_tbldata() {
            $sql= DB::table('students')
                ->select('students.*', 'institutes.institute_name as institute_nm','grades.grade as grade_name')
                ->leftjoin('institutes','students.institute', '=', 'institutes.id')
                ->leftjoin('grades','students.grade_now', '=', 'grades.id')
                ->orWhere('students.stu_status','=',5)
                ->orWhere('students.stu_status','=',6)
                ->get();
                return $sql;
            }

            public static function nursary_tbldata() {
                $sql= DB::table('students')
                    ->select('students.*', 'institutes.institute_name as institute_nm')
                    ->leftjoin('institutes','students.institute', '=', 'institutes.id')
                    ->orWhere('students.stu_status','=',5)
                    ->orWhere('students.stu_status','=',6)
                    ->get();
                    return $sql;
                }

            public static function reg_tbldata() {
                $sql= DB::table('students')
                    ->select('students.*', 'institutes.institute_name as institute','grades.grade')
                    ->leftjoin('institutes','students.re_ins_id', '=', 'institutes.id')
                    ->leftjoin('grades','students.re_grd_id', '=', 'grades.id')
                    ->orWhere('students.stu_status','=',5)
                    ->orWhere('students.stu_status','=',6)
                    ->get();
                    return $sql;
                }

        // public static function data($id) {
        //     $sql= DB::table('students')
        //         ->select('students.*', 'institutes.institute_name as institute','grades.grade','parentms.parent_nic','parentms.parent_name','parentms.parent_mobile','parentms.parent_address','parentms.parent_relationship')
        //         ->leftjoin('institutes','students.re_ins_id', '=', 'institutes.id')
        //         ->leftjoin('grades','students.re_grd_id', '=', 'grades.id')
        //         ->leftjoin('parentms','students.id', '=', 'parentms.st_id')
        //         ->where('students.id','=',$id)
        //         ->get();
        //         return $sql;
        //     }

         public static function data($id) {
            $sql= DB::table('parentms')
                ->select('parentms.*', 'institutes.institute_name as institute','grades.grade','students.id as stid','students.student_full_name','students.dob','students.inq_number','students.re_ins_id','students.re_grd_id','students.inq_type','students.inq_status','students.stu_status','students.gender','students.interview_status','students.application_status','students.interview_type','students.re_interview_apply','students.resipt_number','students.resipt_image','students.student_image','students.reg_typ','students.registration_date','students.pre_sc_att','students.schoolership_apply','students.is_id_fee_paid','students.is_id_issue','students.syllubus_type','students.student_id','students.grade_now','students.stu_img','students.pamt_typ','students.emergency_contact_nic','students.emergency_contact_name','students.emergency_contact_relationship','students.emergency_contact_mobile','students.pre_school_id','students.recod','students.institute as in_id')
                ->leftjoin('students','parentms.st_id', '=', 'students.id')
                ->leftjoin('institutes','students.re_ins_id', '=', 'institutes.id')
                ->leftjoin('grades','students.re_grd_id', '=', 'grades.id')
                ->where('parentms.id','=',$id)
                ->get();
                return $sql;
            }

}
