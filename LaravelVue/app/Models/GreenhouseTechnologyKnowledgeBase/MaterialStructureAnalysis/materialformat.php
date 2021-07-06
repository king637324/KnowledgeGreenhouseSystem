<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materialformat extends Model
{
    use HasFactory;

    protected $fillable = ['Materialid','MaterialType','length','width','foot','diameter','NominalSize','DiameterSize','height','breadth','thickness','Cross-sectionalArea','UnitWeight','Material','SectionModulus','MomentOfInertia','SurfaceMomentOfInertia','YieldStrength','TensileStrength','MaximumStress','MaximumVariable','MaximumStressMap','MaximumVariableGraph'];

    public $timestamps = false;

    // // 關聯模型 1對1
    // // ('需要關聯模型的名稱','被關聯模型的欄位','本模型中要關聯的欄位')
    // public function Materialid(){
    //                                                     // materialtypes的Materialid，materialformats的Materialid
    //     return $this->hasOne('App\MaterialsAnalysis\materialtypes','Materialid','Materialid');
    // }

    public function Material_id(){
        // materialformats的Materialid，materialtypes的Materialid
        return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis\materialtype','Materialid','Materialid');
    }
}
