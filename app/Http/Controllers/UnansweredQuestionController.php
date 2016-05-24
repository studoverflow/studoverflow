<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UnansweredQuestionController extends Controller
{
    // Unanswered Questions

    public function show(){
        return view('unansweredquestions');
    }
}
