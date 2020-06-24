<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\Auth;



class UserProfileController extends Controller
{
    use AuthenticatesUsers;

    public function index() {

        /**
         * fetching the user model
         **/
        $user = Auth::user();
        //var_dump($user);

        /**
         * Passing the user data to profile view
         */
        return view('users.profile', compact('user'));

    }

    public function update(Request $request) {

        /**
           * fetching the user model
           */
          $user = Auth::user();


          /**
           * Validate request/input
           **/
          $this->validate($request, [
              'name' => 'required|max:255|unique:users,name,'.$user->id,
              'email' => 'required|email|max:255|unique:users,email,'.$user->id,
          ]);

          /**
           * storing the input fields name & email in variable $input
           * type array
           **/
          $input = $request->only('name','email');



          /**
           * Accessing the update method and passing in $input array of data
           **/
          $user->update($input);

          /**
           * after everything is done return them pack to /profile/ uri
           **/
          return back();
      }


  /*  public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'profile']]);
    }*/

    public function showProfile()
    {
       // $user = User::find($id);
        // return view('users.profile', compact('users') );
        return view('users.show', ['user' => auth()->user()]);
    }

 /*   public function profile()
{
    return auth('api')->user();
}*/
}
