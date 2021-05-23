<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxAnglersToPangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pangas', function (Blueprint $table) {
            $table->integer('max_anglers')->after('description');
            $table->string('feets')->default('23')->after('max_anglers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pangas', function (Blueprint $table) {
            $table->dropColumn('max_anglers');
            $table->dropColumn('feets');
        });
    }
}
