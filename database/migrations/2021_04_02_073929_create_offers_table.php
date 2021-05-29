<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name', 100);
            $table->string('description');
            $table->string('price', 50);
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            $table->foreign('company_id')->on('companies')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('category_id')->on('categories')->references('id')
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
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign(['company_id', 'category_id']);
        });
    }
}
