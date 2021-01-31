<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'pakets';
    protected $fillable = [
    	'outlet_id', 'jenis', 'nama_paket'
    ];
}