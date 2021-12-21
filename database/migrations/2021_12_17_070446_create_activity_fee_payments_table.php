<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityFeePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_fee_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price', 7, 2)->nullable();
            $table->Integer('activity_id')->nullable();
            $table->string('stu_num',120)->nullable();
            $table->string('rec_num',120)->nullable();
            $table->Integer('inst_id')->nullable();
            $table->Integer('status')->nullable();
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
        Schema::dropIfExists('activity_fee_payments');
    }
}
