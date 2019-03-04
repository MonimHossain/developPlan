<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnapprovedProjectSourceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unapproved_project_source_details', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('project_id')->nullable();

            $table->double('finanacing_source')->nullable();
            $table->double('amount')->nullable();

            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
           
            $table->tinyInteger('status')->nullable();

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
        Schema::dropIfExists('unapproved_project_source_details');
    }
}
