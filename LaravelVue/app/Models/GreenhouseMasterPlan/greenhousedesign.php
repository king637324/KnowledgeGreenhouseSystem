<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class greenhousedesign extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'housetype',
        'pipetype',   
        'rooftype',
        'circlespan',
        'base',
        'span',
        'shoulder',
        'length',
        'continue',
        'drape',
    ];
    public $timestamps = false;
}