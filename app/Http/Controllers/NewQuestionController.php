<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class NewQuestionController extends Controller
{
    // New Questions

    public function show(){
    	$questions = DB::table('newquestview')->select('*')->get();
        return view('newquestions', ['questions' => $questions]);
    }
}
