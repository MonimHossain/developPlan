<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnapprovedProjectInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unapproved_project_infos', function (Blueprint $table) {
            $table->increments('id');


            $table->string('project_title',255);
            $table->string('project_tiltle_bn',255);
            $table->tinyInteger('project_type');
            $table->tinyInteger('project_code')->nullable();
            $table->tinyInteger('ministry')->nullable();
            $table->tinyInteger('agency')->nullable();
            $table->tinyInteger('sector')->nullable();
            $table->tinyInteger('sub_sector')->nullable();

            $table->text('objectives');
            $table->text('objectives_bn');
            $table->double('total');
            $table->double('gob');
            $table->double('fe');
            $table->double('pa');
            $table->double('rpa');
            $table->double('own_fund');

            $table->double('exchange_rate');
            $table->date('exchange_date');

            $table->date('date_of_commencement');
            $table->date('date_of_completion');

            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();

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
        Schema::dropIfExists('unapproved_project_infos');
    }
}
