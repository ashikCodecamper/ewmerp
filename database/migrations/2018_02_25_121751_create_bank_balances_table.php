<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Date');
            $table->string('description');
            $table->string('ref_no');
            $table->integer('money_received')->nullable();
            $table->integer('money_withdrawn')->nullable();
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
        Schema::dropIfExists('bank_balances');
    }
}
