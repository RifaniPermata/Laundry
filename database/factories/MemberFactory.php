<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
	$jk = ['L','P','L','P'];
    return [
        'nama' => $faker->name,
		'alamat' => $faker->address,
		'jenis_kelamin' => $jk[array_rand($jk)],
		'tlp' => $faker->phoneNumber,
    ];
});
