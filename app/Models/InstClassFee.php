<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InstClassFee extends Model
{
    use HasFactory;

    public static function data($ins_id) {
        $sql= DB::table('inst_class_fees')
            ->select('inst_class_fees.*', 'institutes.institute_name as institute','grades.grade','syllabi.syllubus')
            ->leftjoin('institutes','inst_class_fees.ins_id', '=', 'institutes.id')
            ->leftjoin('grades','inst_class_fees.grd_id',  '=', 'grades.id')
            ->leftjoin('syllabi','inst_class_fees.syl_id', '=', 'syllabi.id')
            ->where('inst_class_fees.ins_id','=',$ins_id)
            ->get();
            return $sql;
        }

        public static function grade_get($request) {
            $sql= DB::table('inst_class_fees')
                ->select('inst_class_fees.*','grades.grade','grades.id as gd_id')
                ->leftjoin('grades','inst_class_fees.grd_id', '=', 'grades.id')
                ->where('inst_class_fees.year',  '=',$request->register_year)
                ->where('inst_class_fees.ins_id','=',$request->institute)
                ->where('inst_class_fees.syl_id','=',$request->sy_type)
                ->get();
                return $sql;
            }
}
