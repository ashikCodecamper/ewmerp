<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisedExfactoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revised_exfactory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ord_id')->unsigned();
            $table->date('previous_exfactory');
            $table->date('new_exfactory');
            $table->text('change_reason');
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
        Schema::dropIfExists('revised_exfactory');
    }
}
