<?php

use App\Contact;
use Faker\Generator as Faker;

$factory->define(App\ElectronicAddress::class, function (Faker $faker) {
	return [
		'type' => $faker->randomElement(['website', 'email']),
		'is_main' => $faker->boolean(),
		'value' => function (array $address) use ($faker) {
			if ($address['type'] === 'email') {
				return $faker->email;
			}
			return $faker->url;
		},
		'notes' => $faker->text()
	];
});

$factory->state(App\ElectronicAddress::class, 'contact', function (Faker $faker) {
	return [
		'contact_id' => factory(Contact::class)->create()->id,
	];
});