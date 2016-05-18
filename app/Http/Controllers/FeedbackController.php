<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;

class FeedbackController extends Controller {
    
    public function feedback()
    {
	return view('feedback');
    }

    public function send()
    {
        $rules = array(
            'email'     => 'Required|Between:3,64|Email',
            'message'   => 'Required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->passes()) {
            

            Mail::send('emails.feedback.default', array('data' => Input::all()), function($message)
            {
            $message->from('studoverflow@stephenbeck.de', 'User StudOverflow');
            $message->to('studoverflow@stephenbeck.de', 'Admin StudOverflow')->subject('Feedback Formular');
            });
                return Redirect::action('FeedbackController@feedback')->with('sendsuccess',1);




        } else {
            return Redirect::action('FeedbackController@feedback')->withInput()->withErrors($validator);
        }
        exit;
    }
}