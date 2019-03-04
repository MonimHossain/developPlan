<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePovertyGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poverty_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goal_no');
            $table->text('goal_name');
            $table->text('goal_description');
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
        Schema::dropIfExists('poverty_goals');
    }
}
