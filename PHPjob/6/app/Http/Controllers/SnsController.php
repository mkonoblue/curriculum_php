<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
    $this->validate($request, Post::$rules);

    $post = new post;
    $form = $request->all();
    $id = auth()->id();

    $post->fill($form);
    $post->user_id=$id;
    $post->save();

    return redirect('home');
  }

/**
*つぶやき一覧を表示する 
**/
  public function index()
  {
      //すべてのPostsテーブルを降順で取得する
      $posts = Post::all()->sortByDesc("created_at");
      
      return view('home', 
      [
        'posts' => $posts,
      ]);
  }

/**
*つぶやきを削除する 
**/
  public function delete(Request $request)
  {
      //該当するPostモデルを取得
      $post_del = Post::find($request->id);
      //削除する
      $post_del->delete();

      return redirect('home');
  }

}
