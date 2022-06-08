<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Team;
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

        return Redirect::to('/quiz/play/'.$team->team_identifier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function play($id)
    {
        $team = DB::table('team')->where('team_identifier', $id)->first();
        $tour = Tour::find($team->tour_id);
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
        $tour = Tour::find($team->tour_id);
        return view('quiz.end')->with('team', $team)->with('tour', $tour);
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
