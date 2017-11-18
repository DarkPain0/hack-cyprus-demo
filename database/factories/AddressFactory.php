<?php

use App\Contact;
use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
	return [
		'type' => $faker->randomElement(['home', 'work']),
		'is_main' => $faker->boolean(),
		'street' => $faker->streetName,
		'number' => $faker->randomNumber(),
		'building' => $faker->buildingNumber,
		'floor' => random_int(1, 15),
		'apartment' => $faker->numerify('###'),
		'postal_code' => $faker->postcode,
		'city' => $faker->city,
		'district' => $faker->city,
		'country' => $faker->country,
		'notes' => $faker->text()

	];
});
$factory->state(App\Address::class, 'contact', function (Faker $faker) {
	return [
		'contact_id' => factory(Contact::class)->create()->id,
	];
});