<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wind_corrosion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','land','landtype','wind','corrosion','foundation',
    ];

    public $timestamps = false;



}
