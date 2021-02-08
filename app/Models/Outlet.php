<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlets';
    protected $fillable = [
    	'nama','alamat','tlp'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function pakets()
    {
        return $this->hasMany('App\Models\Paket');
    }

    public function transaksis()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
}
