<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('pri_1', 5, 2);
            $table->unsignedInteger('stu_id');
            $table->unsignedInteger('evt_id');
            $table->unsignedInteger('tic_typ_id');
            $table->Integer('tic_count');
            $table->unsignedInteger('ins_id');
            $table->decimal('tot_price', 5, 2);
            $table->timestamps();
            $table->foreign('ins_id')->references('id')->on('institutes')->onDelete('Restrict')->onUpdate('Cascade');
            $table->foreign('stu_id')->references('id')->on('grades')->onDelete('Restrict')->onUpdate('Cascade');
            $table->foreign('evt_id')->references('id')->on('syllabi')->onDelete('Restrict')->onUpdate('Cascade');
            $table->foreign('tic_typ_id')->references('id')->on('event_pays')->onDelete('Restrict')->onUpdate('Cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_pays');
    }
}
