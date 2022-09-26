<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sns;

class SnsController extends Controller
{

    public function add()
    {
        return view('home');
    }
/**
*
**/
  public function create()
  {
    // $sns = new Sns;
    // $form = $request->all();
    // DDD($form);

    // $sns->fill($form);
    // $sns->save();
  }

}
