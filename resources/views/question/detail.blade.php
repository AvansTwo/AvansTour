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
                            <i class="fa-solid fa-certificate tour-icon"></i>
                            <p class="my-auto">Punten: {{$question->points}}</p>
                        </div>
                        <div class="col-12 d-flex mt-4">
                            @if(!empty($question->video_url))
                                <i class="fa-brands fa-youtube-square tour-icon"></i>
                                <p class="my-auto">Youtube: <a target="_blank" href="{{$question->video_url}}">Link</a></p>
                            @endif
                        </div>
                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                                    <button onclick="location.href='/vragen/verwijderen/{{$question->id}}';" class="btn create-btn delete-btn"><i class="fa-solid fa-trash"></i></button>
                                    <button onclick="location.href='/vragen/aanpassen/{{$question->id}}';" class="btn create-btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-6 order-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-fluid question-img mb-5 mb-lg-0" @if(empty($question->image_url)) src="{{ asset('img/landing_img.png') }}" @else src="{{ asset('tourimg/'. $question->image_url) }}" @endif alt="tour-detail-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grey-bg mb-5 p-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 fw-bold"><i class="fa-solid fa-earth-europe tour-icon-bold"></i> Locatie vraag:</h2>
                    <x-leaflet-map :centerpoint="$question->gps_location" :markers="$questionLocation"></x-leaflet-map>
                </div>
            </div>
        </div>
    </div>
@endsection
