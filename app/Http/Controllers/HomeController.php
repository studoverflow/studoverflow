<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/');
    }

    public function goHome(){
        return view('welcome');
    }

    // New Questions

    public function showNew(){
        return view('newquestions');
    }

    // Popular Questions

    public function showPop(){
        return view('popularquestions');
    }

    // Unanswered Questions

    public function showUna(){
        return view('unansweredquestions');
    }

    // Overview Questions

    public function showOver(){
        return view('questionsoverview');
    }

}
