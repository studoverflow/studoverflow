<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PopularQuestionController extends Controller
{
    // Popular Questions

    public function show(){
        return view('popularquestions');
    }
}
