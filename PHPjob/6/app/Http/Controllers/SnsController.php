<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
// use App\User;

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
    $post = new post;
    $form = $request->all();
    $id = auth()->id();

    $post->fill($form);
    $post->user_id=$id;
    $post->save();

    return redirect('/home');
  }


/**
 *つぶやき一覧を表示する 
**/
  public function index()
  {
      //すべてのPostsテーブルを降順で取得する
      $posts = Post::all()->sortByDesc("created_at");
      // $users = User::all();
      
      return view('home', 
      [
        'posts' => $posts,
        // 'users' => $users,
      ]);
  }



}
