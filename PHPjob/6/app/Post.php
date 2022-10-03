<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ('id');
    protected $fillable = ['body'];

    // Userモデルに関連付けを行う
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //バリデーションルール
    public static $rules = array(
        'body' => 'required|string|max:255',
    );
}