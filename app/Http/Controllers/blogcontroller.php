<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use App\Models\Blog;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class blogcontroller extends BaseController
{
    public function index()
    {
        return Blog::all();
    }

    public function getid(Request $request,$id){
        $result = DB::select("SELECT * FROM blog WHERE id = $id");
        if(empty($result)){
            return response()->json(['message'=> 'Blog Not Found'], 404);
        }
        else{
        return $result;
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'konten' => 'required',
            'author' => 'required'
        ]);

        $blog = Blog::create(
            $request->only(['title','konten','author'])
        );

        return response()->json([
            'created' => true,
            'data' => $blog
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return response()->json([
                'message' => 'blog not found'
            ], 404);
        }

        $blog->fill(
            $request->only(['title','konten','author'])
        );

        $blog->save();

        return response()->json([
            'updated' => true,
            'data' => $blog
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'blog not found'
                ]
                ],404);
        }

        $blog->delete();

        return response()->json([
            'deleted' => true
        ],200);
    }

        
}