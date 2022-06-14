<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Team;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ScoreboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $results = Team::With('tour')
            ->paginate(15);

        $categories = Category::all();

        $totalTime = null;

        if (isset($results->end_time)) {
            $totalTime = $results->start_time->diff($results->end_time);
        } else {
            $totalTime = $results->start_time->diff(new DateTime('now'));
        }

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

    public function tourFilter($tourId)
    {
        //
    }

    public function teamFilter(Request $request)
    {
        $results = Team::where('team_name', 'like', '%' . $request->teamString . '%')
            ->with('Tour')
            ->paginate(15);

        return view('scoreboard.index', [
            'results' => $results,
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
