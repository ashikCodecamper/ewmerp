<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSubHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_sub_heads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('head_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->foreign('head_id')->references('id')->on('account_heads')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('account_sub_heads');
    }
}
