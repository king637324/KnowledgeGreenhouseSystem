<?php

namespace App\Models\GreenhouseMasterPlan\GeographicalEnvironmentAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class windlandingandpath extends Model
{
    use HasFactory;

    protected $fillable = ['analysis','item_Id','frequency','percentage'];

}
