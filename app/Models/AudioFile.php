<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioFile extends Model
{
    use HasFactory;

    public function creator(){
        return $this->belongsTo(Creator::class);
    }

    public function listens() {
        return $this->hasMany(Listen::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
