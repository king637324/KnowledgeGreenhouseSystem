<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weight_estimation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'roof_type',
        'roof_number',   
        'wind_design',
        'span_design',
        'shoulder_design',
        'continue_design',
    ];
    public $timestamps = false;
}