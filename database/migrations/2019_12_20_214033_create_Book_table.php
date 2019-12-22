<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Books', function (Blueprint $table) {
            $table->increments('bid');
            $table->string('Title');
            $table->string('Subtitle');
            $table->string('Publisher');
            $table->string('Publisher_Link')->nullable();
            $table->string('ISBN')->unique();
            $table->date('DoP')->nullable();
            $table->integer('nb_of_pages')->nullable();
            $table->string('Origin_Language')->nullable();
            $table->decimal('price',5,2)->nullable();
            $table->string('cover_link')->nullable();
            $table->integer('cid')->nullable();
            $table->integer('user_uid');
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
        Schema::dropIfExists('Books');
    }
}
