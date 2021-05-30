<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('user_id')->unique();
            $table->date('birthday')->nullable();
            $table->string('avatar', 300)->nullable();
            $table->unsignedsmallinteger('country_id')->nullable();
            $table->unsignedbiginteger('city_id')->nullable();
            $table->string('address', 100)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('country_id')->on('countries')->references('id')
                ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('city_id')->on('cities')->references('id')
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
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['city_id']);
            $table->dropIfExists();
        });
    }
}
