<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        if($posts){
            return response()->json([
                "posts"=>$posts
            ]);
        }else{
            return response()->json([
                "message"=>"Nothing to show"
            ]);
        }
        //return response()->json($posts);
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
        $post = new Post();
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $result = $post->save();
        if($result){
            return response()->json([
                "message"=>"Successfully Data Saved"
            ]);
        }else{
            return response()->json([
                "message"=>"Failed to save"
            ]);
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
        $post = Post::findOrFail($id);
        return response()->json($post);
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
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $result = $post->save();
        if($result){
            return response()->json([
                "message"=>"Successfully Data Updated"
            ]);
        }else{
            return response()->json([
                "message"=>"Failed to update"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $result = $post->delete();
        if($result){
            return response()->json([
                "message"=>"Successfully Deleted"
            ]);
        }else{
            return response()->json([
                "message"=>"Failed to delete"
            ]);
        }
    }
}
