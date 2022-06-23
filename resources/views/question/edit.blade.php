@extends('layouts.app')
@section('title', 'Vraag aanpassen')
@section('content')
    <div class="container" onload="checkType({{$question->type}})">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Tour vraag <span class="title-colored">aanpassen</span></h1>
            </div>
            <div class="col-12 mb-5">
                <form class="needs-validation py-5 grey-bg" novalidate action="/vragen/aanpassen/{{$question->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-row">
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionTitle" class="mb-1 fw-bold">Titel vraag</label>
                            <input type="text" name="questionTitle" class="form-control" id="questionTitle" value="{{$question->title}}" placeholder="Klaslokalen" required>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionDesc" class="mb-1 fw-bold">Omschrijving vraag</label>
                            <input type="text" name="questionDesc" class="form-control" id="questionDesc" value="{{$question->description}}" placeholder="Hoeveel klaslokalen telt het gebouw LA in totaal?" required>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionPoints" class="mb-1 fw-bold">Aantal punten vraag</label>
                            <input type="number" name="questionPoints" id="typeNumber" class="form-control" value="{{$question->points}}" placeholder="10" required min="1" max="100"/>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionLocation" class="mb-1 fw-bold">Locatie vraag</label>

                            <div id="map">
                            <x-leaflet-map centerpoint="{{$question->gps_location}}" :markers="$questionLocation" mapCallback="mapPickLocation" markerCallback="relocateQuestion"></x-leaflet-map>
                            <div id="locationChanged" class="alert alert-success d-none mb-0 py-1" role="alert">Locatie veranderd!</div>
                            <br>
                            </div>

                            <div class="input-group">
                            <div class="input-group-prepend" onclick="showMap()">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                                </div>
                                <input type="text" class="form-control" name="questionLocation" value="{{$question->gps_location}}" id="questionLocation" placeholder="51.58604484973112, 4.7923486528026755" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                        <div id="questionImgWrapper" class="col-10 mx-auto mb-5 @if(empty($question->image_url)) d-none @endif">
                            <label for="questionImg" class="mb-1 fw-bold">Foto vraag</label>
                            <input class="form-control d-none" @if(!empty($question->image_url)) disabled  @endif name="image_url" type="file" id="questionImg">
                            @if(!empty($question->image_url))
                            <div id="tour-img-wrapper" class="wrapper">
                                <img id="questionPhoto" class="img-fluid img-thumbnail" src="{{ asset('tourimg/'. $question->image_url) }}" alt="tour-img">
                                <button onclick="removeQuestionImage()" type="reset" id="tour-img-btn" class="btn create-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            @endif
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            @foreach($question->answer as $answer)
                                <label for="questionAnswer1" class="mb-1 fw-bold">Antwoord {{ $loop->index+1 }}</label>
                                <div class="input-group mb-3">
                                    <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" @if($answer->correct_answer > 0) checked @endif type="radio" required value="{{$answer->id}}" id="questionCorrectAnswer">
                                    <input name="{{$answer->id}}" id="{{$answer->id}}" type="text" value="{{$answer->answer}}" class="form-control" required>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                        <a class="btn primary-btn mt-3" href="/vragen/{{$question->id}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                        <button class="btn primary-btn secondary-btn mt-3" type="submit">Opslaan <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
