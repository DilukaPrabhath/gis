<?php

namespace App\Exports;

use App\Models\ApplicationPay;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

            $sql= DB::table('activity_fee_payments')
                ->select('activity_fee_payments.*', 'activities.activity as act')
                ->leftjoin('activities','activity_fee_payments.activity_id', '=', 'activities.id')
                ->get();
                return $sql;

    }
}
