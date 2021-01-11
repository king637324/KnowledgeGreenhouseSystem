<?php

namespace App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseMaterialCostAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materialcostanalysi extends Model
{
    use HasFactory;
    protected $fillable = ['id','Type','MaterialName','Steel','High-strengthMaterial','SteelBillet','HotRolledSteelSheet','ColdRolledSteelSheet','ContinuousHotDipGalvanizing','ContinuousPaint','ColdForming','Welding','Processing','AfterHotDipGalvanizing','Galvalume','MagnesiumAluminumZincPlating','AfterBaking','Cost','Speed','StructuralRisk','Corrosive','Weight'];
}
