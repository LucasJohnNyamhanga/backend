<?php

namespace App\Models;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bodyPart extends Model
{
    use HasFactory;

    public function excercise(){
        return $this->hasMany(Exercise::class);
    }

    protected $table = 'bodyparts';
    protected $fillable = ['name'];
}
