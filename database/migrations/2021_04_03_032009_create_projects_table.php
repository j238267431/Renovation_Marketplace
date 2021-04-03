<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name', 100);
            $table->string('price', 20);
            $table->string('cover', 100)->nullable()->comment('Аватар проекта');
            $table->string('description', 300)->nullable()->comment('Краткое описание');
            $table->text('content')->nullable()->comment('Подробное описание');
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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['company_id', 'category_id']);
            $table->dropIfExists();
        });
    }
}
