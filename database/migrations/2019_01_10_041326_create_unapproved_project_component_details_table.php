<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnapprovedProjectComponentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unapproved_project_component_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id');
            $table->integer('serial_number');
            $table->string('components_name');
            $table->double('quantity');
            $table->double('unit_cost');
            $table->double('estimated_cost');
            $table->tinyInteger('created_by');
            $table->tinyInteger('updated_by');

            $table->timestamps();
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unapproved_project_component_details');
    }
}
