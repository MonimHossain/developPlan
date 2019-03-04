<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumOnBudgetHeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_heads', function (Blueprint $table) {
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
        Schema::table('budget_heads', function (Blueprint $table) {
            //
            $table->dropColum('created_by','updated_by');
        });
    }
}
