@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" onclick="location.href='/dashboard/team/{{$TeamProgress->team->id}}';"
                        class="btn primary-btn secondary-btn mt-5"><i class="fa-solid fa-chevron-left"></i> Ga terug
                </button>
            </div>
            <div class="col-12 mt-5">
                <h1>Beoordeel het volgende <span class="title-colored">antwoord</span></h1>
            </div>
            <div class="row grey-bg my-5 p-5">
                <div class="col-12 col-lg-6">
                    <h2>Vraag: {{$TeamProgress->question->description}}</h2>
                    <p><span class="title-colored">{{$TeamProgress->team->team_name}}</span> heeft als antwoord gegeven:</br>@if($TeamProgress->teamAnswer->is_file == 0) {{$TeamProgress->teamAnswer->answer}} @endif</p>
                </div>
                <div class="col-12 col-lg-6">
                    @if($TeamProgress->teamAnswer->is_file == 1)
                    <img class="img-fluid " src="{{ asset('teamimg/'.$TeamProgress->teamAnswer->answer) }}" alt="answer_image" >
                    @else
                    <img class="img-fluid " src="{{ asset('img/landing_img.png') }}" alt="landing-image" >
                    @endif
                </div>
                <div class="col-12 mt-5 mt-lg-0">
                    <button onclick="location.href='/dashboard/vraag/{{$TeamProgress->id}}/goed'"
                        class="btn create-btn mt-2">Goedkeuren <i class="fa-solid fa-check"></i>
                    </button>

                    <button onclick="JSalertCorrectAnswer()" class="btn create-btn delete-btn mt-2">
                        <a id="incorrect-answer-url" style="pointer-events: none" href="/dashboard/vraag/{{$TeamProgress->id}}/fout">Foutkeuren <i class="fa-solid fa-xmark"></i></a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
