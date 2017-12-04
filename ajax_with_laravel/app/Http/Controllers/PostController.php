<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){
        return view('index');
    }


public function readItems(Request $req) {
    $posts = Post::latest()->paginate(5);
    //return view ( 'index' )->with('posts',$posts);
    return response()->json($posts);
}

    public function addItem(Request $request) {
        $post = Post::create($request->all());
        return response()->json($post);
      
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['done']);
    }

    public function editPost(Request $req) {
        $post = Post::find ($req->id);
        $post->title = $req->title;
        $post->body = $req->body;
        $post->save();
        return response()->json($post);
      }
}
