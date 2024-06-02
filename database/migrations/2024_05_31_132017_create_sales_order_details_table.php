<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('PurchaseID')->unsigned();
            $table->foreign('PurchaseID')->references('PurchaseID')->on('sales_orders');
            $table->integer('ProductID');
            $table->foreign('ProductID')->references('ProductID')->on('products');
            $table->decimal('Total Amount');
            $table->string('Unit');
            $table->integer('Quantity');
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
        Schema::dropIfExists('sales_order_details');
    }
}
