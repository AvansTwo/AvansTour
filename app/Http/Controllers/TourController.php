<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tour\StoreTourRequest;
use App\Http\Requests\Tour\UpdateTourRequest;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        if(Auth::user()){
            $tours = Tour::paginate(6);
        } else{
            $tours = Tour::where("active", 1)->paginate(6);
        }
        $categories = Category::all();

        foreach($tours as $tour){
            if($tour->image_url != null){
                $tour->image_url = StorageController::get($tour->image_url);
            }
        }

        return view('tour.index')->with('tours', $tours)->with('categories', $categories)->with('filtered', FALSE);
    }

    public function categoryFilter($id)
    {
        if(Auth::user()){
            $tours = Tour::where("category_id", $id)->paginate(6);
        } else{
            $tours = Tour::where("category_id", $id)->where("active", 1)->paginate(6);
        }
        $filteredCategory = Category::find($id);
        $categories = Category::all();

        foreach($tours as $tour){
            if($tour->image_url != null){
                $tour->image_url = StorageController::get($tour->image_url);
            }
        }

        return view('tour.index')->with('tours', $tours)->with('categories', $categories)->with('filteredCategory', $filteredCategory);
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

        $file = $validated['image_url'] ?? $request->file('image_url');
        if (!empty($file)) {
            $do_filepath = StorageController::upload($file, 'Tour-images');
        }

        $validated['image_url'] = $do_filepath ?? null;

        $tour = new Tour($validated);
        $tour->user_id = Auth::user()->id;
        $tour->save();

        Session::flash('Checkmark', 'Tour is succesvol aangemaakt, voeg nu vragen toe!');
        return Redirect::to('/tour/' . $tour->id . '/vragen/aanmaken');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $id
     * @param Request $request
     * @return void
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $tour = Tour::find($id);

        if($tour->image_url != null){
            $tour->image_url = StorageController::get($tour->image_url);
        }


        $totalPoints = 0;
        foreach ($tour->tourQuestion as $tourQuestion) {
            $totalPoints += $tourQuestion->question->points;
        }

        $startLocation = array((object) [
            "gps_location" => $tour->location
        ]);

        return view('tour.detail')->with('tour', $tour)->with('startLocation', $startLocation)->with('totalPoints', $totalPoints);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $tour = Tour::find($id);
        $catgories = Category::all();
        $users = User::all();

        if($tour->image_url != null){
            $tour->image_url = StorageController::get($tour->image_url);
        }

        $startLocation = array((object) [
            "gps_location" => $tour->location
        ]);

        return view('tour.edit')->with('tour', $tour)->with('users', $users)->with('categories', $catgories)->with('startLocation', $startLocation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTourRequest $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(UpdateTourRequest $request, $id)
    {
        $validated = $request->validated();
        $tour = Tour::find($id);

        $filename = $tour->image_url;
        $file = $validated['image_url'] ?? $request->file('image_url');
        if (!empty($file)) {
            StorageController::delete($tour->image_url);
            $filename = StorageController::upload($file, 'Tour-images');
        } else if(empty($file) && $request->removeImage == 1){
            StorageController::delete($tour->image_url);
            $filename = null;
        }

        $active = 0;
        if(!empty($request->active)){
            $active = 1;
        }

        $tour->update([
            'name'          =>  $validated['name'],
            'description'   =>  $validated['description'],
            'image_url'     =>  $filename,
            'location'      =>  $validated['location'],
            'category_id'   =>  $validated['category_id'],
            'active'        =>  $active,
            'user_id'       =>  $validated['user_id'],
        ]);

        Session::flash('Checkmark', 'Tour is succesvol aangepast');
        return Redirect::to('/tour/' . $tour->id);
    }

    /**
     * Copy the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function copyTour (Request $request, $id)
    {
        $tour = Tour::find($id);
        $copyTour = $tour->replicate();
        $copyTour->name = $request->tourName;
        $copyTour->image_url = "";

        $copyTour->save();

        foreach ($tour->tourQuestion as $tourQuestion){
            $copyTourQuestion = $tourQuestion->replicate();
            $copyTourQuestion->tour_id = $copyTour->id;
            $copyTourQuestion->save();
        }

        Session::flash('Checkmark', 'Tour is succesvol gekopieerd');
        return Redirect::to('/tour/' . $copyTour->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function destroy($id)
    {
        $tour = Tour::find($id);


        if($tour->image_url != null) {
            StorageController::delete($tour->image_url);
        }

        $tour->delete();

        Session::flash('Checkmark', 'Tour is succesvol verwijderd');
        return redirect('/tours');
    }
}
