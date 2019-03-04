<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('division_name');
            $table->string('division_description');

            $table->integer('created_by');
            $table->integer('updated_by');

            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('divisions', function (Blueprint $table) {
            $table->dropColumn('division_name');
            $table->dropColumn('division_description');

            $table->dropColumn('status');



        });

    }
}
