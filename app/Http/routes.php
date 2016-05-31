<?php

// HOME / AUTH

Route::auth();
Route::get('/', 'IndexController@goHome');
Route::get('/home', 'IndexController@goHome');

Route::post('/search', array('before'=>'csrf','uses'=>function(){

    if(Request::ajax() != null){
        $resultset = DB::table('answers')
                ->where('text', 'like', '%'.$_POST['suchbegriff'].'%')
                ->orWhere('titel', 'like', '%'.$_POST['suchbegriff'].'%')
                ->get();

        return json_encode($resultset);
    }
}));

// QUESTIONS / ANSWERS

Route::get('/create', 'QuestionController@getCreateQuestion');
Route::get('/question={id}', 'QuestionController@showQuestion');
Route::get('/answer={id}', 'QuestionController@showAnswerQuestion');

// INSERT

Route::post('/create', array('before'=>'csrf','uses'=>function(){

    if(Request::ajax() != null){

        $user = Auth::user();
        $titel = $_POST['titel'];
        $text = $_POST['text'];
        $datecurr = date("Y-m-d");

        DB::table('questions')->insertGetId(
            ['user_id' => $user->id,
            'titel' => $titel,
            'text' => $text,
            'date' => $datecurr]);

        return 1;
    }
}));

Route::post('/answer', array('before'=>'csrf','uses'=>function(){

    if(Request::ajax()){

        $qid = $_POST['qid'];
        $titel = $_POST['titel'];
        $text = $_POST['text'];
        $datecurr = date("Y-m-d");
        $userAnswer = Auth::user();
        
        //     Answer::create(
        //     ['user_id' => $user->id,
        //     'question_id' => $qid,
        //     'titel' => $titel,
        //     'text' => $text,
        //     'date' => $datecurr]
        // );

        DB::table('answers')->insertGetId(
            ['user_id' => $userAnswer->id,
            'question_id' => $qid,
            'titel' => $titel,
            'text' => $text,
            'date' => $datecurr]);

        return 1;
    }
}));

// DELETE

Route::get('/deleteAnswer={id}', 'QuestionController@showDeleteAnswer');
Route::post('/deleteAnswer', 'QuestionController@deleteAnswer');
Route::get('/deleteQuestion={id}', 'QuestionController@ShowDeleteQuestion');
Route::post('/deleteQuestion', 'QuestionController@deleteQuestion');

// REPORT

Route::get('/reportQuestion={id}', 'ReportController@reportQuestionShow');
Route::get('/reportAnswer={id}', 'ReportController@reportAnswerShow');

Route::post('/report',array('before'=>'csrf','uses'=>function(){

    if(Request::ajax())
    {
    	$string = $_POST['dataString'];

    	$data = array(
    		'message' => $string );


    	Mail::raw($string, function($message){
    		$message->from('studoverflow@stephenbeck.de', 'StudOverflow');
    		$message->to('studoverflow@stephenbeck.de', 'StudOverflow')->subject('Report!');
    	});

    	
       	return 1;
    }
}));

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
Route::post('/profile', 'UserController@rights');

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

       	return 1;
    }
}));