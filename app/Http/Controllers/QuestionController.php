<?php

namespace App\Http\Controllers;

use App\Http\Requests\Question\StoreQuestionRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Tour;
use App\Models\TourQuestion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
     * @return Application|Factory|View
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
    public function store($id, StoreQuestionRequest $request)
    {
        $validated = $request->validated();

        $file = $validated['image_url'] ?? $request->file('image_url');
        if (!empty($file)) {
            $filename = date('YmdHis') . $file->getClientOriginalName();
        }
        $validated['image_url'] = $filename ?? null;

        $question = new Question($validated);

        $question->save();

        if (!empty($file)) {
            $file->move(public_path('tourimg'), $filename);
        }

        $questionID = $question->id;

        if($request->type == 'Meerkeuze'){
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

        $tourQuestion = new TourQuestion();
        $tourQuestion->tour_id = $id;
        $tourQuestion->question_id = $questionID;
        $tourQuestion->save();

        Session::flash('Checkmark','Vraag is succesvol toegevoegd');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
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
     * @return Application|Factory|View
     */
    public function edit($tourId, $questionId)
    {
        $question = Question::find($questionId);
        $tour = Tour::find($tourId);

        $questionLocation = array((object) [
            "gps_location" => $question->gps_location
        ]);

        return view('question.edit')->with('question', $question)->with('questionLocation', $questionLocation)->with('tour', $tour);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $tourId, $questionId)
    {
        $question = Question::find($questionId);
        $tour = Tour::find($tourId);

        $filename = $question->image_url;
        $file = $request->file('image_url');
        if (!empty($file)) {
            if (\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = date('YmdHis') . $file->getClientOriginalName();
        } else if(empty($file) && $request->removeImage == 1){
            $filename = $question->image_url;
            if (\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = null;
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
        return Redirect::to('/tour/' . $tour->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($tourId, $tourQuestion)
    {
        $question = TourQuestion::find($tourQuestion);
        $tour = Tour::find($tourId);

        $question->delete();

        Session::flash('Checkmark','Vraag is succesvol verwijderd');
        return Redirect::to('/tour/' . $tour->id);
    }
}
