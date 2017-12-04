<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    //return page view
    public function index(){
        return view('index');
    }

//read posts from database
public function readItems(Request $req) {
    $posts = Post::latest()->paginate(5);
    //return view ( 'index' )->with('posts',$posts);
    return response()->json($posts);
}
//add posts to database
    public function addItem(Request $request) {
        $post = Post::create($request->all());
        return response()->json($post);
      
    }
//remove posts from database
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['done']);
    }
//edit post
    public function editPost(Request $req) {
        $post = Post::find ($req->id);
        $post->title = $req->title;
        $post->body = $req->body;
        $post->save();
        return response()->json($post);
      }
}
