<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_boats', function (Blueprint $table) {
            $table->id();
            $table->string('name');

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
        Schema::dropIfExists('image_boats');
    }
}
