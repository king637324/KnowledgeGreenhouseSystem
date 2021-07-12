<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fluidanalysisresult extends Model
{
    use HasFactory;

    protected $fillable = ['GreenhouseId','WindDirection','WindSpeed','AverageWindPressure_a','AverageWindPressure_b','AverageWindPressure_c','AverageWindPressure_d','AverageWindPressure_e','AverageWindPressure_f','AverageWindPressure_g','AverageWindPressure_h','MaxWindSpeed','WindPressureChart_1','WindPressureChart_2','WindPressureChart_3','WindPressureChart_4','WindFieldMap'];

    public $timestamps = false;
}
