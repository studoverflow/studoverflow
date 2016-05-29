<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Question;
use App\User;
use Auth;
use Image;
use DB;


class SearchController extends Controller {

	public function getSearch(){
		return view('search');
	}
    
    public function searchQuestion(Request $request){
        
        if(null != $request && null != $request->suchbegriff){
            $data = array(
                'suchbegriff' => $request->suchbegriff
            );
        
            return view('search')->with($data);
        } else{
            $data = array(
                'suchbegriff' => '!!! Geben Sie bitte einen Suchbegriff ein !!!'
            );

            return view('search')->with($data);
        }
        
    }

}
