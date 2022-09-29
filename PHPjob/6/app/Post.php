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


    // // public function getName()
    // {
    //     // return $this->user->name;
    // }
}