<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('recording_date');
            $table->date('invoice_date');
            $table->string('voucher_no');
            $table->integer('head_id')->unsigned()->nullable();
            $table->integer('subhead_id')->unsigned()->nullable();
            $table->integer('party_id')->unsigned()->nullable();
            $table->string('particulars')->nullable();
            $table->string('details_description')->nullable();
            $table->string('mode_of_payment');
            $table->string('cheque_no')->nullable();
            $table->integer('expense_amount');
            $table->foreign('head_id')->references('id')->on('account_heads')->onDelete('cascade');
            $table->foreign('party_id')->references('id')->on('parties')->onDelete('cascade');
            $table->foreign('subhead_id')->references('id')->on('account_sub_heads')->onDelete('cascade');
            $table->foreign('subhead_id')->references('id')->on('account_sub_heads')->onDelete('cascade');
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
        Schema::dropIfExists('expenses');
    }
}
