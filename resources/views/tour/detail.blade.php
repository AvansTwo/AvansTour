@extends('layouts.app')
@section('title', 'Speurtocht detail')
@section('content')
<div class="container">
    <div class="row">
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
                    <div class="col-12">
                        <button type="button" onclick="location.href='#';" class="btn primary-btn mt-5">Start<i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-6 order-lg-1">
                    <img class="img-fluid tour-img mb-5 mb-lg-0" src="{{ asset('tourimg/'. $tour->image_url) }}" alt="tour-detail-img">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
