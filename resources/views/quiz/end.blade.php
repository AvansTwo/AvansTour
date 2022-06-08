@extends('layouts.app')
@section('title', 'Quiz aanmaken')
@section('content')

<div class="container">
    <div class="col-12">
        <h1 class="my-5 text-center">Quiz <span class="title-colored">{{$tour->name}}</span> beëindigd!</h1>
    </div>
    <div class="py-5 grey-bg col-12">
        <div class="row quiz-title">
            <div class="d-flex mt-3">
                <i class="fa-solid fa-star quiz-icon col-3"></i>
                <h1 class="my-5 text-center col-4">Team <span class="title-colored">Name</span></h1>
                <i class="fa-solid fa-star quiz-icon col-3"></i>
            </div>
        </div>
        <hr>
        <h2 class="quiz-info"> Punten: <span class="quiz-colored">Points</span>!</h2>
        <h2 class="quiz-info"> Begin tijd: <span class="quiz-colored">Points</span>!</h2>
        <h2 class="quiz-info"> Eind tijd: <span class="quiz-colored">Points</span>!</h2>
        <hr>
        <div class="row quiz-title">
            <div class="d-flex mt-3">
                <i class="fa-solid fa-star quiz-icon col-3"></i>
                <h1 class="my-5 text-center col-4">Team <span class="title-colored">Name</span></h1>
                <i class="fa-solid fa-star quiz-icon col-3"></i>

            </div>
        </div>
        <div class="quiz-title">
            <a class="btn primary-btn" href="/speurtochten/{{$tour->id}}"><i class="fa-solid fa-chevron-left"></i> Ga
                terug</a>
        </div>
    </div>
</div>


@endsection