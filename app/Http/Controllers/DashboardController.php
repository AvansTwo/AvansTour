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
use Illuminate\Pagination\Paginator;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = DB::table('team')
                    ->join('team_progress', 'team.id', '=', 'team_progress.team_id')
                    ->join('tour', 'tour.id', '=', 'team.tour_id')
                    ->select('team.team_name', 'team.id', 'tour.name','team.end_time')
                    ->where('team_progress.status', '=', "Afwachting")
                    ->whereNotNull('team_progress.team_id')
                    ->groupBy('team.team_name', 'team.id', 'tour.name')
                    ->paginate(3);


        foreach($teams as $team) {
            $teamProgress = DB::select(DB::raw("SELECT * 
            FROM team_progress AS tp
            INNER JOIN tour_question AS tq ON tp.question_id = tq.question_id
            INNER JOIN question AS q ON tq.question_id = q.id
            INNER JOIN tour AS t ON tq.tour_id = t.id
            WHERE tp.status = 'Afwachting'
            AND tp.team_id = :team_id
            AND t.name = :tour_name;"
            ), array(
                'team_id' => $team->id,
                'tour_name' => $team->name,
            ));

            $team->progress = TeamProgress::hydrate($teamProgress);

            foreach($team->progress as $progress){
                $progress->answer = TeamAnswer::find($progress->team_answer_id);

                if($progress->answer->is_file){
                    $progress->answer->answer = StorageController::get($progress->answer->answer);
                }

                if($progress->question->image_url != null){
                    $progress->question->image_url = StorageController::get($progress->question->image_url);
                }
            }
        }

        

        return view('dashboard.index')->with('teams', $teams);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterName(Request $request)
    {
        $teams = DB::table('team')
                    ->join('team_progress', 'team.id', '=', 'team_progress.team_id')
                    ->join('tour', 'tour.id', '=', 'team.tour_id')
                    ->select('team.team_name', 'team.id', 'tour.name', 'team.end_time')
                    ->where('team_progress.status', '=', "Afwachting")
                    ->where('team.team_name', 'LIKE', '%'.$request->teamString.'%')
                    ->whereNotNull('team_progress.team_id')
                    ->groupBy('team.team_name', 'team.id', 'tour.name')
                    ->paginate(3);

        foreach($teams as $team) {
            $teamProgress = DB::select(DB::raw("SELECT * 
            FROM team_progress AS tp
            INNER JOIN tour_question AS tq ON tp.question_id = tq.question_id
            INNER JOIN question AS q ON tq.question_id = q.id
            INNER JOIN tour AS t ON tq.tour_id = t.id
            WHERE tp.status = 'Afwachting'
            AND tp.team_id = :team_id
            AND t.name = :tour_name;"
            ), array(
                'team_id' => $team->id,
                'tour_name' => $team->name,
            ));

            $team->progress = TeamProgress::hydrate($teamProgress);

            foreach($team->progress as $progress){
                $progress->answer = TeamAnswer::find($progress->team_answer_id);

                if($progress->answer->is_file){
                    $progress->answer->answer = StorageController::get($progress->answer->answer);
                }

                if($progress->question->image_url != null){
                    $progress->question->image_url = StorageController::get($progress->question->image_url);
                }
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
