@extends('layouts.app')
@section('content')
    <h1>Posts</h1>
     
<div class='row'>
    
  
    <div class='col-sm-6'>
    <form action="ajaxtest" method="GET" id='create_form'>
    
    <div class='form-group'>
     <input type='text' name='title' id='addtxt' placeholder='enter title' class='form-control'>
    </div>
    <div class='form-group'>
     <input type='text' name='body' id='addbody' placeholder='enter body' class='form-control'>
    </div>
    <div>
     {{--  <input type='submit' name='submitbtn' class='form-control btn btn-primary' value='Add data'>  --}}
     <button type ='submit' id='subbtn' class='form-control btn btn-primary'>Add Data</submit>
    </div>
     </form>
    </div>
    <div class='col-sm-6'>
    <table id="my-containing-data" class='table'>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Body</th>
    </tr>
</table>
    </div>
    <div>


		

@endsection