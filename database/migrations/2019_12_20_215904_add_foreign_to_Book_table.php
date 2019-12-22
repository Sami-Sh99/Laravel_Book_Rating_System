<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Books', function($table)
        {
            $table->foreign('user_uid')->references('uid')->on('Users');
            $table->foreign('cid')->references('cid')->on('Categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Books', function($table)
        {
            $table->dropForeign('user_uid');
            $table->dropForeign('cid');
        });
    }
}
