<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedSmallInteger('status_id');
            $table->text('details');
            $table->timestamps();

            $table->foreign('customer_id')->on('users')->references('id')
                ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('company_id')->on('companies')->references('id')
                ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('status_id')->on('statuses')->references('id')
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['customer_id', 'company_id', 'status_id']);
            $table->dropIfExists();
        });
        Schema::dropIfExists('orders');
    }
}
