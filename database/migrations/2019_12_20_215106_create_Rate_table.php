<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rates', function (Blueprint $table) {
            $table->integer('bid');
            $table->integer('uid');
            $table->integer('rate');
            $table->primary(['bid','uid']);
            $table->foreign('bid')->references('bid')->on('Books');
            $table->foreign('uid')->references('uid')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Rates');
    }
}
