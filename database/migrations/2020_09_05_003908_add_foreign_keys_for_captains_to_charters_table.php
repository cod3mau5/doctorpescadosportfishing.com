<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysForCaptainsToChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charters', function (Blueprint $table) {     
            $table->unsignedBigInteger('captain_id')->nullable();//Foreign
            $table->foreign('captain_id')->references('id')->on('captains');//Reference_foreign
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('charters', function (Blueprint $table) {
            $table->dropForeign(['captain_id']);
            $table->dropColumn('captain_id');   
        });
    }
}
