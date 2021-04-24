<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('file')->nullable()->comment('Дополнительный файл к заданию');
            $table->decimal('budget', 10)->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->default(null);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')
                ->restrictOnDelete()->cascadeOnUpdate();
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
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id', 'category_id']);
            $table->dropIfExists();
        });
    }
}
