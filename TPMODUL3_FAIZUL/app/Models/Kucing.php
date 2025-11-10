<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kucing extends Model
{
    protected $fillable = [
    'nama_kucing',
    'ras',
    'warna_bulu',
    'usia',
    'deskripsi',
    ];
}
