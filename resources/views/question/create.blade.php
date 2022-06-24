@extends('layouts.app')
@section('title', 'Vraag aanmaken')
@section('content')
    <div class="container" onload="checkType({{old('type')}})">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Een Nieuwe <span class="title-colored">Vraag</span> Toevoegen</h1>
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
                <form class="needs-validation py-5 grey-bg" novalidate action="/tour/{{$tour->id}}/vragen/aanmaken" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="tour_id" value="{{ $tour->id }}" />
                    <div class="form-row">
                        <div class="col-10 mx-auto mb-3">
                            <label for="title" class="mb-1 fw-bold">Titel vraag</label>
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid" @enderror id="title" placeholder="Klaslokalen" required>
                            <div class="invalid-feedback">
                                Voer een vraag titel in.
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="description" class="mb-1 fw-bold">Omschrijving vraag</label>
                            <input type="text" value="{{ old('description') }}" name="description" class="form-control @error('description') is-invalid" @enderror id="description" placeholder="Hoeveel klaslokalen telt het gebouw LA in totaal?" required>
                            <div class="invalid-feedback">
                                Voer een vraag omschrijving in.
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionDesc" class="mb-1 fw-bold d-block">Type vraag</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="type" @if(old('type') == "Meerkeuze" || old('type') == "") checked @endif type="radio" value="Meerkeuze" id="inlineRadio1">
                                <label class="form-check-label" for="inlineRadio1">Meerkeuze vraag</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="type" @if(old('type') == "Open") checked @endif type="radio" value="Open" id="inlineRadio2">
                                <label class="form-check-label" for="inlineRadio2">Open vraag</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="type" @if(old('type') == "Media") checked @endif type="radio" value="Media" id="inlineRadio3" >
                                <label class="form-check-label" for="inlineRadio3">Mediavraag*</label>
                            </div>
                            <small class="w-100 d-block mt-2 fst-italic">*Mediavraag dient beantwoord worden met een foto</small>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="questionPoints" class="mb-1 fw-bold">Aantal punten vraag</label>
                            <input type="number" value="{{ old('points') }}" name="points" id="typeNumber" class="form-control @error('points') is-invalid @enderror" placeholder="10" required min="1" max="100"/>
                            <div class="invalid-feedback">
                                Voer een aantal punten in.
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourStartLocation" class="mb-1 fw-bold">Locatie vraag</label>
                            <div id="map">
                                <x-leaflet-map centerpoint="51.583683,4.798869"  mapCallback="mapPickLocation"></x-leaflet-map>
                                <div id="locationChanged" class="alert alert-success d-none mb-0 py-1" role="alert">Locatie aangepast!</div>
                                <br>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend" onclick="showMap()">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                                </div>
                                <input type="text" value="{{ old('gps_location') }}" class="form-control @error('gps_location') is-invalid @enderror" name="gps_location" id="tourStartLocation" required data-readonly>
                                <div class="invalid-feedback">
                                    Selecteer een locatie.
                                </div>
                            </div>
                        </div>
                        <div id="questionImgWrapper" class="col-10 mx-auto mb-5">
                            <label for="questionImg" class="mb-1 fw-bold">Foto</label>
                            <input class="form-control @error('image_url') is-invalid @enderror"  name="image_url" accept="image/png, image/jpg, image/jpeg" type="file" id="questionImg">
                            <small class="w-100 d-block">Bestandstypen: jpeg,png,jpg | Max grootte: 8MB | Minimale afmetingen: 600x350</small>
                        </div>
                        <div id="multiple-choice-fields" class="col-10 mx-auto mb-3">
                            <label for="questionAnswer1" class="mb-1 fw-bold">Antwoord 1</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" @if(old('questionCorrectAnswer') == "1") checked @endif class="form-check-input questionCheckbox" type="radio" required value="1" id="questionCorrectAnswer">
                                <input name="1" value="{{ old('1') }}" id="1" type="text" class="form-control @error('1') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Voer een antwoord in.
                                </div>
                            </div>
                            <label for="questionAnswer2" class="mb-1 fw-bold">Antwoord 2</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" @if(old('questionCorrectAnswer') == "2") checked @endif class="form-check-input questionCheckbox" type="radio" required value="2" id="questionCorrectAnswer">
                                <input name="2" value="{{ old('2') }}" id="1" id="2" type="text" class="form-control @error('2') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Voer een antwoord in.
                                </div>
                            </div>
                            <label for="questionAnswer3" class="mb-1 fw-bold">Antwoord 3</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" @if(old('questionCorrectAnswer') == "3") checked @endif class="form-check-input questionCheckbox" type="radio" required value="3" id="questionCorrectAnswer">
                                <input name="3" value="{{ old('3') }}" id="1" id="3" type="text" class="form-control @error('3') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Voer een antwoord in.
                                </div>
                            </div>
                            <label for="questionAnswer4" class="mb-1 fw-bold">Antwoord 4</label>
                            <div class="input-group mb-3">
                                <input name="questionCorrectAnswer" @if(old('questionCorrectAnswer') == "4") checked @endif class="form-check-input questionCheckbox" type="radio" required value="4" id="questionCorrectAnswer">
                                <input name="4" value="{{ old('4') }}"  id="1" id="4" type="text" class="form-control @error('4') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    Voer een antwoord in.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                        <a class="btn primary-btn mt-3" href="/tour/{{$tour->id}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                        <button class="btn primary-btn secondary-btn mt-3" type="submit">Aanmaken <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
