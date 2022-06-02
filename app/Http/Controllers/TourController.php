<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tour\StoreTourRequest;
use App\Models\Tour;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('tour.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = DB::table('category')->get();

        return view('tour.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTourRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTourRequest $request)
    {
        $validated = $request->validated();

        if ($validated->fails()) {
            return Redirect::to('tour.insert')
                ->withInput()
                ->withErrors($validated);
        }

        $file = $validated->file('image_url');
        $filename= date('YmdHi').$file->getClientOriginalName();

        $tour = new Tour();

        $tour->name = $validated->name;
        $tour->description = $validated->description;
        $tour->image_url = $filename;
        $tour->location = $validated->location;
        $tour->category_id = $validated->category_id;
        $tour->user_id = 1;

        $tour->save();

        $file-> move(public_path('tourimg'), $filename);

        Session::flash('tourSuccessful','Tour is succesvol aangemaakt!');
        return Redirect::to('speurtochten');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $tour = Tour::find($id);

        return view('tour.detail')->with('tour', $tour);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('tour.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
