<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
	use SoftDeletes;
	
    protected $table = 'pakets';
    protected $fillable = [
    	'outlet_id', 'jenis', 'nama_paket', 'keterangan'
    ];

    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet');
    }
}
