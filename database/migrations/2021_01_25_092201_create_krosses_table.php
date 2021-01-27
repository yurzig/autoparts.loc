<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krosses', function (Blueprint $table) {
            $table->id();
            $table->string('autopart_name');
            $table->bigInteger('manufacturer_id')->unsigned();
            $table->string('autopart_numb_orig');
            $table->string('autopart_numb_analog');
            $table->softDeletes();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->index('autopart_numb_orig');
            $table->index('autopart_numb_analog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('krosses');
    }
}
