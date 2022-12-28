<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_corrections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_sid')->nullable();
            $table->string('recipt_no',100)->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->text('note')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('payment_corrections');
    }
}
