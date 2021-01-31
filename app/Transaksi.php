<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $fillable = [
    	'outlet_id', 'kode_invoice', 'member_id', 'tgl', 'batas_waktu', 'tgl_bayar', 'biaya_tambahan', 'diskon', 'pajak', 'status', 'dibayar', 'user_id'
    ];
}
