<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcpsteponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dcpstepones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sl_no');
            $table->bigInteger('season_id');
            $table->bigInteger('brand_id');
            $table->bigInteger('level_id');
            $table->bigInteger('prdct_cat_id');
            $table->string('feb_construction')->nullable();
            $table->string('cutable_width')->nullable();
            $table->double('febrice_price', 14, 3)->nullable();
            $table->string('febrice_weight')->nullable();
            $table->string('garments_weight')->nullable();
            $table->double('garments_price', 14, 3)->nullable();
            $table->string('price_prefix')->nullable();
            $table->string('proto');
            $table->date('proto_rcv_date');
            $table->string('source_type');
            $table->string('clr_name');
            $table->string('style_code');
            $table->text('yarn');
            $table->text('prdct_des');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('dcpstepones');
    }
}
