<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'setlist_id', 'duration', 'track_number', 'artist', 'notes'];

    public function setlist()
    {
        return $this->belongsTo(Setlist::class);
    }
}

