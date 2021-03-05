<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vegetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'classification','VegetableTypes','Goodlight','Photoperiod','Illuminance','PPFD','LightSaturationPoint','LightCompensationPoint','Temperatureadaptability','LowestGrowthTemperature','OptimalGrowthTemperature','HighestGrowthTemperature','LowestGerminationTemperature','OptimumGerminationTemperature','HighestGerminationTemperature','CO2IncreasedProductionRate','Expert',
    ];

    public $timestamps = false;



}
