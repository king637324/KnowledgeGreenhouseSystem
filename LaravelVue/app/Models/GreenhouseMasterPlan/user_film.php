<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_film extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Expert',
        'material',   
        'BuildItem',
        'LightLoss',
        'StructuralRisk',
        'JobDifficulty',
        'Cost',
        'SideEffect',
    ];
    public $timestamps = false;
}