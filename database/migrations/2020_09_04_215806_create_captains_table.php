<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaptainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captains', function (Blueprint $table) {
            $table->id();
            $table->string('captain_img', 600)->nullable();
            $table->string('name')->nullable();
            $table->string('origin')->nullable();
            $table->string('experience')->nullable();
            $table->string('favorite_fish')->nullable();
            $table->string('reason_to_fish')->nullable();
            $table->string('hobby')->nullable();
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
        Schema::dropIfExists('captains');
    }
}
