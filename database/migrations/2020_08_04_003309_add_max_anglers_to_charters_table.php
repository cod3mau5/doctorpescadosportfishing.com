<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxAnglersToChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charters', function (Blueprint $table) {
            $table->integer('max_anglers')->after('description');
            $table->string('feets')->after('max_anglers');
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
            $table->dropColumn('max_anglers');
            $table->dropColumn('feets');
        });
    }
}
