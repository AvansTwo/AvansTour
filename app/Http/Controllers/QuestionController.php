<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StorageController;
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

    public function copy($tourId, $questionId)
    {
        $currentTour = Tour::find($tourId);
        $tours = Tour::all();
        $question = Question::find($questionId);
        return view('question.copy')->with('question', $question)->with('currentTour', $currentTour)->with('tours', $tours);
    }

    public function storeCopy(Request $request, $tourId, $questionId)
    {
        $data = $request->except('_token');
        foreach ($data as $key) {
            $tourQuestion = new TourQuestion();
            $tourQuestion->tour_id = $key;
            $tourQuestion->question_id = $questionId;
            $tourQuestion->save();
        }

        Session::flash('Checkmark','Vraag is succesvol gekopieerd');
        return Redirect::to('/tour/' . $tourId);
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
           $do_filepath = StorageController::upload($file, 'Question-images');
        }
        $validated['image_url'] = $do_filepath ?? null;

        $question = new Question($validated);

        $question->save();


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

        if($question->image_url != null){
            $question->image_url = StorageController::get($question->image_url);
        }

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

        if($question->image_url != null){
            $question->image_url = StorageController::get($question->image_url);
        }

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
    public function update(StoreQuestionRequest $request, $tourId, $questionId)
    {
        $validated = $request->validated();

        $question = Question::find($questionId);
        $tour = Tour::find($tourId);

        $filename = $question->image_url;
        $file = $request->file('image_url');
        if (!empty($file)) {
            if($question->image_url != null){
                StorageController::delete($question->image_url);
            }
            $filename = StorageController::upload($file, 'Question-images');
        } else {
            if($request->removeImage == 1){
                StorageController::delete($question->image_url);
                $filename = null;
            }
        }

        $question->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'type'          => $request->type,
            'image_url'     => $filename,
            'gps_location'  => $request->gps_location,
            'points'        => $request->points,
        ]);

        $answers = DB::table('answer')->where('question_id', $question->id)->get();

        if($request->type == 'Meerkeuze' && $answers->isEmpty()){
            for($i = 1; $i <= 4; $i++){
                $answer = new Answer();
                $answer->answer = $request->$i;
                if($request->questionCorrectAnswer == $i){
                    $answer->correct_answer = 1;
                } else{
                    $answer->correct_answer = 0;
                }
                $answer->question_id = $questionId;
                $answer->save();
            }
        } else if ($request->type != "Meerkeuze" && $answers->isNotEmpty()){
            foreach ($answers as $answer) {
                $deleteAnswer = Answer::find($answer->id);
                $deleteAnswer->delete();
            }
        }
        else{
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

        if($question->image_url != null) {
            StorageController::delete($question->image_url);
        }

        $question->delete();

        Session::flash('Checkmark','Vraag is succesvol verwijderd');
        return Redirect::to('/tour/' . $tour->id);
    }
}
