<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumOnFinalcialYears extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finalcial_years', function (Blueprint $table) {
            //
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finalcial_years', function (Blueprint $table) {
            //
            $table->dropColum('created_by','updated_by');
        });
    }
}
