<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTwoColumnAddOneColumnInMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('root_menu');
            $table->dropColumn('sub_root_menu');
            $table->dropColumn('sequence');
            $table->integer('parent_menu')->after('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->integer('root_menu')->nullable();
            $table->integer('sub_root_menu')->nullable();
            $table->integer('sequence')->nullable();
            $table->dropColumn('parent_menu');
        });
    }
}
