<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->increments('uid');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            // $table->date('dob')->nullable();
            // $table->string('country')->nullable();
            // $table->string('language')->nullable();
            $table->string('bio')->nullable();
            $table->string('job')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('photo_link')->nullable();
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
        Schema::dropIfExists('Users');
    }
}
