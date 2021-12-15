<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimayStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primay_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_full_name',199);
            $table->string('nwi',100);
            $table->string('inq_number',30);
            $table->Integer('inq_type');
            $table->Integer('inq_status');
            $table->Integer('stu_status');
            $table->Integer('gender');
            $table->string('emergency_contact_nic',12)->nullable();
            $table->string('emergency_contact_name',150)->nullable();
            $table->string('emergency_contact_relationship',50)->nullable();
            $table->Integer('interview_status')->nullable();
            $table->Integer('re_interview_apply')->nullable();
            $table->Integer('application_status')->nullable();
            $table->string('resipt_number',100)->nullable();
            $table->string('resipt_image',100)->nullable();
            $table->Integer('interview_type')->nullable();
            $table->string('student_image',100)->nullable();
            $table->date('registration_date')->nullable();
            $table->Integer('pre_sc_att')->nullable();
            $table->Integer('reg_typ')->nullable();
            $table->Integer('schoolership_apply')->nullable();
            $table->string('schoolership_resipt')->nullable();
            $table->Integer('is_id_fee_paid')->nullable();
            $table->Integer('is_id_issue')->nullable();
            $table->Integer('syllubus_type')->nullable();
            $table->string('student_id',120)->nullable();
            $table->Integer('grade_now')->nullable();
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
        Schema::dropIfExists('primay_students');
    }
}
