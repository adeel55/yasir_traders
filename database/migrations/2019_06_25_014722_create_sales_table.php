<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('sale_man_id');
            $table->unsignedBigInteger('order_booker_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('qty');
            $table->integer('bonus');
            $table->decimal('unit_price',15,2);
            $table->decimal('total_price',15,2);
            $table->decimal('discount',2,2);
            $table->decimal('discount_total_price',15,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
