<?php

namespace App\Models\GreenhouseMasterPlan\GeographicalEnvironmentAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class windspeedcontrol extends Model
{
    use HasFactory;

    protected $fillable = ['Series','Wind','SpeedMin','SpeedMax'];

    public $timestamps = false;
}
