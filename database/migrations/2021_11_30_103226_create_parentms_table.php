<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentms', function (Blueprint $table) {
            $table->id();
            $table->Integer('st_id');
            $table->string('parent_nic',12);
            $table->string('parent_name',120);
            $table->string('parent_mobile',10);
            $table->string('parent_email',120);
            $table->string('parent_address',180);
            $table->string('parent_relationship',50);
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
        Schema::dropIfExists('parentms');
    }
}
