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

// HOME / AUTH

Route::auth();
Route::get('/', 'HomeController@goHome');
Route::get('/home', 'HomeController@goHome');

// QUESTIONS / ANSWERS

Route::get('/create', 'QuestionController@getCreateQuestion');
Route::post('/create', 'QuestionController@createQuestion');
Route::get('/question={id}', 'QuestionController@showQuestion');
Route::post('/question={qid}', 'QuestionController@answer');

// FOOTER

Route::get('/imprint', 'ImprintController@show');
Route::get('/legalnotice', 'LegalnoticeController@show');
Route::get('/privacy', 'PrivacyController@show');
Route::get('/feedback', 'FeedbackController@feedback');
Route::post('/feedback', 'FeedbackController@send');

// NAVIGATION

Route::get('/history', 'HistoryController@show');
Route::get('/new', 'HomeController@showNew');
Route::get('/popular', 'HomeController@showPop');
Route::get('/unanswered', 'HomeController@showUna');
Route::get('/overview', 'HomeController@showOver');
Route::get('/search', 'SearchController@getSearch');

// USER

Route::post('/profile/edit', 'UserController@update_profile');
Route::get('/profile/edit', 'UserController@editProfile');
Route::get('/profile', 'UserController@showOwnProfile');
Route::get('/profile={id}', 'UserController@showProfile');