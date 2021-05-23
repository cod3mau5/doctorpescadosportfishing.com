<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('panga_id')->nullable()->unique();//Foreign
            $table->foreign('panga_id')->references('id')->on('pangas');//Reference_foreign

            $table->unsignedBigInteger('charter_id')->nullable()->unique();//Foreign
            $table->foreign('charter_id')->references('id')->on('charters');//Reference_foreign

            $table->float('half_day', 8,2);
            $table->float('full_day', 8,2);
            $table->softDeletes();
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
        Schema::dropIfExists('rates');
    }
}
