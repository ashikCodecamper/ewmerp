<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcpStepTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dcp_step_twos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('source_id');
            $table->string('supplier_id');
            $table->double('fob_price', 15, 3);
            $table->double('target_price', 15, 3);
            $table->string('sup_name');
            $table->integer('courier_no');
            $table->date('submission_date');
            $table->string('prcl_track_no');
            $table->date('uk_arrival');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('dcp_step_twos');
    }
}
