<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysCharterPangaToCaptainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('captains', function (Blueprint $table) {
            $table->unsignedBigInteger('panga_id')->nullable();//Foreign
            $table->foreign('panga_id')->references('id')->on('pangas');//Reference_foreign
            $table->unsignedBigInteger('charter_id')->nullable();//Foreign
            $table->foreign('charter_id')->references('id')->on('charters');//Reference_foreign
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('captains', function (Blueprint $table) {
            $table->dropForeign(['panga_id']);
            $table->dropForeign(['charter_id']);
            $table->dropColumn('panga_id');  
            $table->dropColumn('charter_id');  
        });
    }
}
