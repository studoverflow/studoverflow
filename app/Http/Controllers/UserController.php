<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Image;


class UserController extends Controller
{
    public function update_profile(Request $request){

            if($request->hasFile('avatar')){

            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(100, 100)->save( public_path('/img/upload/avatar/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        if($request->email != null) {
            
            $user = Auth::user();
            $user->email = $request->email;
            $user->save();
        }
        if($request->firstname != null) {
            
            $user = Auth::user();
            $user->firstname = $request->firstname;
            $user->save();
        }
        if($request->lastname != null) {
            
            $user = Auth::user();
            $user->lastname = $request->lastname;
            $user->save();   
        }
        if($request->page != null) {
            
            $user = Auth::user();
            $user->page = $request->page;
            $user->save();   
        }
        if($request->college != null) {
            
            $user = Auth::user();
            $user->college = $request->college;
            $user->save();
        }
        if($request->course != null) {
            
            $user = Auth::user();
            $user->course = $request->course;
            $user->save();
        }

        return view('editprofile');
    }
}