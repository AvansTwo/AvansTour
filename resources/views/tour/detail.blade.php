@extends('layouts.app')
@section('title', 'Speurtocht detail')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" onclick="location.href='/speurtochten';"
                        class="btn primary-btn secondary-btn mt-5"><i class="fa-solid fa-chevron-left"></i> Ga terug
                </button>
            </div>
            <div class="col-12 grey-bg p-5 my-5">
                <div class="row">
                    <div class="col-12 col-lg-6 order-1 order-lg-6">
                        <h1>{{$tour->name}}</h1>
                        <p>{{$tour->description}}</p>
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-earth-europe tour-icon"></i>
                            <p class="my-auto">Startlocatie: {{$tour->location}}</p>
                        </div>
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-book tour-icon"></i>
                            <p class="my-auto">Opleiding: {{$tour->category->category_name}}</p>
                        </div>
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-user tour-icon"></i>
                            <p class="my-auto">Maker: {{$tour->user->name}}</p>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <button type="button" onclick="location.href='#';"
                                            class="btn primary-btn d-block d-lg-inline">Start nu <i
                                            class="fa-solid fa-chevron-right"></i></button>
                                </div>
                                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                                    <button onclick="location.href='/speurtochten/aanpassen/{{$tour->id}}';"
                                            class="btn create-btn edit-btn mt-2"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button"
                                            onclick="location.href='/speurtochten/{{$tour->id}}/vragen/aanmaken';"
                                            class="btn create-btn mt-2"><i class="mr-5 fa-solid fa-square-plus"></i>
                                    </button>
                                    <button onclick="location.href='/speurtochten/verwijderen/{{$tour->id}}';"
                                            class="btn create-btn delete-btn mt-2"><i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-6 order-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-fluid rounded mb-5 mb-lg-0"
                                     src="{{ asset('tourimg/'. $tour->image_url) }}" alt="tour-detail-img">
                            </div>
                            <div class="col-12 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($lat) && isset($long))
                <div class="col-12 grey-bg p-5 mt-3 mb-5 d-none d-md-inline">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-3">Tour Startlocatie</h2>
                        </div>
                        <div class="col-12">
                            <div class="mh-100 w-100" id="map" style="height: 400px">
                                <script async
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACU1L4xCGmgu_-1Ptk2NrjKgiwaMBD0tY&callback=initMap">
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-12 grey-bg p-5 mt-3 mb-5 d-none d-md-inline">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3">Tour vragen</h2>
                    </div>
                    <div class="col-12">
                        @if(Auth::check())
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titel</th>
                                    <th scope="col">Omschrijving</th>
                                    <th scope="col">Punten</th>
                                    <th scope="col">Bekijken</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tour->question as $question)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$question->title}}</td>
                                        <td>{{$question->description}}</td>
                                        <td>{{$question->points}}</td>
                                        <td>
                                            <button onclick="location.href='/vragen/{{$question->id}}';"
                                                    class="btn secondary-btn"><i class="fa-solid fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        @else
                        <?php
                        $questions = 0;
                        $max = 0;
                        ?>

                        @foreach($tour->question as $question)
                        <?php
                        $max += $question->points;
                        $questions += 1;
                        ?>

                        @endforeach

                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-question question-icon-mark"></i>
                            <p class="my-auto">Vragen: {{$questions}}</p>
                        </div>
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-star tour-icon"></i>
                            <p class="my-auto">Punten: {{$max}}</p>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (isset($lat) && isset($long))
        <script>
            // Initialize and add the map
            function initMap() {
                // The location of Uluru
                const uluru = {lat: {{ $lat }}, lng: {{ $long }}};
                // The map, centered at Uluru
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 16,
                    center: uluru,
                });
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                });
            }

            window.initMap = initMap;
        </script>
        @push('head')
            <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        @endpush
    @endif
@endsection
