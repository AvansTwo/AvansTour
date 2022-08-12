<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StorageController;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamProgress;
use App\Models\TeamAnswer;
use App\Models\Category;
use App\Models\Tour;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $radius = Settings::find(1);
        return view('admin.index')->with("radius", $radius);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteTeamsInRange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'startDate'     => ['required', 'date'],
            'endDate'       => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return redirect("/instellingen")->withErrors($validator)->withInput();
        }

        $startDate = Carbon::parse($request->startDate)->format('Y-m-d');
        $endDate = Carbon::parse($request->endDate)->format('Y-m-d');

        $teams = Team::whereBetween('created_at', [$startDate ." 00:00:00", $endDate ." 23:59:59"])->get();
        foreach($teams as $team){
            $teamProgresses = TeamProgress::all()->where('team_id', $team->id);

            foreach($teamProgresses as $teamProgress){
                $answer = TeamAnswer::find($teamProgress->team_answer_id);

                if($answer->is_file){
                    StorageController::delete($answer->answer);
                }

                $answer->delete();
            }

            $team->delete();
        }

        Session::flash('Checkmark','Teams in de gegeven periode zijn verwijderd!');
        return Redirect::to('/instellingen');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settings = new Settings();

        $settings->radius = $request->radius;

        $settings->save();

        Session::flash('Checkmark','Radius opgeslagen!');
        return view('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRadius(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'radius'    => ['required', 'integer', 'between:10,200'],
        ]);

        if ($validator->fails()) {
            return redirect("/instellingen")->withErrors($validator)->withInput();
        }

        $setting = Settings::find(1);

        if (!empty($setting)) {
            $setting->update([
                'radius' => $request->radius,
            ]);
        } else {
            $setting = new Settings();
            $setting->radius = $request->radius;
            $setting->save();
        }
        Session::flash('Checkmark','Radius opgeslagen!');
        return Redirect::to('/instellingen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
