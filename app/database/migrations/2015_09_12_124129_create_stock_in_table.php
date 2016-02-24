<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockInTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_in', function(Blueprint $table)
		{
			$table->increments('stock_ID');
                        $table->integer('Product_ID');
                        $table->integer('Product_Count');
                        $table->integer('Order_No');
                        $table->integer('Supplier_ID');
                        $table->date('Order_date');
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
		Schema::drop('stock_in');
	}

}
