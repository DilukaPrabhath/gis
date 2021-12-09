<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',199);
            $table->string('email',100)->unique();
            $table->string('nic',12)->unique();
            $table->string('mobile',10)->unique();
            $table->string('address',255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image',100)->nullable();
            $table->integer('user_role');
            $table->integer('ins_id');
            $table->string('user_number');
            $table->smallInteger('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
