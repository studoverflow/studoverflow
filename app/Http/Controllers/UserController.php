<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\User;


class UserController extends Controller {

    // EDIT PROFILE

    public function editProfile(){
        if(Auth::guest()){
            return view('welcome');
        } else {
            return view('editprofile');
        }
    }
    
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

    // SHOW PROFILE

    public function showOwnProfile(){
        if(Auth::guest()){
            return view('welcome');
        } else {
            $user = User::find(Auth::user()->id);
            $data = array(
                'name' => $user->name,
                'email' => $user->email,
                'page' => $user->page,
                'college' => $user->college,
                'course' => $user->course,
                'forename' => $user->firstname,
                'surname' => $user->lastname,
                'top' => $user->top,
                'rank' => $user->rank,
                'avatar' => $user->avatar );
            return view('profile')->with($data);
        }
    }

    public function showProfile($id){
        $user = User::find($id);
        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'page' => $user->page,
            'college' => $user->college,
            'course' => $user->course,
            'forename' => $user->firstname,
            'surname' => $user->lastname,
            'top' => $user->top,
            'rank' => $user->rank,
            'avatar' => $user->avatar );
        return view('profile')->with($data);
    }

}