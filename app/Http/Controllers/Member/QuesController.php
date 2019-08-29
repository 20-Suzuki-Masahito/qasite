<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Cpa;
use App\Question;
use App\Answer;


class QuesController extends Controller
{
    public function add()
    {
        return view('member.ques.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Question::$rules);
        
        $question = new Question;
        $form = $request->all();
        
        if (isset($form['file'])) {
        $path = $request->file('file')->store('public/file');
        $question->file_path = basename($path);
      } else {
          $question->file_path = null;
      }
        
        unset($form['_token']);
        unset($form['file']);
        
        $question->fill($form);
        $question->user_id = Auth::user()->id;
        $question->save();
        
        return redirect('member/ques/create');
    }  
    
    public function index(Request $request)
    {
        $cond_field =$request->cond_field;
        if ($cond_field != '') {
            $questions = Auth::user("user")->questions->where('field', $cond_field)->get();
        }
        else {
            $questions = Auth::user("user")->questions;
            
        }
        return view('member.ques.index', ['questions' => $questions, 'cond_field' => $cond_field]);
    }
    
    public function edit(Request $request)
    {
        $question = Question::find($request->id);
        if (empty($question)) {
            abort(404);
        }
        return view('member.ques.edit', ['question_form' => $question]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Question::$rules);
        $question = Question::find($request->id);
        $question_form = $request->all();
        if (isset($question_form['file'])) {
            $path = $request->file('file')->store('public/file');
            $question->file_path = basename($path);
            unset($question_form['file']);
            if (isset($request->remove)){
                unset($question_form['remove']);
            }
        } 
        elseif (isset($request->remove)) {
        $question->file_path = null;
        unset($question_form['remove']);
        }
        
        unset($question_form['_token']);
        
        $question->fill($question_form)->save();
        
        return redirect('member/ques');

    }
    
        public function delete(Request $request)
    {
        $question = Question::find($request->id);
        $question->delete();
        
        return redirect('member/ques');
    }

}
