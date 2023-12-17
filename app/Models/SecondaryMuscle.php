<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryMuscle extends Model
{
    use HasFactory;

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }

    protected $table = 'secondaryMuscle';
    protected $fillable = ['name','exercise_id'];
}
