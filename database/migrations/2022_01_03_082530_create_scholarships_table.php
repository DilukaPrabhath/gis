<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('st_num',20)->nullable();
            $table->float('disc_prtg',5)->nullable();
            $table->decimal('disc_amount',9,2)->nullable();
            $table->integer('user_id')->nullable();
            $table->date('sta_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('grd')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('scholarships');
    }
}
