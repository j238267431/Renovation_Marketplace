<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title', 150);
            $table->text('content')->nullable();
            $table->enum('rating', [1,2,3,4,5]);
            $table->boolean('recommend')->default(0);
            $table->timestamps();

            $table->unique(['company_id', 'user_id']);

            $table->foreign('company_id')->on('companies')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->on('users')->references('id')
                ->nullOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['company_id', 'user_id']);
            $table->dropIfExists();
        });
    }
}
