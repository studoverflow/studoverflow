<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class QuestionOverviewController extends Controller
{
    // Overview Questions

    public function show(){
    	$questions = DB::table('overquestview')->select('*')->get();
        return view('questionsoverview', ['questions' => $questions]);
    }

}
