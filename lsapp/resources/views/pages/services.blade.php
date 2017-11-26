@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($services) > 0)
     <ul class="list-group">
       @foreach($services as $ser)
            <li class="list-group-item">
                {{$ser}}
            </li>
       @endforeach
      </ul>
    @endif
@endsection