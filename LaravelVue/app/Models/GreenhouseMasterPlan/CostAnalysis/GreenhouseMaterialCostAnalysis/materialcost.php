<?php

namespace App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseMaterialCostAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materialcost extends Model
{
    use HasFactory;
    protected $fillable = ['id','Type','MaterialName','High-strengthMaterial','SteelBillet','HotRolledSteelSheet','ColdRolledSteelSheet','ContinuousHotDipGalvanizing','ContinuousPaint','ColdForming','Welding','Processing','AfterHotDipGalvanizing','Galvalume','MagnesiumAluminumZincPlating','AfterBaking','Speed','StructuralRisk','Corrosive','Weight'];
}
