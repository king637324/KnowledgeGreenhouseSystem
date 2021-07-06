<?php

namespace App\Http\Controllers;

use App\Models\Test\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            return response()->json([
                'message' => '!!創建(store)發生錯誤!!',
                'status_code' => 500
            ],500);
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
        $request -> validate([
            'name' => 'required|min:3',
            'mail' => 'required',
            'password' => 'required|min:8',
            'abc' => 'required',
            'image'=>'required',
        ]);

        $data = $request->only(['name','mail','password','abc','image']);
        $testdata = test::where('name',$data['name']);
        $deleteImage = test::where('name',$data['name'])->get();
        $oldPath = $deleteImage[0]->image;

        if($request->hasFile('image')){
            $request -> validate([
                'image'  => 'image|mimes:jped,png,jpg',
            ]);

            $path = $request->file('image')->store('test_image');
            $testdata->image = $path;
            $data['image'] = $path;

            // 刪除圖片用
            Storage::delete($oldPath);

        }



        if($testdata->update($data)){

            return response()->json($data,200);
        }else{
            Storage::delete($data['image']);
            return response()->json([
                'message' => '!!更新(update)發生錯誤!!',
                'status_code' => 500
            ],500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        $test = test::where('name',$name)->get();
        $deleteTestData = test::where('name',$name);

        // 刪除圖片用
        Storage::delete($test[0]->image);

        if($deleteTestData->delete()){
            return response()->json([
                'message' => '刪除已完成!!',
                'status_code' => 200
            ],200);
        }else{
            return response()->json([
                'message' => '!!刪除發生錯誤!!',
                'status_code' => 500
            ],500);
        }

    }
}
