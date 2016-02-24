<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
                  $table->increments('id');
                  $table->string('first_name', 32);
                  $table->string('last_name', 32);
                  $table->string('username', 32);
                  $table->string('email', 320);
                  $table->string('password', 64);
                  $table->string('profile_image', 32);
                  $table->string('address', 32);
                              // required for Laravel 4.1.26
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
		Schema::drop('user');
	}

}
