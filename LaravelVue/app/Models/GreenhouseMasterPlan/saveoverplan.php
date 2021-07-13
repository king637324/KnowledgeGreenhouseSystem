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
        'plantclass',   
        'plant',
        'croplength',
        'cropwidth',
        'localcity',
        'localarea',
        'terrain',
        'landform',
        'greenhouse',
        'greenhousepipe',
        'domeforms',
        'circulararchdistances',
        'foundations',
        'spans',
        'shoulderheights',
        'lengths',
        'continuitys',
        'coatingfilms',
    ];

    
    public $timestamps = false;
}