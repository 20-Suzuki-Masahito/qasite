<?php

namespace App\Http\Controllers\Cpa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Cpa;
use App\Question;
use App\Answer;

class AnswerController extends Controller
{
    public function add(Request $request)
    {
        $question = Question::find($request->id);
        return view('cpa.answer.create',["question" => $question]);
    }
    
    public function create(Request $request)
    {
        
        $this->validate($request, Answer::$rules);
        $answer = new Answer;
        $answer->cpa_id = Auth::user("cpa")->id;
        $answer->question_id = $request->question_id;
        $answer->body = $request->body;
        

        $answer->save();
       
        return redirect('/cpa/answer/');
    }  
    
    public function index(Request $request)
    {
        $cond_field =$request->cond_field;
        if ($cond_field != '') {
            $answers = Question::where('field', $cond_field)->get();
        }
        else {
            $answers = Question::all();
            
        }
        return view('cpa.answer.index', ['answers' => $answers, 'cond_field' => $cond_field]);
    }
    
    
}
