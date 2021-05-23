<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtracolumnsToRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->string('default_half_day_description');
            $table->string('half_day_description');
            $table->string('default_full_day_description');
            $table->string('full_day_description');
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
            $table->dropColumn('default_half_day_description');
            $table->dropColumn('half_day_description');
            $table->dropColumn('default_full_day_description');
            $table->dropColumn('full_day_description'); 
        });
    }
}
