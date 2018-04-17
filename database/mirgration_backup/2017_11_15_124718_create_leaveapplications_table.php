<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveapplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaveapplications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('reason');
            $table->integer('leavetype_id');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('leave_days');
            $table->string('status');
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
        Schema::dropIfExists('leaveapplications');
    }
}
