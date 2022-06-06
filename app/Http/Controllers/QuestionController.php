<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $question = new Question();
        $tourID = $request->tourID;

        $file = $request->file('questionImg');
        $filename= date('YmdHi').$file->getClientOriginalName();

        $question->title = $request->questionTitle;
        $question->description = $request->questionDesc;
        $question->image_url = $filename;
        $question->video_url = $request->questionVideo;
        $question->gps_location = $request->questionLocation;
        $question->points = $request->questionPoints;
        $question->tour_id = $tourID;

        $question->save();

        $file-> move(public_path('tourimg'), $filename);

        $questionID = $question->id;

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
        Session::flash('SuccessMessage','Vraag is succesvol toegevoegd');
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
        return view('question.detail')->with('question', $question);
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
        return view('question.edit')->with('question', $question);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        $question->delete();

        $tour = Tour::find($question->tour_id);

        Session::flash('SuccessMessage','Vraag is succesvol verwijderd');
        return view('tour.detail')->with('tour', $tour);
    }
}
