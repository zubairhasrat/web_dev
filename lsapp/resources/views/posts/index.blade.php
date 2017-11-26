@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
       
        @foreach($posts as $post)
         <div class='wel'>
            <div class='row'>
                <div class='col-sm-4 col-md-4'>
                    <img style="width:100%" src='storage/cover_images/{{$post->cover_image}}' >
                </div> 
                <div class='col-sm-8 col-md-8'>
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
            </div>
           
         </div>
        @endforeach
     {{$posts->links()}}
    @else
        <p>no posts</p>
    @endif

@endsection