<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnapproveProjectLinkagesAndTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unapprove_project_linkages_and_targets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('type');
            $table->tinyInteger('relaion');
            $table->integer('goal');
            $table->integer('target');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('status');
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
        Schema::dropIfExists('unapprove_project_linkages_and_targets');
    }
}
