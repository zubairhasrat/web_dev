<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .navbar{
            border-radius: 0;
        }
    </style>
  
</head>
<body>
    <div id="app">
    
        @include('inc.navbar')
            <div class='container'>
                @include('inc.message')
                @yield('content')
            </div>
    </div>

    <!-- Scripts -->
    
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>

    <script src="{{ asset('/js/app.js') }}"></script>
    {{--  <script src="{{asset('js/jquery.min.js')}}"></script>  --}}
    <script src="{{ '/js/ajaxtest.js' }}"></script>
    
     <script type="text/javascript">
    	   var url = "<?php echo route('posts.index')?>";
        </script>
    <script>
   <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js">
   
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
