<?php

namespace App\Models\GreenhouseMasterPlan\GeographicalEnvironmentAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regionalwindspeed extends Model
{
    use HasFactory;

    protected $fillable = ['PostalCode', 'County', 'Region', 'SpeedPerSecond', 'WindLandingId', 'WindPathId', 'monthHighTemperature', 'monthLowTemperature', 'monthSunShine', 'monthGloblRad', 'weatherlink'];

    public $timestamps = false;
}
