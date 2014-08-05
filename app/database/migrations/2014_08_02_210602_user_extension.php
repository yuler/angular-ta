<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserExtension extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_extensions', function($table)
			{
				$table->increments('id')->unsigned();
				$table->integer('user_id')->unsigned();
				$table->string('nickname')->nullable();
				$table->string('signature')->nullable();
				$table->string('description')->nullable();
				$table->string('avatar')->nullable();
				$table->timestamp('created_at')->nullable();
				$table->timestamp('updated_at')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_extensions');
	}

}
