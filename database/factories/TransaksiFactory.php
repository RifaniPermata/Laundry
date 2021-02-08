<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaksi;
use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
	
	$bayar = ['dibayar','belum_dibayar'];
	$status = ['baru','proses','selesai','diambil'];
    return [
    	'outlet_id' => 1,
    	'member_id' => 1,
    	'user_id' => 1,
        'kode_invoice' => 'KODE/INCOVIE',
		'tgl' => now(),
		'batas_waktu' => now(),
		'tgl_bayar' => now(),
		'biaya_tambahan' => 0,
		'diskon' => 0,
		'pajak' => 0,
		'status' => $status[array_rand($status)],
		'dibayar' => $bayar[array_rand($bayar)],
    ];
});
