<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Answer;
use Auth;
use Image;
use DB;
use Mail;


class ReportController extends Controller {

	public  function reportQuestionShow($id){
		$question = Question::find($id);
        $user = User::find($question->user_id);
        $data = array(
            'name' => $user->name,
            'user_id' => $user->id,
            'titel' => $question->titel,
            'text' => $question->text,
            'date' => $question->date,
            'edit' => $question->edit,
            'id' => $question->id,
            'value' => 'Question',
            'avatar' => $user->avatar );
		return view('report')->with($data);
	}

	public  function reportAnswerShow($id){
		$answer = Answer::find($id);
        $user = User::find($answer->user_id);
        $data = array(
            'name' => $user->name,
            'user_id' => $user->id,
            'titel' => $answer->titel,
            'text' => $answer->text,
            'date' => $answer->date,
            'edit' => $answer->edit,
            'id' => $answer->id,
            'question_id' => $answer->question_id,
            'value' => 'Answer',
            'avatar' => $user->avatar );
		return view('report')->with($data);
	}
    
}