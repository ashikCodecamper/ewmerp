<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSealFourRejectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seal_four_rejects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proto_id')->unsigned();
            $table->integer('sealfour_id')->unsigned();
            $table->date('plan_date');
            $table->date('submission_date');
            $table->string('awb_details');
            $table->string('comment');
            $table->date('comment_date');
            $table->string('rev_comment');
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
        Schema::dropIfExists('seal_four_rejects');
    }
}
