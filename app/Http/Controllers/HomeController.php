<?php

namespace App\Http\Controllers;

use App\File;
use App\SugarLevel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

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
        $data = SugarLevel::all()->sortByDesc("created_at")->take(10);
        $level = $this->getAvg();

        return view('dashboard', compact('data', 'level'));
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

    public function settings()
    {
        return view('settings');
    }

    public function editSettings(Request $request)
    {
        $input = $request->all();
        $user = User::where('id', \Auth::id())->first();
        if (!is_null($user))
        {
            $user->unit = $input['unit'];
            $user->maxTarget = $input['maxTarget'];
            $user->minTarget = $input['minTarget'];
            $user->language = $input['language'];


            if (array_key_exists($user->language, Config::get('language'))) {
                Session::put('applocale', $user->language);
            }

            $user->save();
            return \Redirect::back()->with('status', 'New settings store successfully.');
        }


    }

    public function mbs(Request $request)
    {
        $data = SugarLevel::orderBy('created_at', 'desc')->paginate(30);
        $stat['total'] = SugarLevel::all()->count();
        $stat['avg'] = SugarLevel::all()->avg('value');
        $stat['max'] = SugarLevel::all()->max('value');
        $stat['min'] = SugarLevel::all()->min('value');

        return view('mbs', compact('data', 'stat'));
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
            'timeString_id' => $input['timeString_id'],
            'exercise_id' => $exer,
            'medicine_id' => $med
        ]);

        if (!is_null($mbs))
            $mbs->save();

        return \Redirect::back()->with('status', 'New test added successfully. ');


    }


    public function pdfPage(Request $request)
    {
        $data = File::all()
            ->sortByDesc('created_at')
            ->where('user_id', \Auth::user()->id);

        return view('pdfPage', compact('data'));
    }

    public function pdfDownload(Request $request, $filename)
    {
        $entry = File::where('filename', $filename)->where('user_id', \Auth::user()->id)->first();


       return response()->download(storage_path('local/'.$entry->filename));
    }

    public function pdfDelete(Request $request, $fileID)
    {
        $entry = File::where('id', $fileID)->where('user_id', \Auth::user()->id)->first();

        $entry->delete();
        return \Redirect::back()->with('status', 'The file has been deleted.');
    }
    public function generatePDF(Request $request)
    {
        $exercise_id = null;
        $medicine_id = null;
        $input = $request->all();

        switch ($request->get('with'))
        {
            case "1":
                $exercise_id = null;
                $medicine_id = null;
                break;
            case "2":
                $exercise_id = 1;
                break;
            case "3":
                $medicine_id = 1;
                break;
            default:
                $exercise_id = 1;
                $medicine_id = 1;
        }

        switch ($request->get('period'))
        {
            case "1":
                $period = Carbon::now()->subDays(1);
                break;
            case "2":
                $period = Carbon::now()->subDays(7);
                break;
            case "3":
                $period = Carbon::now()->subDays(30);
                break;
            default:
                $period = Carbon::minValue();
        }

        $data =  SugarLevel::all()
            ->sortByDesc('created_at')
            ->where('created_at', '>=', $period)
            ->where('exercise_id', $exercise_id)
            ->where('medicine_id', $medicine_id);


        $stat['total'] = SugarLevel::all()
            ->sortByDesc('created_at')
            ->where('created_at', '>=', $period)
            ->where('exercise_id', $exercise_id)
            ->where('medicine_id', $medicine_id)->count();

        $stat['avg'] = SugarLevel::all()
            ->sortByDesc('created_at')
            ->where('created_at', '>=', $period)
            ->where('exercise_id', $exercise_id)
            ->where('medicine_id', $medicine_id)->avg('value');

        $stat['max'] = SugarLevel::all()
            ->sortByDesc('created_at')
            ->where('created_at', '>=', $period)
            ->where('exercise_id', $exercise_id)
            ->where('medicine_id', $medicine_id)->max('value');

        $stat['min'] = SugarLevel::all()
            ->sortByDesc('created_at')
            ->where('created_at', '>=', $period)
            ->where('exercise_id', $exercise_id)
            ->where('medicine_id', $medicine_id)->min('value');

        $stat['maxDate'] = SugarLevel::all()
            ->where('created_at', '>=', $period)
            ->where('value', $stat['max'])->first();

        $stat['maxCount'] = SugarLevel::all()
            ->where('value', '>', \Auth::user()->maxTarget)
            ->where('created_at', '>=', $period)
            ->count();

        $stat['minCount'] = SugarLevel::all()
            ->where('value', '<', \Auth::user()->minTarget)
            ->where('created_at', '>=', $period)
            ->count();

        $stat['minDate'] = SugarLevel::all()
            ->where('created_at', '>=', $period)
            ->where('value', $stat['min'])->first();


       /* $data = SugarLevel::all()->sortByDesc("id")->take(10);
        $level = $this->getAvg();
        $pdf = \App::make('snappy.pdf');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 13500);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        $view = \View::make('layouts.plain', compact('data', 'level'));
        $content = $view->render();


        return new Response(
            $pdf->getOutputFromHtml($content),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="file.pdf"'
            )
        );
        //return $content;*/

        $level = $this->getAvg();
        $pdf = \PDF::loadView('testing', compact('data', 'stat'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('images', true);
        $pdf->setOption('javascript-delay', 13000); // page load is quick but even a high number doesn't help
        $pdf->setOption('enable-smart-shrinking', false);
        $pdf->setOption('no-stop-slow-scripts', true);
        $file = $pdf->stream('ted.pdf');


        $mytime = Carbon::now();
        $filename = \Auth::user()->name . $mytime . '.pdf';
        $filename = preg_replace('/\s+/', '', $filename); // Remove all spaces
        $pdf->save(storage_path('local/'.$filename));

        $entry = File::create([
            'filename' => $filename,
            'user_id' => \Auth::user()->id
        ]);

        if ($entry)
        {
            $entry->save();
        }

        return \Redirect::to('dashboard/pdf')->with('status', 'The pdf file has been generated.');
    }

    public function testing()
    {
        $data = SugarLevel::all();

        return view('testing', compact('data'));
    }

    private function getAvg()
    {
        $level['no']['fasting']  = \DB::table('sugar_levels')
            ->where('timeString_id', 1)
            ->where('exercise_id', null)
            ->where('medicine_id', null)

            ->avg('value');

        $level['no']['beforeLunch']  = \DB::table('sugar_levels')
            ->where('timeString_id', 2)
            ->where('exercise_id', null)
            ->where('medicine_id', null)
            ->avg('value');

        $level['no']['afterLunch']  = \DB::table('sugar_levels')
            ->where('timeString_id', 3)
            ->where('exercise_id', null)
            ->where('medicine_id', null)
            ->avg('value');

        $level['no']['beforeDinner']  = \DB::table('sugar_levels')
            ->where('timeString_id', 4)
            ->where('exercise_id', null)
            ->where('medicine_id', null)
            ->avg('value');

        $level['no']['afterDinner']  = \DB::table('sugar_levels')
            ->where('timeString_id', 5)
            ->where('exercise_id', null)
            ->where('medicine_id', null)
            ->avg('value');


        // -----------------

        $level['e']['fasting']  = \DB::table('sugar_levels')
            ->where('timeString_id', 1)
            ->where('exercise_id', 1)
            ->where('medicine_id', null)

            ->avg('value');

        $level['e']['beforeLunch']  = \DB::table('sugar_levels')
            ->where('timeString_id', 2)
            ->where('exercise_id', 1)
            ->where('medicine_id', null)
            ->avg('value');

        $level['e']['afterLunch']  = \DB::table('sugar_levels')
            ->where('timeString_id', 3)
            ->where('exercise_id', 1)
            ->where('medicine_id', null)
            ->avg('value');

        $level['e']['beforeDinner']  = \DB::table('sugar_levels')
            ->where('timeString_id', 4)
            ->where('exercise_id', 1)
            ->where('medicine_id', null)
            ->avg('value');

        $level['e']['afterDinner']  = \DB::table('sugar_levels')
            ->where('timeString_id', 5)
            ->where('exercise_id', 1)
            ->where('medicine_id', null)
            ->avg('value');

        // --------------

        $level['m']['fasting']  = \DB::table('sugar_levels')
            ->where('timeString_id', 1)
            ->where('exercise_id', null)
            ->where('medicine_id', 1)

            ->avg('value');

        $level['m']['beforeLunch']  = \DB::table('sugar_levels')
            ->where('timeString_id', 2)
            ->where('exercise_id', null)
            ->where('medicine_id', 1)
            ->avg('value');

        $level['m']['afterLunch']  = \DB::table('sugar_levels')
            ->where('timeString_id', 3)
            ->where('exercise_id', null)
            ->where('medicine_id', 1)
            ->avg('value');

        $level['m']['beforeDinner']  = \DB::table('sugar_levels')
            ->where('timeString_id', 4)
            ->where('exercise_id', null)
            ->where('medicine_id', 1)
            ->avg('value');

        $level['m']['afterDinner']  = \DB::table('sugar_levels')
            ->where('timeString_id', 5)
            ->where('exercise_id', null)
            ->where('medicine_id', 1)
            ->avg('value');

        return $level;

    }
}
