<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_steel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Type',
        'Price',   
        'MaterialName',
        'HighStrengthMaterial',
        'SteelBillet',
        'HotRolledSteelSheet',
        'ColdRolledSteelSheet',
        'ContinuousHotDipGalvanizing',
        'ContinuousPaint',
        'ColdForming',
        'Welding',
        'Processing',
        'AfterHotDipGalvanizing',
        'Galvalume',
        'MagnesiumAluminumZincPlating',
        'AfterBaking',
        'Speed',
        'StructuralRisk',
        'Corrosive',
        'Weight',
    ];
    public $timestamps = false;
}