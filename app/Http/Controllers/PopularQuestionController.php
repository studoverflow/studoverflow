<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class PopularQuestionController extends Controller
{
    // Popular Questions

    public function show(){
    	$questions = DB::table('popquestview')->select('*')->get();
        return view('popularquestions', ['questions' => $questions]);
    }
}
