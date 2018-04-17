<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmpAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmp_audits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('smeta_id')->unsigned();
            $table->date('smetaAuditDate');
            $table->date('smetaNextAuditDate');
            $table->integer('semtaNumberOfCap');
            $table->date('smetaClosingDate');
            $table->foreign('smeta_id')->references('id')->on('cmp_smetas')
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
        Schema::dropIfExists('cmp_audits');
    }
}
