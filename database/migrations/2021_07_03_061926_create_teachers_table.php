<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('digree');
            $table->text('skill');
            $table->text('about');
            $table->text('comment');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('teachers', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('Restrict')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
