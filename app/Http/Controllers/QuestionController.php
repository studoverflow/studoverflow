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



class QuestionController extends Controller {

    // ANSWER


    public function showDeleteAnswer($id){

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
        return view('delete')->with($data);
    }


    public function deleteAnswer(Request $request){

        $aid = $request->input('aid');
        DB::table('answers')->where('id', '=', $aid)->delete();


        $id = $request->input('qid');
        $question = Question::find($id);
        $user = User::find($question->user_id);
        $data = array(
            'name' => $user->name,
            'user_id' => $question->id,
            'titel' => $question->titel,
            'text' => $question->text,
            'date' => $question->date,
            'edit' => $question->edit,
            'question_id' => $question->id,
            'value' => 'Answer',
            'avatar' => $user->avatar );
        return view('question')->with($data);
    }

    public function top(Request $request){

        $qid = $request->input('qid');

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

            return view('question')->with($data);  

    }

    // START POST INSERT ANSWER

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

        //     Answer::create(
        //     ['user_id' => $user->id,
        //     'question_id' => $qid,
        //     'titel' => $titel,
        //     'text' => $text,
        //     'date' => $datecurr]
        // );

            DB::table('answers')->insertGetId(
                ['user_id' => $user->id,
                'question_id' => $qid,
                'titel' => $titel,
                'text' => $text,
                'date' => $datecurr]
            );

            return view('question')->with($data);    

        } else {

            return view('question')->with($data);
        }
    }

    // ------------------------------------------------------------

    public function showAnswerQuestion($id){
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
            'avatar' => $user->avatar );
        return view('newanswer')->with($data);
    }


    // QUESTION

    // DELETE QUESTION

    public function showDeleteQuestion($id){

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
        return view('delete')->with($data);
    }


    public function deleteQuestion(Request $request){

        $aid = $request->input('qid');
        DB::table('questions')->where('id', '=', $aid)->delete();

        return view('history');
    }

    // ------------------------------------------------------------

    // POST INSERT QUESTION

    public function createQuestion(Request $request){

        if($request->titel != null && $request->text != null) {
            
            $user = Auth::user();
            $titel = $request->input('titel');
            $text = $request->input('text');
            $datecurr = date("Y-m-d");


            $qid = DB::table('questions')->insertGetId(
                ['user_id' => $user->id,
                'titel' => $titel,
                'text' => $text,
                'date' => $datecurr]

            ); 

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

            return view('question')->with($data);

        } else {
            return view('welcome');
        }

  
    }

    // ------------------------------------------------------------

    // GET

    public function getCreateQuestion(){

        if(Auth::guest()){
            return view('auth.register');

        } else {
            return view('createQuestion');
        }

    }

    public function showQuestion($id){
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
            'avatar' => $user->avatar );
        return view('question')->with($data);
    }




}