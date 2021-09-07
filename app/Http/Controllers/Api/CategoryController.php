<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        if($cats){
            return response()->json([
                "cats"=>$cats
            ],200);
        }else{
            return response()->json([
                "message"=>"Nothing to show"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Category();
        $cat->name = $request->name;
        $result = $cat->save();
        if($result){
            return response()->json([
                "message"=>"Successfully Data Saved"
            ],201);
        }else{
            return response()->json([
                "message"=>"Failed to save"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $cat = Category::findOrFail($category->id);
        return response()->json($cat); //200
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $cat = Category::findOrFail($category->id);
        $cat->name = $request->name;
        $result = $cat->save();
        if($result){
            return response()->json([
                "message"=>"Successfully Data udpated"
            ],200);
        }else{
            return response()->json([
                "message"=>"Failed to update"
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $cat = Category::findOrFail($category);
        $result = $cat->delete();
        if($result){
            return response()->json([
                "message"=>"Successfully Deleted"
            ],202);
        }else{
            return response()->json([
                "message"=>"Failed to delete"
            ],404);
        }
    }
}
