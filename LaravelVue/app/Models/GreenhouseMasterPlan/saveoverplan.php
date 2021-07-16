<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saveoverplan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pid',
        'uid',
        'userclass',   
        'usercodename',
        'palntclass',
        'cropplant',
        'localcity',
        'localarea',
        'terrain',
        'landform',
        'landcondition',
        'croplength',
        'cropwidth',
        'croparea',
        'position',
        'quality',
        'risk',
        'speed',
        'cost'
    ];
}