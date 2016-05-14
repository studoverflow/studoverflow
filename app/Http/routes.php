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

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/question', function () {
    return view('question');
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


Route::get('test', function () {
    $users = App\User::all();
    foreach ($users as $user){
        $profile = App\Profile::find($user->id);
        echo $user->name . " hat den Nachname " . $profile->surname . "<br/>";
    }
    
});

