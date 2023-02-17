<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NurseryGradeTable extends Model
{
    use HasFactory;

    public static function tbldata() {
        $sql= DB::table('nursery_grade_tables')
            ->select('nursery_grade_tables.*', 'nursery_class_tables.nursery_class_name as class_name')
            ->leftjoin('nursery_class_tables','nursery_grade_tables.nursery_class_id', '=', 'nursery_class_tables.id')
            ->get();
            return $sql;
        }
}
