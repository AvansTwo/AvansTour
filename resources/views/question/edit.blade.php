@extends('layouts.app')
@section('title', 'Vraag aanpassen')
@section('content')
    <div class="container" onload="checkType({{$question->type}})">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Tour vraag <span class="title-colored">aanpassen</span></h1>
            </div>
            <div class="col-12 mb-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="needs-validation py-5 grey-bg" novalidate action="/tour/{{$tour->id}}/vragen/aanpassen/{{$question->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input id="removeImage" type="hidden" name="removeImage" value="0"/>
                    <div class="form-row">
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionTitle" class="mb-1 fw-bold">Titel vraag</label>
                            <input type="text" name="title" class="form-control" id="title" value="@if(old('title')) {{ old('title') }} @else {{$question->title}} @endif" placeholder="Klaslokalen" required>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionDesc" class="mb-1 fw-bold">Omschrijving vraag</label>
                            <input type="text" name="description" class="form-control" id="description" value="@if(old('description')) {{ old('description') }} @else{{$question->description}} @endif" placeholder="Hoeveel klaslokalen telt het gebouw LA in totaal?" required>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionDesc" class="mb-1 fw-bold d-block">Type vraag</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="type" @if(old('type') == "Meerkeuze" || old('type') == "") checked @elseif($question->type == "Meerkeuze") checked @endif type="radio" value="Meerkeuze" id="inlineRadio1">
                                <label class="form-check-label" for="inlineRadio1">Meerkeuze vraag</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="type" @if(old('type') == "Open") checked @elseif($question->type == "Open") checked @endif type="radio" value="Open" id="inlineRadio2">
                                <label class="form-check-label" for="inlineRadio2">Open vraag</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="type" @if(old('type') == "Media") checked @elseif($question->type == "Media") checked @endif type="radio" value="Media" id="inlineRadio3" >
                                <label class="form-check-label" for="inlineRadio3">Mediavraag*</label>
                            </div>
                            <small class="w-100 d-block mt-2 fst-italic">*Mediavraag dient beantwoord worden met een foto</small>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionPoints" class="mb-1 fw-bold">Aantal punten vraag</label>
                            <input type="number" value="{{$question->points}}" name="points" id="typeNumber" class="form-control" placeholder="10" required min="1" max="100"/>
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
                                <input required type="text" value="{{$question->gps_location}}" class="form-control @error('gps_location') is-invalid @enderror" name="gps_location" id="gps_location" placeholder="Coördinaten" aria-describedby="inputGroupPrepend" readonly>
                            </div>
                        </div>
                        <div id="questionImgWrapper" class="col-10 mx-auto mb-5 @if(empty($question->image_url)) d-none @endif">
                            <label for="questionImg" class="mb-1 fw-bold">Foto vraag</label>
                            <input class="form-control d-none" @if(!empty($question->image_url)) disabled  @endif name="image_url" type="file" id="questionImg">
                            <small class="w-100 d-block">Bestandstypen: jpeg,png,jpg | Max grootte: 8MB | Minimale afmetingen: 600x350</small>
                        @if(!empty($question->image_url))
                            <div id="tour-img-wrapper" class="wrapper">
                                <img id="questionPhoto" class="img-fluid img-thumbnail" src="{{ $question->image_url }}" alt="tour-img">
                                <button onclick="removeQuestionImage()" type="reset" id="tour-img-btn" class="btn create-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </div>
                            @endif
                        </div>
                        @if(empty($question->image_url))
                            <div id="newQuestionImgWrapper" class="col-10 mx-auto mb-5">
                                <label for="questionImg" class="mb-1 fw-bold">Foto</label>
                                <input class="form-control @error('image_url') is-invalid @enderror"  name="image_url" accept="image/png, image/jpg, image/jpeg" type="file" id="questionImg">
                                <small class="w-100 d-block">Bestandstypen: jpeg,png,jpg | Max grootte: 8MB | Minimale afmetingen: 600x350</small>
                            </div>
                        @endif
                        @if($question->type == "Meerkeuze")
                        <div id="multiple-choice-fields" class="col-10 mx-auto mb-3">
                            @foreach($question->answer as $answer)
                            <label for="questionAnswer1" class="mb-1 fw-bold">Antwoord {{ $loop->index+1 }}</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" @if(old('questionCorrectAnswer') == $answer->id) checked @elseif($answer->correct_answer == 1) checked @endif type="radio" required value="{{$answer->id}}" id="questionCorrectAnswer">
                                <input name="{{$answer->id}}" value="@if(old($answer->id)) {{old($answer->id)}} @else {{$answer->answer}} @endif" id="{{$answer->id}}" type="text" class="form-control" required>
                            </div>
                            @endforeach
                        </div>
                        @else
                            <div id="multiple-choice-fields" class="col-10 mx-auto mb-3 d-none">
                                <label for="questionAnswer1" class="mb-1 fw-bold">Antwoord 1</label>
                                <div class="input-group mb-3">
                                    <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" value="1" id="questionCorrectAnswer">
                                    <input name="1" value="{{ old('1') }}" id="1" type="text" class="form-control">
                                    @error('1')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="questionAnswer2" class="mb-1 fw-bold">Antwoord 2</label>
                                <div class="input-group mb-3">
                                    <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" value="2" id="questionCorrectAnswer">
                                    <input name="2" value="{{ old('2') }}" id="1" id="2" type="text" class="form-control" >
                                    @error('2')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="questionAnswer3" class="mb-1 fw-bold">Antwoord 3</label>
                                <div class="input-group mb-3">
                                    <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" value="3" id="questionCorrectAnswer">
                                    <input name="3" value="{{ old('3') }}" id="1" id="3" type="text" class="form-control">
                                    @error('3')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label for="questionAnswer4" class="mb-1 fw-bold">Antwoord 4</label>
                                <div class="input-group mb-3">
                                    <input name="questionCorrectAnswer" class="form-check-input questionCheckbox" type="radio" value="4" id="questionCorrectAnswer">
                                    <input name="4" value="{{ old('4') }}" id="1" id="4" type="text" class="form-control">
                                    @error('4')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                        <a class="btn primary-btn mt-3" href="/tour/{{$tour->id}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                        <button class="btn primary-btn secondary-btn mt-3" type="submit">Opslaan <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
