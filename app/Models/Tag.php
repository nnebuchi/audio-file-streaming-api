<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function audio_files()
    {
        return $this->morphedByMany(AudioFile::class, 'taggable');
    }
}
