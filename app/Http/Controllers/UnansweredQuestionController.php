<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class UnansweredQuestionController extends Controller
{
    // Unanswered Questions

    public function show(){
    	$questions = DB::table('unansweredquestview')->select('*')->get();
        return view('unansweredquestions', ['questions' => $questions]);
    }
}
