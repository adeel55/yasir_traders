<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sale_man_id');
            $table->unsignedBigInteger('order_booker_id');
            $table->decimal('discount_total',15,2)->default(0);
            $table->decimal('received_amount',15,2)->default(0);
            $table->date('received_at');
            $table->timestamps();


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
        Schema::dropIfExists('receive_invoices');
    }
}
