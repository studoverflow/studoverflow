<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;

class IndexController extends Controller
{
    public function goHome(){

    	if(Auth::guest()){
    		return view('welcome');
    	} else {

    		$countquestions = DB::select('select count(*) as count from questions where user_id = ?', [Auth::user()->id]);
            $countanswers = DB::select('select count(*) as count from answers where user_id = ?', [Auth::user()->id]);
            $counttop = DB::select('select * from topanswers where user_id = ?', [Auth::user()->id]);
            $top = 0;

            foreach ($counttop as $topa) {

                $top = $topa->anzahl;


             }
            	$data = array(
                	'top' => $top);
               

            return view('welcome', ['countquestions' => $countquestions], ['countanswers' => $countanswers])->with($data);
        }


        
    }
}
