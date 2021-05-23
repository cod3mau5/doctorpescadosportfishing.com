<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsmodificationToRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->string('duration_half_day')->nullable()->default('5hrs')	;            
            $table->string('duration_full_day')->nullable()->default('8hrs');  
            $table->string('half_day_description')->nullable()->change()->after('full_day');
            $table->string('full_day_description')->nullable()->change()->after('half_day_description');
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
            $table->dropColumn('duration_half_day');            
            $table->dropColumn('duration_full_day');  
            $table->string('half_day_description')->nullable(false)->change();;
            $table->string('full_day_description')->nullable(false)->change();;
        });
    }
}
