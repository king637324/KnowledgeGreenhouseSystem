<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class knowledgeeditor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','parent_id', 'name', 'content', 'editor', 'created_at', 'updated_at',
    ];

    public $timestamps = true;

    // 確認是否有 子階層
    public function hasChildren()
    {
        return (boolean) knowledgeeditor::where('parent_id', $this->id)->first();
    }

    public function children($single = false)
    {
        return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor', 'parent_id', 'id')
                    ->select(['id','parent_id', 'name','content', 'editor','created_at'])
                    ->with('children');
    }

    public function parent()
    {
        return $this->hasOne('App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor', 'id', 'parent_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor','parent_id');
    }

}
