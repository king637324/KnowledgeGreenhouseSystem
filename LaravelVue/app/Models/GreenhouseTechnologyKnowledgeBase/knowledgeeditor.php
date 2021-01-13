<?php

namespace App\Models\GreenhouseTechnologyKnowledgeBase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class knowledgeeditor extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'category_id','parent_id', 'text', 'content', 'editor', 'created_at', 'updated_at',
    // ];

    // public $timestamps = true;

    // // 確認是否有 子階層
    // public function hasChildren()
    // {
    //     return (boolean) knowledgeeditor::where('parent_id', $this->id)->first();
    // }

    // public function children($single = false)
    // {
    //     // return $this->hasMany('App\KnowledgeEditor\knowledgeeditor', 'parent_id')
    //     //     ->select(['category_id','parent_id', 'text'])
    //     //     ->with('children')
    //     //     ->orderBy('text', 'ASC');

    //     // return $this->hasMany('App\KnowledgeEditor\knowledgeeditor', 'category_id', 'parent_id')
    //     //             ->select(['category_id','parent_id', 'text'])
    //     //             ->with('children');

    //     return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor', 'parent_id', 'category_id')
    //                 ->select(['category_id','parent_id', 'text','content', 'editor'])
    //                 ->with('children');
    // }

    // public function parent()
    // {
    //     return $this->hasOne('App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor', 'category_id', 'parent_id');
    // }

    // public function comments()
    // {
    //     return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor','parent_id');
    // }

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
        // return $this->hasMany('App\KnowledgeEditor\knowledgeeditor', 'parent_id')
        //     ->select(['id','parent_id', 'name'])
        //     ->with('children')
        //     ->orderBy('name', 'ASC');

        // return $this->hasMany('App\KnowledgeEditor\knowledgeeditor', 'id', 'parent_id')
        //             ->select(['id','parent_id', 'name'])
        //             ->with('children');

        return $this->hasMany('App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor', 'parent_id', 'id')
                    ->select(['id','parent_id', 'name','content', 'editor'])
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
