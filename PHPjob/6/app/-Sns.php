<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sns extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'body' => 'required|strings|max:255',
    );
}
