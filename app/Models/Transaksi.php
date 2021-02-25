<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use SoftDeletes;
    
    protected $table = 'transaksis';
    protected $fillable = [
    	'outlet_id', 'kode_invoice', 'member_id', 'paket_id', 'tgl', 'batas_waktu', 'tgl_bayar', 'biaya_tambahan', 'diskon', 'pajak', 'status', 'total', 'dibayar', 'user_id'
    ];

    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
