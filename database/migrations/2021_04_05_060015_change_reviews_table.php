<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn(['company_id', 'user_id']);

            $table->unsignedBigInteger('order_id')->after('id')->unique();
            $table->unsignedBigInteger('category_id')->after('order_id');

            $table->foreign('order_id')->on('orders')->references('id');
            $table->foreign('category_id')->on('categories')->references('id');
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
            $table->dropForeign(['order_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn(['order_id', 'category_id']);

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('company_id')->on('companies')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->on('users')->references('id')
                ->nullOnDelete()->cascadeOnUpdate();
        });
    }
}
