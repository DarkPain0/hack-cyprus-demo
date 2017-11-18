<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
		'surname' => $faker->lastName,
		'is_company' => 0,
		'company_name' => null,
		'gender' => $faker->randomElement(['male', 'female', 'neutral']),
		'birth' => $faker->date('Y-m-d', '-18 years'),
		'occupation' => $faker->randomElement(['Programmer', 'SuperHero', 'Web Developer', 'Designer', 'DB Analyst', 'Project Manager', 'Mobile Developer']),
		'notes' => $faker->text()
	];
});

$factory->state(App\Contact::class, 'company', function (Faker $faker) {
	return [
		'name' => null,
		'surname' => null,
		'is_company' => 1,
		'company_name' => $faker->company
	];
});