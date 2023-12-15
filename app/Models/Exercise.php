<?php

namespace App\Models;

use App\Models\BodyPart;
use App\Models\Instruction;
use App\Models\SecondaryMuscle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exercise extends Model
{
    use HasFactory;

    public function bodyPart(){
        return $this->belongsTo(BodyPart::class);
    }
    
    
    protected $table = 'exercises';
    protected $fillable = ['bodypartId','equipment','gifUrl','name','target','instruction','secondaryMuscles'];

    protected function instruction(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    protected function secondaryMuscles(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
    

}
