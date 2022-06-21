<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\TeamProgress;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Team;
use App\Models\TeamAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = DB::select('SELECT team.team_name, team.id AS team_id, tour.name AS tour_name from team left join team_progress on team_progress.team_id = team.id left join tour on tour.id = team.tour_id WHERE team_progress.team_id IS NOT NULL GROUP BY team.team_name, team.id, tour.name ');
        return view('dashboard.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function teamIndex($teamId)
    {
        $teamProgress = TeamProgress::all()->where('team_id', $teamId)->where('status', 'Afwachting');
        $teamName = $teamProgress->first();
        if(empty($teamName)){
            return Redirect::to('/dashboard');
        }
        return view('dashboard.teamIndex')->with('teamProgress', $teamProgress)->with('teamName', $teamName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $answerId
     * @return \Illuminate\Http\Response
     */
    public function show($teamProgressId)
    {
        $TeamProgress = TeamProgress::find($teamProgressId);
        return view('dashboard.detail')->with('TeamProgress', $TeamProgress);
    }

    public function correctAnswer($teamProgressId){
        $TeamProgress = TeamProgress::find($teamProgressId);
        $TeamProgress->update([
            'team_id'           => $TeamProgress->team_id,
            'question_id'       => $TeamProgress->question_id,
            'team_answer_id '   => $TeamProgress->team_answer_id,
            'points'            => $TeamProgress->points,
            'status'            => 'Nagekeken',
        ]);

        return Redirect::to('/dashboard/team/'. $TeamProgress->team->id);
    }

    public function inCorrectAnswer($teamProgressId){
        $TeamProgress = TeamProgress::find($teamProgressId);
        $TeamProgress->update([
            'team_id'           => $TeamProgress->team_id,
            'question_id'       => $TeamProgress->question_id,
            'team_answer_id '   => $TeamProgress->team_answer_id,
            'points'            => 0,
            'status'            => 'Nagekeken',
        ]);

        return Redirect::to('/dashboard/team/'. $TeamProgress->team->id);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
