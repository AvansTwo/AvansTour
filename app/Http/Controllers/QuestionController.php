<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Tour;
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

        $filename = $question->questionImg;
        $file = $request->file('questionImg');
        if(!empty($file)){
            if(\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = date('YmdHis').$file->getClientOriginalName();
        }

        $question->title = $request->questionTitle;
        $question->description = $request->questionDesc;
        $question->image_url = $filename;
        $question->video_url = $request->questionVideo;
        $question->gps_location = $request->questionLocation;
        $question->points = $request->questionPoints;
        $question->tour_id = $tourID;

        $question->save();

        if(!empty($file)){
            $file-> move(public_path('tourimg'), $filename);
        }

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
        $question = Question::find($id);

        $filename = $question->image_url;
        $file = $request->file('image_url');
        if(!empty($file)){
            if(\File::exists(public_path('tourimg/' . $filename))) {
                \File::delete(public_path('tourimg/' . $filename));
            }
            $filename = date('YmdHis').$file->getClientOriginalName();
        }

        if(!empty($request->questionVideo)){
            if(\File::exists(public_path('tourimg/' . $question->image_url))) {
                \File::delete(public_path('tourimg/' . $question->image_url));
            }
            $filename = null;
        }

        $question->update([
            'title'         => $request->questionTitle,
            'description'   => $request->questionDesc,
            'image_url'     => $filename,
            'video_url'     => $request->questionVideo,
            'gps_location'  => $request->questionLocation,
            'points'        => $request->questionPoints,
        ]);

        if(!empty($file)){
            $file-> move(public_path('tourimg'), $filename);
        }

        $answers = DB::table('answer')->where('question_id', $question->id)->get();

        foreach($answers as $answer){
            $newAnswer = Answer::find($answer->id);
            $correct = 0;
            if($request->questionCorrectAnswer == $answer->id){
                $correct = 1;
            }

            $questionAnswer = request()->get($answer->id);

            $newAnswer->update([
                'answer'            => $questionAnswer,
                'correct_answer'    => $correct,
            ]);
        }

        Session::flash('SuccessMessage','Vraag is succesvol aangepast');
        return Redirect::to('/vragen/'. $question->id);
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

        if(\File::exists(public_path('tourimg/' . $question->image_url))) {
            \File::delete(public_path('tourimg/' . $question->image_url));
        }

        $question->delete();

        $tour = Tour::find($question->tour_id);

        Session::flash('SuccessMessage','Vraag is succesvol verwijderd');
        return view('tour.detail')->with('tour', $tour);
    }
}
