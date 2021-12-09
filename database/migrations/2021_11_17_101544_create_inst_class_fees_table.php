<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstClassFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_class_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('ins_id');
            $table->Integer('grd_id');
            $table->decimal('anual_price', 5, 2);
            $table->decimal('qutation_price', 5, 2);
            $table->decimal('monthly_price', 5, 2);
            $table->Integer('syl_id');
            $table->smallInteger('status');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inst_class_fees');
    }
}
