<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=auth()->user()->uid;
        $user=User::find($user_id);
        //dd($user->books);
        return view('home')->with('books',$user->books);
    }
    /**
     * Update User's profile Image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {
      $this->validate($request, [
        'profile' => 'required|nullable|max:1999'
      ]);

      // Handle File Upload
      if($request->hasFile('profile')){
        // Get filename with the extension
        $filenameWithExt = $request->file('profile')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('profile')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.auth()->user()->uid.'.'.$extension;
        // Upload Image
        $path = $request->file('profile')->storeAs('public/img/profile', $fileNameToStore);
        } else {
            $fileNameToStore = 'unknown.png';
        }
      // Create Book
      $user = auth()->user();
      $user->photo_link = $fileNameToStore;
      $user->save();
      
      return redirect('/home')->with('success', 'Profile picture changed');
    }
}
