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

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $tours = Tour::paginate(6);
        $categories = Category::all();
        return view('tour.index')->with('tours', $tours)->with('categories', $categories)->with('filtered', FALSE);
    }

    public function categoryFilter($id)
    {
        $tours = Tour::where("category_id", $id)->paginate(6);
        $filteredCategory = Category::find($id);
        $categories = Category::all();
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
        $validated = Validator::make($request->all(), [
            'name'          => ['required', 'string', 'min:3', 'max:40', "unique:tour,name"],
            'description'   => ['required', 'string', 'min:3', 'max:100'],
            'image_url'     => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:12288', 'dimensions:min_width=854,min_height=480,max_width=3840,max_height=2160'],
            'location'      => ['required', 'between:-180,180'],
            'category_id'   => ['required', 'integer'],
        ]);

        $file = $validated['image_url'] ?? $request->file('image_url');
        if (!empty($file)) {
            $filename = date('YmdHis') . $file->getClientOriginalName();
        }

        $validated['image_url'] = $filename ?? null;

        $tour = new Tour($validated);
        $tour->user_id = Auth::user()->id;

        $tour->save();

        if (!empty($file)) {
            $file->move(public_path('tourimg'), $filename);
        }

        Session::flash('Checkmark', 'Tour is succesvol aangemaakt, voeg nu vragen toe!');
        return Redirect::to('/tour/' . $tour->id . '/vragen/aanmaken');
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
            if (\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = date('YmdHis') . $file->getClientOriginalName();
        } else if(empty($file) && $request->removeImage == 1){
            $filename = $tour->image_url;
            if (\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = null;
        }

        $tour->update([
            'name'          =>  $validated['name'],
            'description'   =>  $validated['description'],
            'image_url'     =>  $filename,
            'location'      =>  $validated['location'],
            'category_id'   =>  $validated['category_id'],
            'user_id'       =>  $validated['user_id'],
        ]);

        if (!empty($file)) {
            $file->move(public_path('tourimg'), $filename);
        }

        Session::flash('Checkmark', 'Tour is succesvol aangepast');
        return Redirect::to('/tour/' . $tour->id);
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

        if (\File::exists(public_path('tourimg/' . $tour->image_url))) {
            \File::delete(public_path('tourimg/' . $tour->image_url));
        }

        $tour->delete();

        Session::flash('Checkmark', 'Tour is succesvol verwijderd');
        return redirect('/tours');
    }
}
