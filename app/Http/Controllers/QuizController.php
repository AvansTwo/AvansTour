<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamProgress\StoreTeamProgressRequest;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Settings;
use App\Models\Team;
use App\Models\Answer;
use App\Models\TeamProgress;
use App\Models\TeamAnswer;
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

        for ($i = 1; $i <= $request->amount_players; $i++) {
            $participant = new Participants();

            $participant->name = request()->get('member_' . $i);
            $participant->team_id = $team->id;

            $participant->save();
        }

        return Redirect::to('/quiz/spelen/' . $team->team_identifier);
    }
    public function storeTeamProgress(StoreTeamProgressRequest $request, $teamHash, $questionId)
    {
        $team = DB::table('team')->where('team_identifier', $teamHash)->first();
        $is_file = 0;

        $question = Question::where('id', $questionId)->first();
        $team_answer = new TeamAnswer();
        switch ($question->type) {
            case "Meerkeuze":
                $team_answer->answer = $request->teamAnswerMC;
                break;
            case "Open":
                $team_answer->answer = $request->teamAnswerOpen;
                break;
            case "Media":
                $filename = $question->teamAnswerMedia;
                $file = $request->file('teamAnswerMedia');
                if (!empty($file)) {
                    $filename = StorageController::upload($file, 'Team-images');
                    $is_file = 1;
                }

                $team_answer->answer = $filename;
                $team_answer->is_file = $is_file;
                break;
        }
        $team_answer->save();

        $team_progress = new TeamProgress();
        $points = 0;
        $status = "";

        if ($question->type == 'Meerkeuze') {
            $answer = Answer::where('question_id', $questionId)->where('correct_answer', 1)->first();
            if ($answer->answer == $request->teamAnswerMC) {
                $points = $question->points;
            }
            $status = "Nagekeken";
        } else {
            $points = $question->points;
            $status = "Afwachting";
        }

        $team_progress->team_id         = $team->id;
        $team_progress->question_id     = $questionId;
        $team_progress->team_answer_id  = $team_answer->id;
        $team_progress->points          = $points;
        $team_progress->status          = $status;
        $team_progress->save();

        return Redirect::to('/quiz/spelen/' . $team->team_identifier);
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
        if($question->image_url != null){
            $question->image_url = StorageController::get($question->image_url);
        }
        return view('quiz.answer')->with('question', $question)->with('teamHash', $teamHash);
    }
    public function quizEnding($teamHash)
    {
        Team::where('team_identifier', $teamHash)
            ->update([
                'end_time' => Carbon::now()
            ]);

        $team = DB::table('team')->where('team_identifier', $teamHash)->first();
        $points = TeamProgress::where('team_id', $team->id)->sum('points');
        $teamQuestion = TeamProgress::where('team_id', $team->id)->count('question_id');
        $teamUpdated = DB::table('team')->where('id', $team->id)->first();
        $start_time = Carbon::parse($teamUpdated->start_time);
        $end_time = Carbon::parse($teamUpdated->end_time);
        $difference = $start_time->diff($end_time)->format('%H:%I:%S');;
        return view('quiz.end')->with('team', $teamUpdated)->with('teamQuestion', $teamQuestion)->with('points', $points)->with('difference', $difference);
    }

    public function getRemainingQuestions($teamHash)
    {
        $team = DB::table('team')->where('team_identifier', $teamHash)->first();
        $tour = Tour::find($team->tour_id);

        $tour_id = $tour->id;
        $team_id = $team->id;

        $tour = Tour::find($tour_id);
        $questions = DB::select(DB::raw('SELECT q.id, q.gps_location, q.points, :team_hash AS team_hash
        FROM tour_question AS tq
        INNER JOIN question AS q ON tq.question_id = q.id
        INNER JOIN tour AS t ON tq.tour_id = t.id
        WHERE t.id = :tourid
        AND q.id NOT IN (
            SELECT tp.question_id
            FROM team_progress AS tp
            INNER JOIN tour_question AS tq ON tp.question_id = tq.question_id
            WHERE tp.team_id = :team_id
            AND tq.tour_id = :tour_id
        );'), array(
            'team_hash' => $teamHash,
            'tourid' => $tour_id,
            'tour_id' => $tour_id,
            'team_id' => $team_id
        ));
        $radius = Settings::find(1);
        if (empty($radius)) {
            $setting = new Settings();
            $setting->save();
            $radius = Settings::find(1);
        }
        $amount = count($questions);
        return view('quiz.pick')->with('tour', $tour)->with('remainingQuestions', $questions)->with('teamHash', $teamHash)->with('amount', $amount)->with('radius', $radius->radius);
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
