<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_specifications', function (Blueprint $table) {
            $table->id();
            $table->string('fishing_gear');
            $table->string('boat_features');

            $table->unsignedBigInteger('panga_id')->nullable();//Foreign
            $table->foreign('panga_id')->references('id')->on('pangas');//Reference_foreign
            
            $table->unsignedBigInteger('charter_id')->nullable();//Foreign
            $table->foreign('charter_id')->references('id')->on('charters');//Reference_foreign
            
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
        Schema::dropIfExists('boat_specifications');
    }
}
