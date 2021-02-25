<?php

use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$jenis = ['kiloan','selimut','bed_cover','kaos','lain'];
    	$namaPaket = ['express 6 jam', '12 jam', '1 hari'];
    	for ($i = 0; $i < count($jenis); $i++) {
    		for ($a = 0; $a < count($namaPaket) ; $a++) {
	    		Paket::create([
	    			'outlet_id' => 1,
					'jenis' => $jenis[$i],
					'nama_paket' => $namaPaket[$a],
					'biaya' => 700 * rand(1,10),
	    		]);
	    	}
    	}
    }
}
