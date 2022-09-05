<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;

class Creator extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function audioFiles(){
        return $this->hasMany(AudioFile::class);
    }

    public function listens(){
        return $this->hasManyThrough(Listen::class, AudioFile::class);
    }

    public function latest_release(){
        return $this->hasMany(AudioFile::class)->latest()->limit(7);
    }

   
}
