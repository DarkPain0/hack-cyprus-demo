<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::disableForeignKeyConstraints();
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('email')
				->unique();
			$table->string('password');
			$table->rememberToken();
			$table->unsignedInteger('contact_id');
			$table->foreign('contact_id', 'FK_user_contact')
				->references('id')
				->on('contacts');
			$table->boolean('is_admin')
				->default(false);
			$table->timestamps();
		});
		Schema::enableForeignKeyConstraints();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
