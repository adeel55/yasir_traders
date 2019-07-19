<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sale_man_id');
            $table->unsignedBigInteger('receive_invoice_id');
            $table->decimal('amount',15,2)->default(0);
            $table->string('description',150)->nullable();
            $table->timestamps();


            $table->foreign('sale_man_id')->references('id')->on('sale_men')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('receive_invoice_id')->references('id')->on('receive_invoices')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
