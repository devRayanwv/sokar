<?php

namespace App\Http\Controllers;

use App\SugarLevel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $data = SugarLevel::all()->sortByDesc("id");
        return view('dashboard', compact('data'));
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

    public function mbs(Request $request)
    {
        return view('mbs');
    }
    public function addMbs(Request $request)
    {
        $input = $request->all();
        $exer = null;
        $med = null;
        switch($input['with'])
        {
            case 2:
                $exer = 1;
                break;
            case 3:
                $med = 1;
                break;
            case 4:
                $exer = 1;
                $med = 1;
                break;
            default:
                break;
        }

        $mbs = SugarLevel::create([
            'value' => $input['value'],
            'note' => $input['note'],
            'timeOfTest' => $input['timeOfTest'],
            'exercise_id' => $exer,
            'medicine_id' => $med
        ]);

        if (!is_null($mbs))
            $mbs->save();

        return \Redirect::back()->with('status', 'New test added successfully. ');


    }

    public function latestTest()
    {
        $data  = SugarLevel::orderBy('id', 'desc')->limit(21)->get();


        return response()->json($data);
    }
}
