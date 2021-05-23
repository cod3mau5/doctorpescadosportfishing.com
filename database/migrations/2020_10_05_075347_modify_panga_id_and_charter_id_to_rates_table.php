<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPangaIdAndCharterIdToRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rates', function (Blueprint $table) {
            // AGREGANDO ONDELETE CASCADE PARA ELIMINAR CLAVE FORANEA

            // $table->unsignedBigInteger('panga_id')->nullable();//Foreign
            $table->dropForeign(['panga_id']);
            $table->foreign('panga_id')->references('id')->on('pangas')->onDelete('cascade')->change();//Reference_foreign
            
            //$table->unsignedBigInteger('charter_id')->nullable();//Foreign
            $table->dropForeign(['charter_id']);
            $table->foreign('charter_id')->references('id')->on('charters')->onDelete('cascade')->change();//Reference_foreign
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rates', function (Blueprint $table) {
            // $table->unsignedBigInteger('panga_id')->nullable();//Foreign
            $table->dropForeign(['panga_id']);
            $table->foreign('panga_id')->references('id')->on('pangas')->change();//Reference_foreign
            
            //$table->unsignedBigInteger('charter_id')->nullable();//Foreign
            $table->dropForeign(['charter_id']);
            $table->foreign('charter_id')->references('id')->on('charters')->change();//Reference_foreign
        });
    }
}
