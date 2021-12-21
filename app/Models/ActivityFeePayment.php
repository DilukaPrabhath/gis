<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityFeePayment extends Model
{
    use HasFactory;

    public static function tbl() {
        $sql= DB::table('activity_fee_payments')
            ->select('activity_fee_payments.*', 'activities.activity as act')
            ->leftjoin('activities','activity_fee_payments.activity_id', '=', 'activities.id')
            ->get();
            return $sql;
        }

        public static function print($id) {
            $sql= DB::table('activity_fee_payments')
                ->select('activity_fee_payments.*', 'activities.activity as act')
                ->leftjoin('activities','activity_fee_payments.activity_id', '=', 'activities.id')
                ->where('activity_fee_payments.id','=',$id)
                ->get();
                return $sql;
            }
}
