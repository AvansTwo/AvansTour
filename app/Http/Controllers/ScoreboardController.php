<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use App\Models\TeamProgress;
use App\Models\Tour;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ScoreboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $results = DB::table('team_progress')
            ->leftJoin('team', 'team_progress.team_id', '=', 'team.id')
            ->leftJoin('tour', 'team.tour_id', '=', 'tour.id')
            ->select(DB::raw('tour.id, tour.name, team.team_name, team.start_time, team.end_time, sum(team_progress.points) as points, TIMEDIFF(team.end_time, team.start_time) as timeDiff, DATEDIFF(team.end_time, team.start_time) as dateDiff'))
            ->groupBy('tour.id', 'tour.name', 'team.team_name', 'team.start_time', 'team.end_time')
            ->paginate(15);

        $categories = Category::all();

        return view('scoreboard.index', [
            'results' => $results,
            'categories' => $categories,
        ]);
    }

    public function sortPoints($sortId)
    {
        $filter = $sortId == 0 ? 'ASC' : 'DESC';

        $results = DB::table('team_progress')
            ->leftJoin('team', 'team_progress.team_id', '=', 'team.id')
            ->leftJoin('tour', 'team.tour_id', '=', 'tour.id')
            ->select(DB::raw('tour.id, tour.name, team.team_name, team.start_time, team.end_time, sum(team_progress.points) as points, TIMEDIFF(team.end_time, team.start_time) as timeDiff, DATEDIFF(team.end_time, team.start_time) as dateDiff'))
            ->groupBy('tour.id', 'tour.name', 'team.team_name', 'team.start_time', 'team.end_time')
            ->orderBy('points', $filter)
            ->paginate(15);

        $categories = Category::all();

        return view('scoreboard.index', [
            'results' => $results,
            'categories' => $categories,
        ]);
    }

    public function sortTime($sortId)
    {
        $filter = $sortId == 0 ? 'ASC' : 'DESC';

        $results = DB::table('team_progress')
            ->leftJoin('team', 'team_progress.team_id', '=', 'team.id')
            ->leftJoin('tour', 'team.tour_id', '=', 'tour.id')
            ->select(DB::raw('tour.id, tour.name, team.team_name, team.start_time, team.end_time, sum(team_progress.points) as points, TIMEDIFF(team.end_time, team.start_time) as timeDiff, DATEDIFF(team.end_time, team.start_time) as dateDiff'))
            ->groupBy('tour.id', 'tour.name', 'team.team_name', 'team.start_time', 'team.end_time')
            ->orderBy('timeDiff', $filter)
            ->orderBy('dateDiff', $filter)
            ->paginate(15);

        $categories = Category::all();

        return view('scoreboard.index', [
            'results' => $results,
            'categories' => $categories,
        ]);
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function categoryFilter($categoryFilter)
    {
        $results = DB::table('team_progress')
            ->leftJoin('team', 'team_progress.team_id', '=', 'team.id')
            ->leftJoin('tour', 'team.tour_id', '=', 'tour.id')
            ->select(DB::raw('tour.id, tour.name, tour.category_id, team.team_name, team.start_time, team.end_time, sum(team_progress.points) as points, TIMEDIFF(team.end_time, team.start_time) as timeDiff, DATEDIFF(team.end_time, team.start_time) as dateDiff'))
            ->where('category_id', '=', $categoryFilter)
            ->groupBy('tour.id', 'tour.name', 'tour.category_id', 'team.team_name', 'team.start_time', 'team.end_time')
            ->paginate(15);

        $categories = Category::all();

        return view('scoreboard.index', [
            'results' => $results,
            'categories' => $categories,
        ]);
    }

    public function teamFilter(Request $request)
    {
        $results = DB::table('team_progress')
            ->leftJoin('team', 'team_progress.team_id', '=', 'team.id')
            ->leftJoin('tour', 'team.tour_id', '=', 'tour.id')
            ->select(DB::raw('tour.id, tour.name, team.team_name, team.start_time, team.end_time, sum(team_progress.points) as points, TIMEDIFF(team.end_time, team.start_time) as timeDiff, DATEDIFF(team.end_time, team.start_time) as dateDiff'))
            ->where('team_name', 'like', '%' . $request->teamString . '%')
            ->groupBy('tour.id', 'tour.name', 'team.team_name', 'team.start_time', 'team.end_time')
            ->paginate(15);

        $categories = Category::all();

        return view('scoreboard.index', [
            'results' => $results,
            'categories' => $categories,
        ]);
    }

    public function dayFilter(Request $request) {

        $results = DB::table('team_progress')
            ->leftJoin('team', 'team_progress.team_id', '=', 'team.id')
            ->leftJoin('tour', 'team.tour_id', '=', 'tour.id')
            ->select(DB::raw('tour.id, tour.name, team.team_name, team.start_time, team.end_time, sum(team_progress.points) as points, TIMEDIFF(team.end_time, team.start_time) as timeDiff, DATEDIFF(team.end_time, team.start_time) as dateDiff'))
            ->where(DB::raw('CAST(team.start_time as date)'), '=', $request->datePicker)
            ->groupBy('tour.id', 'tour.name', 'team.team_name', 'team.start_time', 'team.end_time')
            ->paginate(15);

        $categories = Category::all();

        return view('scoreboard.index', [
            'results' => $results,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
