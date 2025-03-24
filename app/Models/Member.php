<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'tanggal_lahir',
        'golongan_darah',
        'horoskop',
        'tinggi_badan',
        'nama_panggilan',
        'foto',
    ];
}
