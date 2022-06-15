@extends('layouts.app')
@section('title', 'Speurtocht aanpassen')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">{{$tour->name}}<span class="title-colored"> aanpassen</span></h1>
            </div>
            <div class="col-12 mb-5">
                <form class="needs-validation py-5 grey-bg" novalidate action="/speurtochten/aanpassen/{{$tour->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input name="user_id" type="hidden" value="1">
                    <div class="form-row">
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourName" class="mb-1 fw-bold">Naam tocht</label>
                            <input type="text" value="{{$tour->name}}" name="name" class="form-control" id="tourName" placeholder="Informatica tour" required>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="validationCustom02" class="mb-1 fw-bold">Beschrijving tour</label>
                            <textarea class="form-control" name="description" id="descriptionTour" placeholder="Tour voor eerste jaars informatica studenten" rows="5">{{$tour->description}}</textarea>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourStartLocation" class="mb-1 fw-bold">Start locatie</label>

                            <div id="map">
                            <x-leaflet-map centerpoint="51.583683,4.798869"  mapCallback="mapPickLocation"></x-leaflet-map>
                            <div id="locationChanged" class="alert alert-success d-none mb-0 py-1" role="alert">Location changed!</div>
                            <br>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend" onclick="showMap()">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                                </div>
                                <input type="text" class="form-control" value="{{$tour->location}}" name="location" id="tourStartLocation" aria-describedby="inputGroupPrepend" readonly>
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourimg" class="mb-1 fw-bold">Tour foto</label>
                            <input class="form-control @if(!empty($tour->image_url)) d-none @endif" name="image_url" disabled type="file" id="tour-img-input">
                            <div id="tour-img-wrapper" class="wrapper @if(empty($tour->image_url)) d-none @endif">
                                <img class="img-fluid img-thumbnail" src="{{ asset('tourimg/'. $tour->image_url) }}" alt="tour-img">
                                <button onclick="removeTourImage()" type="reset" id="tour-img-btn" class="btn create-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourCategory" class="mb-1 fw-bold">Categorie</label>
                            <select class="form-select" id="tourCategory" name="category_id" required>
                                <option value="" disabled selected hidden>Selecteer opleidings categorie</option>
                                @foreach($categories as $category)
                                    <option @if($category->id == $tour->category_id) selected @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">

                            <a class="btn primary-btn mt-3" href="/speurtochten/{{$tour->id}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                        <button class="btn primary-btn secondary-btn mt-3" type="submit" >Opslaan <i class="fa-solid fa-chevron-right"></i></button>
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
            document.getElementById("tour-img-input").classList.remove("d-none");
            document.getElementById("tour-img-input").disabled = false;
            document.getElementById("tour-img-wrapper").classList.add("d-none");
        }
    </script>
@endsection
