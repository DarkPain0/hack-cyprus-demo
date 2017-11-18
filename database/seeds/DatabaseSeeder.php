<?php

use App\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// $this->call(UsersTableSeeder::class);
		$users = factory(App\User::class, 3)->create();
		$contacts = factory(App\Contact::class, 150)
			->create()
			->each(function (Contact $contact) {
				$contact->addresses()
					->saveMany(factory(App\Address::class, 4)
						->make(['contact_id' => $contact->id]));
				$contact->eAddresses()
					->saveMany(factory(App\ElectronicAddress::class, 4)
						->make(['contact_id' => $contact->id]));
				$contact->phones()
					->saveMany(factory(App\Phone::class, 4)
						->make(['contact_id' => $contact->id]));
			});
		$companies = factory(App\Contact::class, 150)
			->states('company')
			->create()
			->each(function (Contact $contact) {
				$contact->addresses()
					->saveMany(factory(App\Address::class, 4)
						->make(['contact_id' => $contact->id]));
				$contact->eAddresses()
					->saveMany(factory(App\ElectronicAddress::class, 4)
						->make(['contact_id' => $contact->id]));
				$contact->phones()
					->saveMany(factory(App\Phone::class, 4)
						->make(['contact_id' => $contact->id]));
			});
	}
}
