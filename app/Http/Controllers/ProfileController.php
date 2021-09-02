<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    public function edit(User $profile)
    {
         return view('profile.edituser', compact('profile'));
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
           * storing the input fields
           * type array
           **/
          $data = $request->all();


          /**
           * Accessing the update method and passing in $input array of data
           **/
          $user->update($data);

          /**
           * after everything is done return them pack to /profile/ uri
           **/
          return back();
      }
}
