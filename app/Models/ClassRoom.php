<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
      'class_name','class_number','class_location'
    ];


    public function res(): HasMany
    {
        return $this->hasMany(Res::class);
    }

}
