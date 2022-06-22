<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Tour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class QuestionController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($id)
    {
        $tour = Tour::find($id);
        return view('question.create')->with('tour', $tour);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreQuestionRequest $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $tourID = $request->tourID;

        $validator = Validator::make($request->all(), [
            'questionTitle'         => ['required', 'string', 'min:3', 'max:40'],
            'questionDesc'          => ['required', 'string', 'min:3', 'max:500'],
            'questionImg'           => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'dimensions:min_width=350,min_height=600'],
            'questionLocation'      => ['required', 'between:-180,180'],
            'questionPoints'        => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return redirect("/tour/". $tourID ."/vragen/aanmaken")->withErrors($validator)->withInput();
        }

        $question = new Question();

        $filename = $question->questionImg;
        $file = $request->file('questionImg');
        if (!empty($file)) {
            if (\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = date('YmdHis') . $file->getClientOriginalName();
        }

        $question->title = $request->questionTitle;
        $question->description = $request->questionDesc;
        $question->image_url = $filename;
        $question->gps_location = $request->questionLocation;
        $question->type = $request->typeRadio;
        $question->points = $request->questionPoints;
        $question->tour_id = $tourID;

        $question->save();

        if (!empty($file)) {
            $file->move(public_path('tourimg'), $filename);
        }

        $questionID = $question->id;

        if($request->typeRadio == 'Meerkeuze'){
            for($i = 1; $i <= 4; $i++){
                $answer = new Answer();
                $answer->answer = $request->$i;
                if($request->questionCorrectAnswer == $i){
                    $answer->correct_answer = 1;
                } else{
                    $answer->correct_answer = 0;
                }
                $answer->question_id = $questionID;
                $answer->save();
            }
        }

        Session::flash('Checkmark','Vraag is succesvol toegevoegd');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $question = Question::find($id);

        $questionLocation = array((object) [
            "gps_location" => $question->gps_location
        ]);

        return view('question.detail')->with('question', $question)->with('questionLocation', $questionLocation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $question = Question::find($id);

        $questionLocation = array((object) [
            "gps_location" => $question->gps_location
        ]);

        return view('question.edit')->with('question', $question)->with('questionLocation', $questionLocation);
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
        $question = Question::find($id);

        $filename = $question->image_url;
        $file = $request->file('image_url');
        if (!empty($file)) {
            if (\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = date('YmdHis') . $file->getClientOriginalName();
        }



        $question->update([
            'title'         => $request->questionTitle,
            'description'   => $request->questionDesc,
            'image_url'     => $filename,
            'gps_location'  => $request->questionLocation,
            'points'        => $request->questionPoints,
        ]);

        if (!empty($file)) {
            $file->move(public_path('tourimg'), $filename);
        }

        $answers = DB::table('answer')->where('question_id', $question->id)->get();

        foreach ($answers as $answer) {
            $newAnswer = Answer::find($answer->id);
            $correct = 0;
            if ($request->questionCorrectAnswer == $answer->id) {
                $correct = 1;
            }

            $questionAnswer = request()->get($answer->id);

            $newAnswer->update([
                'answer'            => $questionAnswer,
                'correct_answer'    => $correct,
            ]);
        }

        Session::flash('Checkmark','Vraag is succesvol aangepast');
        return Redirect::to('/vragen/' . $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $tour = Tour::find($question->tour_id);

        if (\File::exists(public_path('tourimg/' . $question->image_url))) {
            \File::delete(public_path('tourimg/' . $question->image_url));
        }

        $question->delete();

        Session::flash('Checkmark','Vraag is succesvol verwijderd');
        return Redirect::to('/tour/' . $tour->id);
    }
}
