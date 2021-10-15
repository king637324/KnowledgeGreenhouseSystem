<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class greenhouseresult extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'uid',   
        'baseid',
        'lightid',
        'lightvalue',
        'tempid',
        'tempvalue',
        'windid',
        'filmid',
        'steelid',
        'greenhouseid',
        'weightid',
    ];
    public $timestamps = false;
}