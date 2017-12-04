@extends('layouts.app')
@section('content')
    <h1>Create Posts</h1>
    
    {!! Form::open(['action'=>'PostController@store','method'=>'POST','enctype'=>'multipart/form-data','id'=>'create_form']) !!}
        <div class= 'form-group'>
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'title'])}}
            {{Form::label('body','Body')}}
            {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'body text'])}}
        </div>
        <div class= 'form-group'>
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary', 'id'=>'create_btn'])}}
        
    {!! Form::close() !!}
    
@endsection