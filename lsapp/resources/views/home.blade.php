@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href='/posts/create' class='btn btn-primary' id='cr_btn'>Create Post</a>
                   <h3>Your Blog Post</h3>
                    @if(count($posts)>0)
                   <table class="table table-striped">
                        <tr>
                            <td>Title</td>
                            <td></td>
                            <td></td>
                        </tr>
                       
                        @foreach($posts as $post)
                            <tr>
                            <td>{{$post->title}}</td>

                            <td><a href='posts/{{$post->id}}/edit' class='btn btn-default' id='edit_post'>Edit</a></td>
                            <td>
                                {!!Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>'pull-right' ,'id'=>'delete_post'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                      
                        
                   </table>
                    @else
                    <p>You have't made any post yet</p>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
