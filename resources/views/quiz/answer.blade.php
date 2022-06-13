@extends('layouts.app')
@section('title', 'Vraag beantwoorden')
@section('content')
<div class="container">
    <div class="col-12">
        <h1 class="my-5"><span class="title-colored">Beantwoord</span> de volgende vraag</h1>
    </div>
    <div class="row grey-bg my-5">
        <div class="col-12 col-lg-6 order-1 order-lg-6 p-5">
            <h1>{{$question->title}}</h1>
            <p>{{$question->description}}</p>
            <form class="needs-validation py-3 grey-bg" novalidate action="/quiz/spelen/{{$teamHash}}/vraag/{{$question->id}}/beantwoorden" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mx-auto mb-3">
                    @foreach($question->answer as $answer)
                        <label for="questionAnswer1" class="mb-1 fw-bold">Antwoord {{ $loop->index+1 }}</label>
                        <div class="input-group mb-3">
                            <input name="teamAnswer" class="form-check-input questionCheckbox" type="radio" required value="{{$answer->id}}">
                            <input name="answerInput" disabled type="text" readonly value="{{$answer->answer}}" class="form-control">
                        </div>
                    @endforeach
                </div>
                <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                    <a class="btn primary-btn mt-3" href="/quiz/spelen/{{$teamHash}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                    <button class="btn primary-btn secondary-btn mt-3" type="submit">Versturen <i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-6 order-6 order-lg-1 p-5">
            <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('tourimg/'. $question->image_url) }}" alt="tour-detail-img">
        </div>
    </div>
</div>
@endsection
