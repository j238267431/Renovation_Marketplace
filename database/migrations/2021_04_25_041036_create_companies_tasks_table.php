<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('task_id');
            $table->string('price', 50)->nullable();
            $table->string('comment')->nullable();
            $table->date('term')->nullable();
            $table->string('file', 150)->nullable();
            $table->timestamps();


            $table->foreign('company_id')->on('companies')->references('id')
                ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('task_id')->on('tasks')->references('id')
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
        Schema::table('companies_tasks', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['task_id']);
            $table->dropIfExists();
        });
    }
}
