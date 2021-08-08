<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class greenhouseformat extends Model
{
    use HasFactory;

    protected $fillable = ['GreenhouseId','GreenhouseType','width','ColumnHeight','ChordHeight','Donggao','Bevel','ShoulderHeight','Span'];

    public $timestamps = false;

    // // 關聯模型 1對1
    // // ('需要關聯模型的名稱','被關聯模型的欄位','本模型中要關聯的欄位')
    // public function Materialid(){
    //                                                     // materialtypes的Materialid，materialformats的Materialid
    //     return $this->hasOne('App\MaterialsAnalysis\materialtypes','Materialid','Materialid');
    // }

    public function Greenhouse_Type(){
        // greenhouseformat的Materialid，greenhousetype的Materialid
        return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis\greenhousetype','GreenhouseType','GreenhouseType');
    }

    public function Greenhouse_id(){
        // greenhouseformat的Materialid，fluidanalysisresults的Materialid
        return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis\fluidanalysisresult','GreenhouseId','GreenhouseId');
    }
}
