<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    //
    protected $guarded = ('id');
    protected $fillable = ['body'];

    // Userモデルに関連付けを行う
    public function posts()
    {
        return $this->belongsTo('App\User');
    }
    
}
