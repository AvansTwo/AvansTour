@extends('layouts.app')
@section('title', 'Quiz aanmaken')
@section('content')

@extends('layouts.app')
@section('title', 'Quiz aanmaken')
@section('content')

<div class="container">
    <div class="col-12">
        <h1 class="my-5 text-center">Quiz</span> beëindigd!</h1>
    </div>
    <div class="py-5 grey-bg col-12">
        <div class="row quiz-title">
            <div class="d-flex mt-3">
                <i class="fa-solid fa-star quiz-icon col-3"></i>
                <h1 class="my-5 text-center col-4">Team <span class="title-colored">{{$team->team_name}}</span></h1>
                <i class="fa-solid fa-star quiz-icon col-3"></i>
            </div>
        </div>
        <hr>
        <h2 class="quiz-info"> Punten: <span class="quiz-colored">{{$points}}</span></h2>
        <h2 class="quiz-info"> Vragen beantwoord: <span class="quiz-colored">{{$teamQuestion}}</span></h2>
        <h2 class="quiz-info"> Minuten over gedaan: <span class="quiz-colored">{{$difference}}</span></h2>
        <hr>
        <div class="row quiz-title">
            <div class="d-flex mt-3">
                <i class="fa-solid fa-star quiz-icon col-3"></i>
                <h1 class="my-5 text-center col-4">Team <span class="title-colored">{{$team->team_name}}</span></h1>
                <i class="fa-solid fa-star quiz-icon col-3"></i>

            </div>
        </div>
        <div class="quiz-title">
            <a class="btn primary-btn" href="/speurtochten/1"><i class="fa-solid fa-chevron-left"></i> Ga
                terug</a>
        </div>
    </div>
</div>


@endsection

@endsection