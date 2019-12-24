<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Jobs', function($table)
        {
            $table->increments('jid');
            $table->string('name');
        });
        DB::table('Jobs')->insert([
            [ 'name' => 'Newbie'],
            [ 'name' => 'Publisher'],
            [ 'name' => 'Reader'],
            [ 'name' => 'Inspector'],
            [ 'name' => 'Sales person'],
            [ 'name' => 'Author'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Jobs');
    }
}
