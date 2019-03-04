<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenderGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->String('goal_no',100);
            $table->String('goal_name',255);
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
        Schema::dropIfExists('gender_goals');
    }
}
