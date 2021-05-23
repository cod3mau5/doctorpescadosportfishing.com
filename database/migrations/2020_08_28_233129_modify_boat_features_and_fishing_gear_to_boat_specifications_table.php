<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBoatFeaturesAndFishingGearToBoatSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boat_specifications', function (Blueprint $table) {
            $table->longText('fishing_gear')->change();
            $table->longText('boat_features')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boat_specifications', function (Blueprint $table) {
            $table->dropColumn('fishing_gear');
            $table->dropColumn('boat_features');
        });
    }
}
