<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnapprovedProjectLocationWiseCostDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unapproved_project_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->tinyInteger('division');
            $table->tinyInteger('rmo')->nullable();
            $table->tinyInteger('district');
            $table->tinyInteger('upazila');
            $table->double('amount');

            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unapproved_project_locations');
    }
}
