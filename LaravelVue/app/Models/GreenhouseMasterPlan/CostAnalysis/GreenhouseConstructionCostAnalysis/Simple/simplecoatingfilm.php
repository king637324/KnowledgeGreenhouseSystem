<?php

namespace App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class simplecoatingfilm extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','Expert','BuildItem','LightLoss','StructuralRisk','JobDifficulty','Cost','SideEffect'
    ];
    public $timestamps = false;
}
