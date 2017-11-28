<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function index(){
       
        $tasks = \App\Task::orderBy('created_at', 'asc')->get();
        
            return view('tasks', ['tasks' => $tasks]);
    }
   
}
