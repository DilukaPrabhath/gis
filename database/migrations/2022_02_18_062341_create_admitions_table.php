<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_sid');
            $table->string('recipt_no',100);
            $table->decimal('price',9,2)->nullable();
            $table->integer('school_id');
            $table->integer('user_id');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('admitions');
    }
}
