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
        'surname' => $profile->surname,);

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
        'surname' => $profile->surname,);

    return view('profile')->with($data);

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

Route::get('test2', function () {
    $user = App\User::find("1");
    $profile = App\Profile::find($user->id);
    echo $user->name . " hat den Nachname " . $profile->surname;
    
});

