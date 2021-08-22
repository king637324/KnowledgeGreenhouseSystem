<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class greenhousetype extends Model
{
    use HasFactory;

    protected $fillable = ['GreenhouseType','Icon'];

    public $timestamps = false;
}
