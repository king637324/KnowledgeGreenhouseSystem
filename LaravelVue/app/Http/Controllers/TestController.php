<?php

namespace App\Http\Controllers;

use App\Models\Test\test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = test::paginate();
        return response()->json($category,200);
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
        // 設定必填欄位 & 必填欄位的的條件
        $request -> validate([
            'name' => 'required|min:3',
            'mail' => 'required',
            'password' => 'required|min:8',
            'abc' => 'required',
            'image'  => 'required|image|mimes:jped,png,jpg'
        ]);

        $category = new test();
        $category->name = $request->name;
        $category->mail = $request->mail;
        $category->password = $request->password;
        $category->abc = $request->abc;

        $path = $request->file('image')->store('test_image');

        $category->image = $path;

        if($category->save()){
            return response()->json($category,200);
        }else{
            return response()->json($category,500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(test $test)
    {
        //
    }
}
