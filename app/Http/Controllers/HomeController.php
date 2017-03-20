<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('dashboard');
    }

    public function profile()
    {
        return view('profile');
    }

    public function editProfile(Request $request)
    {
        $input = $request->all();
        $user = User::where('id', \Auth::id())->first();
        if (!is_null($user))
        {
            $user->unit = $input['unit'];
            $user->maxTarget = $input['maxTarget'];
            $user->minTarget = $input['minTarget'];
            $user->language = $input['language'];

            $user->save();
            return \Redirect::back()->with('status', 'New settings store successfully.');
        }


    }
}
