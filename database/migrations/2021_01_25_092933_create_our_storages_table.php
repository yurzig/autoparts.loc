<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_storages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('manufacturer_id')->unsigned();
            $table->string('autopart_numb');
            $table->string('autopart_name');
            $table->smallInteger('storage_numb')->unsigned();
            $table->string('cell_numb');
            $table->decimal('purchase_price', 10, 2, true)->default(0);;
            $table->decimal('sales_price', 10, 2, true)->default(0);;
            $table->integer('remains');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('our_storages');
    }
}
