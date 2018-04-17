<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmpSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmp_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->text('corporateOfficeDetails');
            $table->text('siteOfficeDetails');
            $table->text('manaingDirectorDetails');
            $table->string('supplierFor');
            $table->string('supplierNo');

            $table->string('bankName');
            $table->string('bankBranch');
            $table->string('bankAddress');
            $table->string('bankAccountNo');
            $table->string('bankSwift');
            $table->boolean('bankIssue');

            $table->boolean('workIssue');

            $table->text('outSourceProcess');
            $table->integer('totalWorkForce');
            $table->integer('productionArea');
            $table->text('currentCustomer');

            

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
        Schema::dropIfExists('cmp_suppliers');
    }
}
