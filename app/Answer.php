<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cpa;
use App\Question;

class Answer extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'body' => 'required',
        );
    
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
    
     public function cpa()
    {
        return $this->belongsTo('App\Cpa');
    }
}
