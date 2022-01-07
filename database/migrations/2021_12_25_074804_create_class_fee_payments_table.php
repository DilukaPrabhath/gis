<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassFeePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_fee_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipt_id',150)->nullable();
            $table->string('stu_num',120)->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('intrest');
            $table->decimal('sub_total', 8, 2);
            $table->integer('payment_type');
            $table->date('pay_date')->nullable();
            $table->string('ref_no',120)->nullable();
            $table->string('slip_img',150)->nullable();
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
        Schema::dropIfExists('class_fee_payments');
    }
}
