<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('sale_man_id')->nullable();
            $table->unsignedBigInteger('order_booker_id')->nullable();
            $table->decimal('total_amount',15,2)->nullable();
            $table->decimal('received_amount',15,2)->nullable();
            $table->decimal('balance',15,2)->nullable();
            $table->tinyInteger('received')->default(0);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sale_man_id')->references('id')->on('sale_men')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_booker_id')->references('id')->on('order_bookers')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
