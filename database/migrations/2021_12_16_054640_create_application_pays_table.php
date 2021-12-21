<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inq_id',120);
            $table->decimal('price', 7, 2);
            $table->Integer('institute_id')->nullable();
            $table->string('slip_num',120)->nullable();
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
        Schema::dropIfExists('application_pays');
    }
}
