@extends('layouts.app')
@section('title', 'Vraag aanpassen')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Vraag <span class="title-colored">aanpassen</span></h1>
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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                                </div>
                                <input type="text" class="form-control" name="questionLocation" value="{{$question->gps_location}}" id="questionLocation" placeholder="51.58604484973112, 4.7923486528026755" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>

                        <div class="col-8 col-lg-5 d-flex justify-content-between mx-auto mb-3">
                            <div class="form-check">
                                <input class="form-check-input" onclick="showImageInput()" type="radio" name="flexRadioDefault" id="flexRadioDefault1" @if(!empty($question->image_url)) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Foto vraag
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" onclick="showVideoInput()" type="radio" name="flexRadioDefault" id="flexRadioDefault2" @if(!empty($question->video_url)) checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Video vraag
                                </label>
                            </div>
                        </div>
                        <div id="questionImgWrapper" class="col-10 mx-auto mb-5 @if(empty($question->image_url)) d-none @endif">
                            <label for="questionImg" class="mb-1 fw-bold">Foto vraag</label>
                            <input class="form-control d-none" @if(!empty($question->image_url)) disabled  @endif name="image_url" type="file" id="questionImg">
                            @if(!empty($question->image_url))
                            <div id="tour-img-wrapper" class="wrapper">
                                <img class="img-fluid img-thumbnail" src="{{ asset('tourimg/'. $question->image_url) }}" alt="tour-img">
                                <button onclick="removeTourImage()" type="reset" id="tour-img-btn" class="btn create-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            @endif
                        </div>
                        <div id="questionVideoWrapper" class="col-10 mx-auto mb-5 @if(empty($question->video_url)) d-none @endif">
                            <label for="questionVideo" class="mb-1 fw-bold">Video vraag</label>
                            <input type="text" name="questionVideo" class="form-control" value="{{$question->video_url}}" id="questionVideo" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function removeTourImage() {
            document.getElementById("questionImg").classList.remove("d-none");
            document.getElementById("questionImg").disabled = false;
            document.getElementById("tour-img-wrapper").classList.add("d-none");
        }

        function showImageInput() {
            document.getElementById("questionImg").classList.remove("d-none");
            document.getElementById("questionImgWrapper").classList.remove("d-none");
            document.getElementById("questionImg").disabled = false;
            document.getElementById("questionImg").required = true;

            document.getElementById("questionVideoWrapper").classList.add("d-none")
            document.getElementById("questionVideo").disabled = true;
            document.getElementById("questionVideo").required = false;
        }

        function showVideoInput() {
            document.getElementById("questionVideoWrapper").classList.remove("d-none")
            document.getElementById("questionVideo").disabled = false;
            document.getElementById("questionVideo").required = true;

            document.getElementById("questionImgWrapper").classList.add("d-none");
            document.getElementById("questionImg").disabled = true;
            document.getElementById("questionImg").required = false;
        }
    </script>
@endsection
