<?php

use App\Contact;
use Faker\Generator as Faker;

$factory->define(App\Phone::class, function (Faker $faker) {
	return [
		'type' => $faker->unique()->safeEmail,
		'is_main' => $faker->boolean(),
		'country' => $faker->country,
		'number' => $faker->numerify('########'),
		'extension' => $faker->countryCode,
		'notes' => $faker->text()
	];
});

$factory->state(App\Phone::class, 'contact', function (Faker $faker) {
	return [
		'contact_id' => factory(Contact::class)->create()->id,
	];
});
