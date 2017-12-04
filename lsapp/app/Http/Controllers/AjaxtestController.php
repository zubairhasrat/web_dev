<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ajaxtest;
class AjaxtestController extends Controller
{
    public function show_view(){
        return view('posts.test');
    }
    public function show(){
        $items = Ajaxtest::latest()->paginate(5);
        return response()->json($items);
    }
    public function store(Request $request){
       
      $create = Ajaxtest::create($request->all());
        // $create= Ajaxtest::create(request([
        //     'title' => request('title'),
        //     'body' => request('body')    
        // ]));
        return response()->json($create);
        
    }
}
