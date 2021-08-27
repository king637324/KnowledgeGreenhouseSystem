<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_light extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ControlItem',
        'ControlSystem',   
        'QualityControl',
        'StructuralRisk',
        'JobDifficulty',
        'Cost',
        'SideEffect',
    ];
    public $timestamps = false;
}