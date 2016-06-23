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


// 	Route::post('/search', array('before'=>'csrf','uses'=>function(){

//     if(null != $_POST['suchbegriff']){
//         if(Request::ajax() != null){
//             $resultset = DB::table('users')
//                         ->join('questions', 'users.id', '=', 'questions.user_id')
//                         ->where('text', 'like', '%'.$_POST['suchbegriff'].'%')
//                         ->orWhere('titel', 'like', '%'.$_POST['suchbegriff'].'%')
//                         ->get();

//             return json_encode($resultset);
//         }
//     } else {
//         return json_encode(null);
//     }
// })); 

}
