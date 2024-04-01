<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;


    protected $guarded=[];

    public function collage(){
        return $this->belongsTo(Collage::class);
    }


    public function res()
    {
        return $this->hasMany(Res::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }



}
