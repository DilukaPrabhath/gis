<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemTblsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tem_tbls', function (Blueprint $table) {
            $table->id();
            $table->string('temp_id_1')->nullable();
            $table->string('temp_id_2')->nullable();
            $table->Integer('1nt_1')->nullable();
            $table->Integer('1nt_2')->nullable();
            $table->Integer('1nt_3')->nullable();
            $table->Integer('1nt_4')->nullable();
            $table->string('str_1',100)->nullable();
            $table->string('str_2',100)->nullable();
            $table->string('str_3',100)->nullable();
            $table->string('str_4',100)->nullable();
            $table->date('dt_1')->nullable();
            $table->date('dt_2')->nullable();
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
        Schema::dropIfExists('tem_tbls');
    }
}
