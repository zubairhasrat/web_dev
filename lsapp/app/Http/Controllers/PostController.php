<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\post;
use App\User;
use App\Http\Requests\PostRequest;
use DB;
class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show','ajax']]);
    }

    public function manageItemAjax()
    {
        return view('posts.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts= Post::all();
        //return Post::where('title','post two');
        //$posts=DB::select('select * from posts');
       // $posts= Post::orderBy('created_at','desc')->paginate(1);
        //$posts= Post::orderBy('title','desc')->take(1)->get();
       // 
        $posts = Post::latest()->paginate(5);
       // 
        //return view('posts.index')->with('posts',$posts)->render();;
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }
     
    public function testajax(){
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        //$this->validate($request->all());
        //handle file upload
        if($request->hasFile('cover_image')){
            //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //extension name
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store image
            $extension = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noImage.jpg';
        }

       
            // $post = new Post;
            // $post->title = $request->input('title');
            // $post->body = $request->input('body');
            // $post->user_id=auth()->user()->id;
            // $post->cover_image=$fileNameToStore;
            
            $create=  Post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->input('title'),
                'body' =>  $request->input('body'),
                'cover_image' =>$fileNameToStore
            ]);
            return response()->json($create);
           
            
            //return redirect('/posts')->with('success','post created');
            
          
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        
        if(auth()->user()->id !== $post->user_id){

            return redirect('/posts')->with('error','Unauthorized page');
        }
        
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        
       // $this->validate($request->all());

        if($request->hasFile('cover_image')){
            //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //extension name
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //store image
            $extension = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }

            $post =  Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            if($request->hasFile('cover_image')){
                $post->cover_image=$fileNameToStore; 
            }
            $post->save();
            return redirect('/posts')->with('success','post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            
                        return redirect('/posts')->with('error','Unothorized page');
                    }
        if($post->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
      // return redirect('/posts')->with('success','post removed');
    }
}
