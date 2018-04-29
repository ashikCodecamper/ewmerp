<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('srcno');
            $table->string('po_sheet_rcv');
            $table->string('po_number');
            $table->string('color');
            $table->string('quantity');
            $table->string('ETD');
            $table->string('ex_factory_date');
            $table->string('warehouse_date');
            $table->string('ship_mode');
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
        Schema::dropIfExists('order_processes');
    }
}
