<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSevenColumUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('admin')->after('password')->nullable();
            $table->timestamp('email_verified_at')->after('email')->nullable();
            $table->integer('user_group')->after('admin');
            $table->integer('parent_user')->after('user_group');
            $table->date('expiration_date')->after('parent_user')->nullable();
            $table->integer('createdby')->after('remember_token')->nullable();
            $table->integer('modifiedby')->after('remember_token')->nullable();
            $table->tinyInteger('isactive')->after('updated_at')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admin');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('user_group');
            $table->dropColumn('parent_user');
            $table->dropColumn('createdby');
            $table->dropColumn('modifiedby');
            $table->dropColumn('isactive');
            $table->dropColumn('expiration_date');
        });
    }
}
