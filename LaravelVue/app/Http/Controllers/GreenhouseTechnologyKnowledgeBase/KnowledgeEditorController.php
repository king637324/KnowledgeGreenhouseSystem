<?php

namespace App\Http\Controllers\GreenhouseTechnologyKnowledgeBase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseTechnologyKnowledgeBase\knowledgeeditor;
use DB;
use Validator, Redirect, Response;

class KnowledgeEditorController extends Controller
{
    // 將資料庫的Knowledge資料表  轉成JSON
    public function getJSON_Knowledge()
    {
        $Knowledge = knowledgeeditor::get();
        return $Knowledge;
    }

    /**
     * Display articles index.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories()
    {
        // $articles = knowledgeeditor::where('parent_id', 0)
        //             ->select(['category_id','parent_id', 'text','content', 'editor'])
        //             ->with('children')
        //             ->orderBy('category_id', 'ASC')
        //             ->get();

        $articles = knowledgeeditor::where('parent_id', 0)
                    ->select(['id','parent_id', 'text','content', 'editor'])
                    ->with('children')
                    ->orderBy('id', 'ASC')
                    ->get();



        return $articles;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
