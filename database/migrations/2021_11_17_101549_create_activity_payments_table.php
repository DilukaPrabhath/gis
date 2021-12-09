<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('stu_id');
            $table->Integer('act_id');
            $table->decimal('act_price', 5, 2);
            $table->string('recipt_num');
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
        Schema::dropIfExists('activity_payments');
    }
}
