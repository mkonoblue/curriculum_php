<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Posts;

class SnsController extends Controller
{

    public function add()
    {
        return view('home');
    }
/**
*つぶやきを投稿する
**/
  public function create(Request $request)
  {
    $posts = new posts;
    $form = $request->all();
    $id = auth()->id();

    $posts->fill($form);
    $posts->user_id=$id;
    $posts->save();

    return redirect('/home');
  }


/**
 *つぶやき一覧を表示する 
**/
  public function index()
  {
      //すべてのPostsを取得する
      $posts = Posts::all();
      
      return view('home', 
      [
        'posts' => $posts,
      ]);
  }
}
