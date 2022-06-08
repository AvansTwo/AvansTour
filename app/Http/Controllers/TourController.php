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
        $tours = Tour::paginate(6);
        $categories = Category::all();
        return view('tour.index')->with('tours', $tours)->with('categories', $categories);
    }

    public function categoryFilter($id)
    {
        $tours = Tour::where("category_id", $id)->paginate(6);
        $categories = Category::all();
        return view('tour.index')->with('tours', $tours)->with('categories', $categories);
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
        $file = $request->file('image_url');
        $filename= date('YmdHis').$file->getClientOriginalName();

        $tour = new Tour();

        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->image_url = $filename;
        $tour->location = $request->location;
        $tour->category_id = $request->category_id;
        $tour->user_id = 1;

        $tour->save();

        $file-> move(public_path('tourimg'), $filename);

        Session::flash('SuccessMessage','Tour is succesvol aangemaakt, voeg nu vragen toe!');
        return Redirect::to('/speurtochten/'. $tour->id .'/vragen/aanmaken');
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

        $coords = explode(',', $tour->location);

        if (count($coords) >= 2) {
            return view('tour.detail', [
                'tour' => $tour,
                'lat' => trim($coords[0]),
                'long' => trim($coords[1])
            ]);
        } else {
            return view('tour.detail', [
                'tour' => $tour
            ]);
        }
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

        return view('tour.edit')->with('tour', $tour)->with('categories', $catgories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $tour = Tour::find($id);

        $filename = $tour->image_url;
        $file = $request->file('image_url');
        if(!empty($file)){
            if(\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = date('YmdHis').$file->getClientOriginalName();
        }

        $tour->update([
            'name'          =>  $request->name,
            'description'   =>  $request->description,
            'image_url'     =>  $filename,
            'location'      =>  $request->location,
            'category_id'   =>  $request->category_id,
            'user_id'       =>  $request->user_id,
        ]);

        $file-> move(public_path('tourimg'), $filename);

        Session::flash('SuccessMessage','Tour is succesvol aangepast');
        return Redirect::to('/speurtochten/'. $tour->id);
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

        if(\File::exists(public_path('tourimg/' . $tour->image_url))) {
            \File::delete(public_path('tourimg/' . $tour->image_url));
        }

        $tour->delete();

        Session::flash('SuccessMessage','Tour is succesvol verwijderd');
        return redirect('/speurtochten');
    }
}
