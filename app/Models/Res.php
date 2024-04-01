<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Res extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function collage(): BelongsTo
    {
        return $this->belongsTo(Collage::class);
    }
    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class);
    }


}
