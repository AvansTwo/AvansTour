<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Team;
use App\Models\Answer;
use App\Models\TeamProgress;
use App\Models\Question;
use App\Models\Participants;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $tour = Tour::find($id);
        return view('quiz.create')->with('tour', $tour);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Team();

        $team->team_name = $request->team_name;
        $team->start_time = Carbon::now();
        $team->end_time = null;
        $team->team_identifier = $randomString = Str::random(30);
        $team->tour_id = $request->tour_id;

        $team->save();

        for($i = 1; $i <= $request->amount_players; $i++){
            $participant = new Participants();

            $participant->name = request()->get('member_'.$i);
            $participant->team_id = $team->id;

            $participant->save();
        }

        return Redirect::to('/quiz/spelen/'.$team->team_identifier);
    }
    public function storeTeamProgress(Request $request, $teamHash, $questionId)
    {
        $team = DB::table('team')->where('team_identifier', $teamHash)->first();

        $team_progress = new TeamProgress();
        $points = 0;
        $answer = Answer::where('question_id', $questionId)->where('correct_answer', 1 )->first();
        if($answer->id == $request->teamAnswer){
            $question = Question::find($questionId);
            $points = $question->points;
        }
        $team_progress->team_id         = $team->id;
        $team_progress->question_id     = $questionId;
        $team_progress->answer_id       = $request->teamAnswer;
        $team_progress->points          = $points;
        $team_progress->save();

        return Redirect::to('/quiz/spelen/'. $team->team_identifier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getQuestion($teamHash, $questionId)
    {
        $question = Question::where('id', $questionId)->first();
        return view('quiz.answer')->with('question', $question)->with('teamHash', $teamHash);
    }
    public function quizEnding($teamHash)
    {
        $team = DB::table('team')->where('team_identifier', $teamHash)->first();
        $affected = DB::table('team')
              ->where('id', $team->id)
              ->update(['end_time' => Carbon::now()]);
        $points = TeamProgress::where('team_id', $team->id)->sum('points');
        $teamQuestion = TeamProgress::where('team_id', $team->id)->count('question_id');
        $teamUpdated = DB::table('team')->where('id', $team->id)->first();
        $start_time = Carbon::parse($teamUpdated->start_time); 
        $end_time = Carbon::parse($teamUpdated->end_time); 
        $difference = $start_time->diffInMinutes($end_time);
        return view('quiz.end')->with('team', $teamUpdated)->with('teamQuestion', $teamQuestion)->with('points', $points)->with('difference', $difference);
    }

    public function getRemainingQuestions($teamHash) {
        $team = DB::table('team')->where('team_identifier', $teamHash)->first();
        $tour = Tour::find($team->tour_id);

        $tour_id = $tour->id;
        $team_id = $team->id;

        $tour = Tour::find($tour_id);
        $questions = DB::select(DB::raw('SELECT q.id, q.gps_location, :team_hash AS team_hash FROM question AS q WHERE tour_id = :tourid AND q.id NOT IN ( SELECT question_id FROM team_progress AS tp INNER JOIN question ON tp.question_id = question.id WHERE question.tour_id = :tour_id AND team_id = :team_id)'), array(
            'team_hash' => $teamHash,
            'tourid' => $tour_id,
            'tour_id' => $tour_id,
            'team_id' => $team_id
        ));

        return view('quiz.pick')->with('tour', $tour)->with('remainingQuestions', $questions)->with('teamHash', $teamHash);
    }

    public function endQuiz($teamHash)
    {
        $team = DB::table('team')->where('team_identifier', $teamHash)->first();
        return view('quiz.answer')->with('team', $team);
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

    public function end($id) 
    {
        $team = DB::table('team')->where('team_identifier', $id)->first();
        $progress = DB::table('team_progress')->where('team_id', $id)->first();
        $tour = Tour::find($team->tour_id);

        $total_points = $progress->points;

        return view('quiz.end')->with('tour', $tour)->with('total_points', $total_points)->with('team', $team);
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
