<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::disableForeignKeyConstraints();
		Schema::create('phones', function (Blueprint $table) {
			$table->increments('id');

			$table->unsignedInteger('contact_id');
			$table->foreign('contact_id', 'FK_phone_contact')
				->references('id')
				->on('contacts');
			$table->string('type');
			$table->boolean('is_main');
			$table->string('country')
				->nullable();
			$table->string('number')
				->nullable();
			$table->string('extension')
				->nullable();
			$table->text('notes')
				->nullable();


			$table->timestamps();
			$table->softDeletes();

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
		Schema::dropIfExists('phones');
	}
}
