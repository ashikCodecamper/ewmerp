<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmpAuditCapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmp_audit_caps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id')->unsigned();
            $table->text('description');
            $table->date('timeline');
            $table->boolean('validationByThirdParty');
            $table->string('comments');
            $table->timestamps();
            $table->foreign('audit_id')->references('id')->on('cmp_audits')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmp_audit_caps');
    }
}
