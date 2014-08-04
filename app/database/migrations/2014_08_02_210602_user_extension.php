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
		Schema::create('user_extension', function($table)
			{
				$table->increments('id');
				$table->integer('user_id')->unsigned()->nullable();
				$table->string('signature')->default(null);
				$table->string('description')->default(0);
				$table->string('avatar')->default(0);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_extension');
	}

}
