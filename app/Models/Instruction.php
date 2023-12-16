<?php

namespace App\Models;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instruction extends Model
{
    use HasFactory;

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }

    protected $table = 'instructions';
    protected $fillable = ['name'];
}
