<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setlist extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'artist', 'production_year','image'];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
