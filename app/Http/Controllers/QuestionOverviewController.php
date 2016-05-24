<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionOverviewController extends Controller
{
    // Overview Questions

    public function show(){
        return view('questionsoverview');
    }

}
