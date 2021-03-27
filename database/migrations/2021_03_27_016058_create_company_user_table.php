<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('role_id');

            $table->primary(['company_id', 'user_id']);

            $table->foreign('company_id')->on('companies')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->on('users')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('role_id')->on('roles')->references('id')
                ->restrictOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_user', function (Blueprint $table) {
            $table->dropForeign(['company_id', 'user_id', 'role_id']);
            $table->dropIfExists();
        });
    }
}
