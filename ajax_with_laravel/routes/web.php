<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PostController@index');
Route::post('/addItem','PostController@addItem');
Route::delete('delete/{id}','PostController@destroy');
Route::put('editPost/{id}','PostController@editPost');
Route::get('posts','PostController@readItems');
