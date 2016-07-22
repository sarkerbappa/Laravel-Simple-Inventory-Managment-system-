<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStockoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_out', function (Blueprint $table) {
            $table->increments('stock_out_id');
            $table->integer('Product_ID');
            $table->integer('Product_Count');
            $table->integer('Requisition_No');
            $table->string('Requisition_By', 100);
            $table->string('Recipient', 100);
            $table->string('remember_token', 100)->nullable();
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
        Schema::drop('stock_out');
    }
}
