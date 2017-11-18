<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectronicAddressesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::disableForeignKeyConstraints();
		Schema::create('electronic_addresses', function (Blueprint $table) {
			$table->increments('id');

			$table->unsignedInteger('contact_id');
			$table->foreign('contact_id', 'FK_eaddress_contact')
				->references('id')
				->on('contacts');
			$table->string('type');
			$table->boolean('is_main');
			$table->string('value')
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
		Schema::dropIfExists('electronic_addresses');
	}
}
