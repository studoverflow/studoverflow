<?php


// HOME / AUTH

Route::auth();
Route::get('/', 'IndexController@goHome');
Route::get('/home', 'IndexController@goHome');

// QUESTIONS / ANSWERS

Route::get('/create', 'QuestionController@getCreateQuestion');
Route::post('/create', 'QuestionController@createQuestion');
Route::get('/question={id}', 'QuestionController@showQuestion');
Route::post('/answer={qid}', 'QuestionController@answer');
Route::get('/answer={id}', 'QuestionController@showAnswerQuestion');

// DELETE

Route::get('/deleteAnswer={id}', 'QuestionController@showDeleteAnswer');
Route::post('/deleteAnswer', 'QuestionController@deleteAnswer');
Route::get('/deleteQuestion={id}', 'QuestionController@ShowDeleteQuestion');
Route::post('/deleteQuestion', 'QuestionController@deleteQuestion');

// REPORT

Route::get('/reportQuestion={id}', 'ReportController@reportQuestionShow');
Route::get('/reportAnswer={id}', 'ReportController@reportAnswerShow');


// FOOTER

Route::get('/imprint', 'ImprintController@show');
Route::get('/legalnotice', 'LegalnoticeController@show');
Route::get('/privacy', 'PrivacyController@show');
Route::get('/feedback', 'FeedbackController@feedback');
Route::post('/feedback', 'FeedbackController@send');

// NAVIGATION

Route::get('/history', 'HistoryController@show');
Route::get('/new', 'NewQuestionController@show');
Route::get('/popular', 'PopularQuestionController@show');
Route::get('/unanswered', 'UnansweredQuestionController@show');
Route::get('/overview', 'QuestionOverviewController@show');
Route::get('/search', 'SearchController@getSearch');

// USER

Route::post('/editprofile', 'UserController@update_profile');
Route::get('/editprofile', 'UserController@editProfile');
Route::get('/profile', 'UserController@showOwnProfile');
Route::get('/profile={id}', 'UserController@showProfile');


// TOP ANSWER

Route::post('/question={qid}',array('before'=>'csrf','uses'=>function(){

    if(Request::ajax())
    {
    	$answer = $_POST['id'];
    	$top = DB::select('select * from answers where id = ?', [$answer]);
    	foreach ($top as $key) {
	    	if($key->top == '1'){
	    		DB::table('answers')
		            ->where('id', $answer)
		            ->update(['top' => 0]);
	    	} else {
	    		DB::table('answers')
		            ->where('id', $answer)
		            ->update(['top' => 1]);
	    	}
    	}
       	return $answer;
    }
}));