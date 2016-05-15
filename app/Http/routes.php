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

Route::get('/new', function () {
    return view('newquestions');
});

Route::get('/popular', function () {
    return view('popularquestions');
});

Route::get('/unanswered', function () {
    return view('unansweredquestions');
});

Route::get('/overview', function () {
    return view('questionsoverview');
});

Route::get('/profile={id}', function ($id) {

    $user_id = DB::table('users')->where('id', $id)->first()->id;
    $profile_id = DB::table('profiles')->where('user_id', $user_id)->first()->id;
    $user = App\User::find($user_id);
    $profile = App\Profile::find($profile_id);
    $data = array(
        'name' => $user->name,
        'email' => $user->email,
        'page' => $profile->page,
        'college' => $profile->college,
        'course' => $profile->course,
        'forename' => $profile->forename,
        'surname' => $profile->surname,
        'top' => $profile->top,
        'rank' => $profile->rank );
    return view('profile')->with($data);
});

Route::get('/profile', function () {

    $user_id = DB::table('users')->where('name', Auth::user()->name)->first()->id;
    $profile_id = DB::table('profiles')->where('user_id', $user_id)->first()->id;
    $user = App\User::find($user_id);
    $profile = App\Profile::find($profile_id);
    $data = array(
        'name' => $user->name,
        'email' => $user->email,
        'page' => $profile->page,
        'college' => $profile->college,
        'course' => $profile->course,
        'forename' => $profile->forename,
        'surname' => $profile->surname,
        'top' => $profile->top,
        'rank' => $profile->rank );
    return view('profile')->with($data);

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
        'question_id' => $question->id );
    return view('question')->with($data);
});

Route::get('/imprint', function () {
    return view('imprint');
});

Route::get('/privacy', function () {
    return view('privacypolicy');;
});

Route::get('/legalnotice', function () {
    return view('legalnotice');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/ask', function () {
    if(Auth::guest()){
        return view('welcome');
    } else {
        return view('ask');
    }    
});

Route::get('/history', function () {
    if(Auth::guest()){
        return view('welcome');
    } else {
        return view('history');
    }    
});