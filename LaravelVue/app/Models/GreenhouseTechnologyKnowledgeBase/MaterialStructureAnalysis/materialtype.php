<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materialtype extends Model
{
    use HasFactory;

    protected $fillable = ['Materialid','Materialtype','shape'];

    public $timestamps = false;

    // // 關聯模型 1對多
    // // ('需要關聯模型的名稱','被關聯模型的欄位','本模型中要關聯的欄位')
    // public function Materialid(){
    //     // materialformats的Materialid，materialtypes的Materialid
    //     return $this->hasMany('App\MaterialsAnalysis\materialformat','Materialid','Materialid');
    // }
}
