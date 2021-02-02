<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crosses', function (Blueprint $table) {
            $table->id();
            $table->string('autopart_name');
            $table->string('brand')->nullable()->default('');
            $table->string('autopart_numb_orig');
            $table->string('autopart_numb_analog');
            $table->softDeletes();
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
