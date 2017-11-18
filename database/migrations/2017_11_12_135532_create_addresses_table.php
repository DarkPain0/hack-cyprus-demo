<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::disableForeignKeyConstraints();
		Schema::create('addresses', function (Blueprint $table) {
			$table->increments('id');

			$table->unsignedInteger('contact_id');
			$table->foreign('contact_id', 'FK_address_contact')
				->references('id')
				->on('contacts');
			$table->string('type');
			$table->boolean('is_main');
			$table->string('street')
				->nullable();
			$table->string('number')
				->nullable();
			$table->string('building')
				->nullable();
			$table->string('floor')
				->nullable();
			$table->string('apartment')
				->nullable();
			$table->string('postal_code')
				->nullable();
			$table->string('city')
				->nullable();
			$table->string('district')
				->nullable();
			$table->string('country')
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
		Schema::dropIfExists('addresses');
	}
}
