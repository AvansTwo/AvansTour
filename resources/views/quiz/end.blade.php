@extends('layouts.app')
@section('title', 'Quiz aanmaken')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-12">
            <h1 class="my-5 text-center">Tour</span> beëindigd!</h1>
        </div>

        <div class="row grey-bg p-5">

            <div class="col-12 col-lg-8">

                <div class="col-12 quiz-title d-flex">
                        <h1 class="my-5">Team: <span class="title-colored">{{$team->team_name}}</span></h1>
                </div>

                <div class="col-12 d-flex mt-4">
                    <i class="fa-solid fa-award question-icon-mark"></i>
                    <h2 class="quiz-info">Punten: <span class="quiz-colored">{{$points}}</span></p>
                </div>

                <div class="col-12 d-flex mt-4">
                    <i class="fa-solid fa-certificate question-icon-mark"></i>
                    <h2 class="quiz-info">Vragen beantwoord: <span class="quiz-colored">{{$teamQuestion}}</span></h2>
                </div>

                <div class="col-12 d-flex mt-4">
                    <i class="fa-solid fa-hourglass question-icon-mark"></i>
                    <h2 class="quiz-info">Minuten over gedaan: <span class="quiz-colored">{{$difference}}</span></h2>
                </div>

                <div class="quiz-title mt-4">
                    <a class="btn primary-btn" href="/scoreboard"><i class="fa-solid fa-ranking-star"></i> Scoreboard</a>
                </div>

            </div>

            <div class="col-12 col-lg-4">
                <img class="img-fluid" src="{{ asset('img/man.png') }}" alt="landing-image">
            </div>

        </div>
    </div>
</div>

@endsection
