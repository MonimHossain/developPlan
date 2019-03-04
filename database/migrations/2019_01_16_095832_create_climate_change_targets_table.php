<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClimateChangeTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('climate_change_targets', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('goal_id');
            $table->Text('targets');
            $table->Text('description');
            $table->Integer('status');
            $table->Integer('created_by')->nullable();
            $table->Integer('updated_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('climate_change_targets');
    }
}
