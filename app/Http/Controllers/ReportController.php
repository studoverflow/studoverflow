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



	public function report(){
		return view('report');
    }

    public function send(){

        $rules = array(
            'message'   => 'Required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
            

            Mail::send('emails.feedback.default', array('data' => Input::all()), function($message)
            {
            $message->from('studoverflow@stephenbeck.de', 'User StudOverflow');
            $message->to('studoverflow@stephenbeck.de', 'Admin StudOverflow')->subject('Report Formular');
            });
                return Redirect::action('ReportController@report')->with('sendsuccess',1);




        } else {
            return Redirect::action('ReportController@report')->withInput()->withErrors($validator);
        }
        exit;
    }


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
            'question_id' => $question->id,
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
            'answer_id' => $answer->id,
            'question_id' => $answer->question_id,
            'value' => 'Answer',
            'avatar' => $user->avatar );
		return view('report')->with($data);
	}



}