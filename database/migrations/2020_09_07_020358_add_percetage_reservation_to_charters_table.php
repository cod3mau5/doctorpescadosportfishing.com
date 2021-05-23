<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPercetageReservationToChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charters', function (Blueprint $table) {
            $table->float('percentage_reservation',8,2)->nullable()->after('feets');
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
            $table->dropColumn('percentage_reservation');
        });
    }
}
