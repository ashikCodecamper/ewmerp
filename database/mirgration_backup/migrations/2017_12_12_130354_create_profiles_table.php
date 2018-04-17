<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('avatar');
            $table->date('dob');
            $table->date('join_date');
            $table->integer('nid');
            $table->string('section');
            $table->string('department');
            $table->string('designation');
            $table->string('mobile_number');
            $table->string('blood_group');
            $table->string('passport_number');
            $table->date('exp_date');
            $table->string('emg_contact_number');
            $table->string('present_addr');
            $table->string('permanent_addr');
            $table->string('edu_back');
            $table->string('pre_office_info');
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
        Schema::dropIfExists('profiles');
    }
}
