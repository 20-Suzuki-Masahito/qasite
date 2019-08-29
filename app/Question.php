<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Question extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'field' => 'required',
        'title' => 'required',
        'body' => 'required',
        );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
     public function answers()
    {
      return $this->hasMany('App\Answer');

    }
}
