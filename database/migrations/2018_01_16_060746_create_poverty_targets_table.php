<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePovertyTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poverty_targets', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('goal_name_id');
          $table->text('target');
          $table->text('target_description');
          $table->tinyInteger('status');
          $table->mediumInteger('created_by');
          $table->mediumInteger('updated_by');
          $table->timestamps();
          $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poverty_targets');
    }
}
