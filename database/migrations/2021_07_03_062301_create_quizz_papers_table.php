<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizz_papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paper_name');
            $table->string('paper_num')->unique();
            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('te_class_id')->unsigned();
            $table->integer('institute_id')->unsigned();
            $table->integer('max_marks');
            $table->tinyInteger('status');
            $table->timestamps();
        });
        Schema::table('quizz_papers', function (Blueprint $table){
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('Restrict')->onUpdate('Cascade');
            $table->foreign('te_class_id')->references('id')->on('teacher_classes')->onDelete('Restrict')->onUpdate('Cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('Restrict')->onUpdate('Cascade');
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('Restrict')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizz_papers');
    }
}
