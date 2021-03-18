<?php

namespace App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class strongspan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','Expert','BuildItem','Cost','StructuralRisk','JobDifficulty'
    ];
}
