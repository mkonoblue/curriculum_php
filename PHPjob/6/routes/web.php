<?php

// use App\Post;

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



// Route::get('/{id}/address', function($id){
//     $post=Post::find($id);
//     return "アドレス番号".$id."のユーザーの名前は".$post->user->name."さんです。";
// });


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('home', 'SnsController@add')->middleware('auth');

Route::post('home', 'SnsController@create')->middleware('auth');

Route::get('home', 'SnsController@index')->middleware('auth');

Route::get('home/delete', 'SnsController@delete')->middleware('auth');
