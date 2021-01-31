<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlets';
    protected $fillable = [
    	'nama','alamat','tlp'
    ];
}
