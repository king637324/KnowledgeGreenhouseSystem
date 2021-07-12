<?php

namespace App\Models\GreenhouseMasterPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usdollar extends Model
{
    use HasFactory;

    protected $fillable = ['id','USD'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
