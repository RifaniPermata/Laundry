<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paket;
use Faker\Generator as Faker;

$factory->define(Paket::class, function (Faker $faker) {
	$jenis = ['kiloan','selimut','bed_cover','kaos','lain'];
    $namaPaket = ['Baju Sekolah', 'Baju Musli','Karpet','Jas Merah'];
    return [
        'outlet_id' => 1,
		'jenis' => $jenis[array_rand($jenis)],
		'nama_paket' => $namaPaket[array_rand($namaPaket)],
    ];
});
