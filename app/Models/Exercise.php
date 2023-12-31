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

    public function inst(){
        return $this->hasMany(Instruction::class);
    }

    public function muscle(){
        return $this->hasMany(SecondaryMuscle::class);
    }
    
    
    protected $table = 'exercises';
    protected $fillable = ['bodypart_id','equipment','gifUrl','name'];

    // protected function instruction(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // }

    // protected function secondaryMuscles(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // }
    

}
