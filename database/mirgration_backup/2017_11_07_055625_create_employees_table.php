<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hremployees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->date('dob');
            $table->date('joindate');
            $table->integer('nid');
            $table->integer('phone');
            $table->string('section');
            $table->string('dep');
            $table->string('designation');
            $table->string('email');
            $table->string('addr');
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
        Schema::dropIfExists('hremployees');
    }
}
