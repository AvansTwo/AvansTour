@extends('layouts.app')
@section('title', 'Vraag detail')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" onclick="location.href='/speurtochten/{{$question->tour->id}}';" class="btn primary-btn secondary-btn mt-5"><i class="fa-solid fa-chevron-left"></i> Ga terug</button>
            </div>
            <div class="col-12 grey-bg p-5 my-5">
                <div class="row">
                    <div class="col-12 col-lg-6 order-1 order-lg-6">
                        <h1>{{$question->title}}</h1>
                        <p>{{$question->description}}</p>
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-earth-europe tour-icon"></i>
                            <p class="my-auto">Locatie: {{$question->gps_location}}</p>
                        </div>
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-certificate tour-icon"></i>
                            <p class="my-auto">Punten: {{$question->points}}</p>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <button type="button" onclick="location.href='#';" class="btn primary-btn d-block d-lg-inline">Start nu <i class="fa-solid fa-chevron-right"></i></button>
                                </div>
                                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
{{--                                    <button onclick="location.href='/speurtochten/aanpassen/{{$tour->id}}';" class="btn create-btn edit-btn mt-2"><i class="fa-solid fa-pen-to-square"></i></button>--}}
{{--                                    <button type="button" onclick="location.href='/speurtochten/{{$tour->id}}/vragen/aanmaken';" class="btn create-btn mt-2"><i class="mr-5 fa-solid fa-square-plus"></i></button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-6 order-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('tourimg/'. $question->image_url) }}" alt="tour-detail-img">
                            </div>
                            <div class="col-12">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0krOPZWdwKc" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-12 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
