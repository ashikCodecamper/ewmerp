<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->date('sedex_auditdate');
            $table->date('sedex_expirydate');
            $table->date('bsci_auditdate');
            $table->date('bsci_expirydate');
            $table->date('wrap_auditdate');
            $table->date('wrap_expirydate');
            $table->date('ics_auditdate');
            $table->date('ics_expirydate');
            $table->foreign('supplier_id')->references('id')->on('cmp_suppliers')
                ->onDelete('cascade');
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
        Schema::dropIfExists('current_approvals');
    }
}
