<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ask', function () {
    if(Auth::guest()){
        return view('welcome');
    } else {
        return view('ask');
    }    
});

Route::get('/create', function () {
    return view('createQuestion');  
});

Route::get('/feedback', 'FeedbackController@feedback');

Route::post('/feedback', 'FeedbackController@send');

Route::get('/history', function () {
    if(Auth::guest()){
        return view('welcome');
    } else {
        return view('history');
    }    
});

Route::get('/home', function () {
    return view('welcome');  
});

Route::get('/imprint', function () {
    return view('imprint');
});

Route::get('/legalnotice', function () {
    return view('legalnotice');
});

Route::get('/new', function () {
    return view('newquestions');
});

Route::get('/popular', function () {
    return view('popularquestions');
});

Route::get('/unanswered', function () {
    return view('unansweredquestions');
});

Route::get('/privacy', function () {
    return view('privacypolicy');;
});

Route::post('/profile/edit', 'UserController@update_profile');

Route::get('/overview', function () {
    return view('questionsoverview');
});

Route::get('/profile', function () {
    if(Auth::guest()){
        return view('welcome');
    } else {
        $user = App\User::find(Auth::user()->id);
        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'page' => $user->page,
            'college' => $user->college,
            'course' => $user->course,
            'forename' => $user->firstname,
            'surname' => $user->lastname,
            'top' => $user->top,
            'rank' => $user->rank,
            'avatar' => $user->avatar );
        return view('profile')->with($data);
    }
});

Route::get('/profile={id}', function ($id) {

    $user = App\User::find($id);
    $data = array(
        'name' => $user->name,
        'email' => $user->email,
        'page' => $user->page,
        'college' => $user->college,
        'course' => $user->course,
        'forename' => $user->firstname,
        'surname' => $user->lastname,
        'top' => $user->top,
        'rank' => $user->rank,
        'avatar' => $user->avatar );
    return view('profile')->with($data);
});

Route::get('/profile/edit', function () {
    return view('editprofile');
}); 

Route::get('/question={id}', function ($id) {

    $question = App\Question::find($id);
    $user = App\User::find($question->user_id);
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
});

Route::post('/question=ok', 'QuestionController@answer');

Route::get('/search', function () {
    return view('search');
});