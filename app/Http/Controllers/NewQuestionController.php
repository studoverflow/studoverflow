<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NewQuestionController extends Controller
{
    // New Questions

    public function show(){
        return view('newquestions');
    }
}
