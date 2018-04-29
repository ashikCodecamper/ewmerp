<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabdipColors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('labdip_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('labdip_id')->unsigned();
            $table->integer('order_process_id')->unsigned();
            $table->string('main_color');
            $table->string('sub_colors')->nullable();
            $table->date('submission_date');
            $table->string('parcel_no');
            $table->date('uk_arrive_date');
            $table->date('uk_recieve_date');
            $table->string('first_submission_cmnt')->nullable();
            $table->string('revised_comment')->nullable();
            $table->date('comment_date');
            $table->date('poms_date');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('laddip_colors');
    }
}
