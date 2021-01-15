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

        $articles = knowledgeeditor::where('parent_id', 0)
                    ->select(['id','parent_id', 'name','content', 'editor'])
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
    public function store(Request $request)  // 創建新資料用
    {
        // 設定必填欄位 & 必填欄位的的條件
        $request -> validate([
            'parent_id' => 'required',
            'name' => 'required',
            'editor' => 'required',
            'content' => 'required',
        ]);

        $creatData = new knowledgeeditor();
        $creatData->parent_id = $request->parent_id;
        $creatData->name = $request->name;
        $creatData->editor = $request->editor;
        $creatData->content = $request->content;


        if($creatData->save()){
            return response()->json($creatData,200);
        }else{
            return response()->json([
                'message' => '!!創建知識發生錯誤!!(Controller的store有問題)',
                'status_code' => 505
            ],505);
        }
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
    public function update(Request $request, $id)   // 更新資料
    {

        $request -> validate([
            'parent_id' => 'required',
            'name' => 'required',
            'editor' => 'required',
            'content' => 'required',
        ]);

        $data = $request->only(['parent_id','name','editor','content']);
        $knowledgedata = knowledgeeditor::where('id',$id);

        if($knowledgedata->update($data)){

            return response()->json($data,200);
        }else{
            return response()->json([
                'message' => '!!更新(update)發生錯誤!!',
                'status_code' => 500
            ],500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // 刪除資料用
    {
        if((boolean) knowledgeeditor::where('parent_id', $id)->first()){
            return response()->json([
                'message' => '!!刪除發生錯誤!!無法刪除，因該項目還有子項目',
                'status_code' => 500
            ],500);
        }else{
            DB::table('knowledgeeditors')->where('id',$id)->delete();
            return response()->json([
                'message' => '刪除已完成!!',
                'status_code' => 200
            ],200);
        }
    }
}
