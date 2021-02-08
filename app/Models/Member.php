<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
    	'nama', 'alamat','jenis_kelamin', 'tlp'
    ];

    public function transaksis()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
}
