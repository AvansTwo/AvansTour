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
        $teams = DB::select('SELECT team.team_name, team.id AS team_id, tour.name AS tour_name
                            from team
                            left join team_progress on team_progress.team_id = team.id
                            left join tour on tour.id = team.tour_id
                            WHERE team_progress.status = "Afwachting"
                            AND team_progress.team_id IS NOT NULL
                            GROUP BY team.team_name, team.id, tour.name');

        foreach($teams as $team) {
            $team->progress = TeamProgress::join('question', 'question.id', '=', 'team_progress.question_id')
                                ->join('tour', 'tour.id', '=', 'question.tour_id')
                                ->where([
                                    'team_progress.status' => 'Afwachting',
                                    'team_progress.team_id' => $team->team_id, 
                                    'tour.name' => $team->tour_name,
                                ])->get();

            foreach($team->progress as $progress){
                $progress->answer = TeamAnswer::find($progress->team_answer_id);
            }
        }

        return view('dashboard.index')->with('teams', $teams);
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
        //
    }

    public function correctAnswer($teamId, $questionId){
        $TeamProgress = TeamProgress::where([
            'team_id' => $teamId,
            'question_id' => $questionId,
        ])->first();

        TeamProgress::where([
            'team_id'           => $teamId,
            'question_id'       => $questionId,
        ])->update([
            'points'            => $TeamProgress->points,
            'status'            => 'Nagekeken',
        ]);

        return Redirect::to('/dashboard');
    }

    public function inCorrectAnswer($teamId, $questionId){
        TeamProgress::where([
            'team_id'           => $teamId,
            'question_id'       => $questionId,
        ])->update([
            'points'            => 0,
            'status'            => 'Nagekeken',
        ]);

        return Redirect::to('/dashboard');
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
