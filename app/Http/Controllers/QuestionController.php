<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;


class QuestionController extends Controller
{
     public function answer()
    {

    // $question = App\Question::find(Input::question_id());
    // $user = App\User::find($question->user_id);
    $data = array(
        'name' => $data['question_id'];
        'user_id' => '2',
        'titel' => '2',
        'text' => '2',
        'date' => '2',
        'edit' => '2',
        'question_id' => '2',
        'avatar' => '2' );

    return view('question')->with($data);
    }

    public function send()
    {
        $rules = array(
            'titel'     => 'Required',
            'text'   => 'Required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
            

            // Mail::send('emails.feedback.default', array('data' => Input::all()), function($message)
            // {
            // $message->from('studoverflow@stephenbeck.de', 'User StudOverflow');
            // $message->to('studoverflow@stephenbeck.de', 'Admin StudOverflow')->subject('Feedback Formular');
            // });

                return Redirect::action('QuestionController@answer')->with('sendsuccess',1)->array('datas' => Input::all());




        } else {
            return Redirect::action('QuestionController@answer')->withInput()->withErrors($validator);
        }
        exit;
    }

}