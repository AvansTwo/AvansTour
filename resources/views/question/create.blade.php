@extends('layouts.app')
@section('title', 'Speurtocht detail')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Een nieuwe <span class="title-colored">vraag</span> toevoegen</h1>
                @if(Session::has('SuccessMessage'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('SuccessMessage') }}
                    </div>
                @endif
            </div>
            <div class="col-12 mb-5">
                <form class="needs-validation py-5 grey-bg" novalidate action="/speurtochten/{{$tour->id}}/vragen/aanmaken" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="tourID" value="{{ $tour->id }}" />
                    <div class="form-row">
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionTitle" class="mb-1 fw-bold">Titel vraag</label>
                            <input type="text" name="questionTitle" class="form-control" id="questionTitle" placeholder="Klaslokalen" required>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionDesc" class="mb-1 fw-bold">Omschrijving vraag</label>
                            <input type="text" name="questionDesc" class="form-control" id="questionDesc" placeholder="Hoeveel klaslokalen telt het gebouw LA in totaal?" required>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionPoints" class="mb-1 fw-bold">Aantal punten vraag</label>
                            <input type="number" name="questionPoints" id="typeNumber" class="form-control" placeholder="10" required min="1" max="100"/>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                           <label for="questionLocation" class="mb-1 fw-bold">Locatie vraag</label>
                           <div id="map">
                            <x-leaflet-map centerpoint="51.583683,4.798869"  markerCallback="markerClick"></x-leaflet-map>
                            <div id="locationChanged" class="alert alert-success d-none mb-0 py-1" role="alert">Location changed!</div>
                            <br>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" onclick="showMap()">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                                </div>
                                <input type="text" class="form-control" name="location" id="questionLocation" value="51.583683,4.798869" aria-describedby="inputGroupPrepend" readonly>
                            </div>
                        </div>
                        <div class="col-8 col-lg-5 d-flex justify-content-between mx-auto mb-3">
                            <div class="form-check">
                                <input class="form-check-input" onclick="showImageInput()" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Foto vraag
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" onclick="showVideoInput()" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Video vraag
                                </label>
                            </div>
                        </div>
                        <div id="questionImgWrapper" class="col-10 mx-auto mb-5">
                            <label for="questionImg" class="mb-1 fw-bold">Foto vraag</label>
                            <input class="form-control" name="questionImg" type="file" id="questionImg" required>
                        </div>
                        <div id="questionVideoWrapper" class="col-10 mx-auto mb-5 d-none">
                            <label for="questionVideo" class="mb-1 fw-bold">Video vraag</label>
                            <input type="text" name="questionVideo" disabled class="form-control" id="questionVideo" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionAnswer1" class="mb-1 fw-bold">Antwoord 1</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" required value="1" id="questionCorrectAnswer">
                                <input name="1" id="1" type="text" class="form-control" required>
                            </div>
                            <label for="questionAnswer2" class="mb-1 fw-bold">Antwoord 2</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" required value="2" id="questionCorrectAnswer">
                                <input name="2" id="2" type="text" class="form-control" required>
                            </div>
                            <label for="questionAnswer3" class="mb-1 fw-bold">Antwoord 3</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" required value="3" id="questionCorrectAnswer">
                                <input name="3" id="3" type="text" class="form-control" required>
                            </div>
                            <label for="questionAnswer4" class="mb-1 fw-bold">Antwoord 4</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" required value="4" id="questionCorrectAnswer">
                                <input name="4" id="4" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                        <a class="btn primary-btn mt-3" href="/speurtochten/{{$tour->id}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                        <button class="btn primary-btn secondary-btn mt-3" type="submit">Aanmaken <i class="fa-solid fa-chevron-right"></i></button>
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

        function showImageInput() {
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