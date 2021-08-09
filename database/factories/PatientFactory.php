<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
namespace Database\Factories;
use App\Models\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone_number'=> $faker->phoneNumber, 
        'country' => $faker->country, 
        'gender' => 'Male',
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
