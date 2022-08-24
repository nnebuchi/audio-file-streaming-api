<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listen extends Model
{
    use HasFactory;

    public function audioFiles(){
        return $this->belongsTo(AudioFile::class);
    }

   
}
