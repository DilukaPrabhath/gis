<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nursary_class_type extends Model
{
    use HasFactory;

    public static function data_table() {
        $sql= DB::table('nursary_class_types')
            ->select('nursary_class_types.*', 'institutes.institute_name as institute')
            ->leftjoin('institutes','nursary_class_types.school_id', '=', 'institutes.id')
            ->get();
            return $sql;
        }
}
