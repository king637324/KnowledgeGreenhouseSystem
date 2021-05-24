<?php

namespace App\Models\GreenhouseMasterPlan\GeographicalEnvironmentAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regionalwindspeed extends Model
{
    use HasFactory;

    protected $fillable = ['County','Region','SpeedPerSecond'];

    public $timestamps = false;
}
