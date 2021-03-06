<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use Auth;
use Image;
use DB;


class HistoryController extends Controller {

	public function show(){

		if(Auth::guest()){
	        return view('welcome');
	    } else {

	    	$questions = DB::select('select * from questions where user_id = ? order by date desc', [Auth::user()->id]);
	    	$answers = DB::select('select * from answers where user_id = ? order by date desc', [Auth::user()->id]);

	        return view('history', ['answers' => $answers], ['questions' => $questions]);
	    } 

	}




}