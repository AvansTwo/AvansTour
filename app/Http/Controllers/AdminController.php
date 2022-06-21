<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function deleteTeamsInRange(Request $request)
    {
        $startDateC = Carbon::parse($request->startDate)->format('Y-m-d');
        $endDateC = Carbon::parse($request->endDate)->format('Y-m-d');

        $startDate = strtotime($request->startDate);
        $endDate = strtotime($request->endDate);

        $teams = Team::whereBetween('created_at', [$startDateC ." 00:00:00", $endDateC ." 23:59:59"])->get();
        foreach($teams as $team){
            $teamProgresses = $team->teamProgress;

            foreach($teamProgresses as $teamProgress){
                $answer = TeamAnswer::find($teamProgress->team_answer_id);

                if (\File::exists(public_path('teamimg/' . $answer->answer))) {
                    \File::delete(public_path('teamimg/' . $answer->answer));
                }

                $answer->delete();
            }

            $team->delete();
        }
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