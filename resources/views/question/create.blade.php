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
                            <label for="questionDesc" class="mb-1 fw-bold d-block">Type vraag</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="typeRadio" checked type="radio" value="Meerkeuze" id="inlineRadio1">
                                <label class="form-check-label" for="inlineRadio1"> Meerkeuze vraag </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="typeRadio" type="radio" value="Open" id="inlineRadio2">
                                <label class="form-check-label" for="inlineRadio2"> Open vraag </label>
                            </div>
                            <div class="form-check form-check-inline" data-toggle="tooltip" data-placement="bottom"  title="Bij een mediavraag dient de student de vraag te beantwoorden met een foto of video bestand.">
                                <input class="form-check-input" name="typeRadio" type="radio" value="Media" id="inlineRadio3" >
                                <label class="form-check-label" for="inlineRadio3"> Media vraag* </label>
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionPoints" class="mb-1 fw-bold">Aantal punten vraag</label>
                            <input type="number" name="questionPoints" id="typeNumber" class="form-control" placeholder="10" required min="1" max="100"/>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                           <label for="questionLocation" class="mb-1 fw-bold">Locatie vraag</label>
                           <div id="map">
                            <x-leaflet-map centerpoint="51.583683,4.798869" mapCallback="mapPickLocation"></x-leaflet-map>
                            <div id="locationChanged" class="alert alert-success d-none mb-0 py-1" role="alert">Locatie aangepast</div>
                            <br>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" onclick="showMap()">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                                </div>
                                <input type="text" class="form-control" name="questionLocation" id="questionLocation" placeholder="Coördinaten" aria-describedby="inputGroupPrepend" required readonly>
                            </div>
                        </div>
                        <div class="col-8 col-lg-5 d-flex justify-content-between mx-auto mb-3">
                            <div class="form-check">
                                <input class="form-check-input" onclick="showImageInput()" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Foto
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" onclick="showVideoInput()" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Video
                                </label>
                            </div>
                        </div>
                        <div id="questionImgWrapper" class="col-10 mx-auto mb-5">
                            <label for="questionImg" class="mb-1 fw-bold">Foto</label>
                            <input class="form-control" name="questionImg" type="file" id="questionImg" required>
                        </div>
                        <div id="questionVideoWrapper" class="col-10 mx-auto mb-5 d-none">
                            <label for="questionVideo" class="mb-1 fw-bold">Video</label>
                            <input type="text" name="questionVideo" disabled class="form-control" id="questionVideo" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        </div>
                        <div id="multiple-choice-fields" class="col-10 mx-auto mb-3">
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
        function showImageInput() {
            $("#questionImgWrapper").removeClass("d-none");
            $("#questionImg").attr({
                disabled: false,
                required: true
            })

            $("#questionVideoWrapper").addClass("d-none");
            $("#questionVideo").attr({
                disabled: true,
                required: false
            })
        }

        function showVideoInput() {
            $("#questionVideoWrapper").removeClass("d-none");
            $("#questionVideo").attr({
                disabled: false,
                required: true
            })

            $("#questionImgWrapper").addClass("d-none");
            $("#questionImg").attr({
                disabled: true,
                required: false
            })
        }
        
        $('input[type=radio][name=typeRadio]').change(function() {
            if (this.value == 'Meerkeuze') {
                $("#multiple-choice-fields").show();
                $("#multiple-choice-fields :input").attr({
                    disabled: false,
                    required: true
                });
            }else{
                $("#multiple-choice-fields").hide();
                $("#multiple-choice-fields :input").attr({
                    disabled: true,
                    required: false
                });
            }
        });
    </script>
@endsection