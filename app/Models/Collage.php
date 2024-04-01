<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    use HasFactory;

    protected $guarded=[];




    public function teacher(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function res(): HasMany
    {
        return $this->hasMany(Res::class);
    }

}
