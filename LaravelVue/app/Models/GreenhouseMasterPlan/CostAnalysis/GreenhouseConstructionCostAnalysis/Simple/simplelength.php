<?php

namespace App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class simplelength extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','Expert','BuildItem','Cost','StructuralRisk','JobDifficulty'
    ];
}
