<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parentm extends Model
{
    use HasFactory;

    //load bank list
  public static function load_drdwn_data($nic){
    return DB::table('parentms')->where("parent_nic", "LIKE" , "$nic%")->get();
  }
}
