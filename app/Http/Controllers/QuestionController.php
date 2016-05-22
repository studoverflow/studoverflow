<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use Auth;
use Image;
use DB;


class QuestionController extends Controller
{
     public function answer(Request $request){


    $qid = $request->input('qid');
    $titel = $request->input('titel');
    $text = $request->input('text');
    $datecurr = date("Y-m-d");

    $question = Question::find($qid);
    $user = User::find($question->user_id);
    $data = array(
        'name' => $user->name,
        'user_id' => $user->id,
        'titel' => $question->titel,
        'text' => $question->text,
        'date' => $question->date,
        'edit' => $question->edit,
        'question_id' => $question->id,
        'avatar' => $user->avatar );


    if($request->titel != null && $request->text != null) {
        
        $user = Auth::user();

        DB::table('answers')->insertGetId(
            ['user_id' => $user->id,
            'question_id' => $qid,
            'titel' => $titel,
            'text' => $text,
            'date' => $datecurr]

        );        
    }


    return view('question')->with($data);
    }
}