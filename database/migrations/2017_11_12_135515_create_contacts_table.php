<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name')
				->nullable();
			$table->string('surname')
				->nullable();
			$table->boolean('is_company');
			$table->string('company_name')
				->nullable();
			$table->string('gender')
				->nullable();
			$table->date('birth')
				->nullable();
			$table->string('occupation')
				->nullable();
			$table->text('notes')
				->nullable();

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('contacts');
	}
}
