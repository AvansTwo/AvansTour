@extends('layouts.app')
@section('title', 'Speurtocht detail')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 grey-bg p-5 my-5">
            <div class="row">
                <div class="col-12 col-lg-6 order-1 order-lg-6">
                    <h1>Naam tocht</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit sint dolores quidem praesentium, possimus ipsa voluptate laudantium! Unde sapiente ullam obcaecati magni, nesciunt ipsum delectus amet quod pariatur earum rem.</p>
                    <div class="col-12 d-flex mt-4">
                        <i class="fa-solid fa-earth-europe tour-icon"></i>
                        <p class="my-auto">Location</p>
                    </div>
                    <div class="col-12 d-flex mt-4">
                        <i class="fa-solid fa-certificate tour-icon"></i>
                        <p class="my-auto">Star</p>
                    </div>
                    <div class="col-12 d-flex mt-4">
                        <i class="fa-solid fa-circle-question tour-icon"></i>
                        <p class="my-auto">Question</p>
                    </div>
                    <div class="col-12">
                        <button type="button" onclick="location.href='#';" class="btn primary-btn mt-5">Start<i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-6 order-lg-1">
                    <img class="img-fluid tour-img mb-5 mb-lg-0" src="{{ asset('img/tour_card.jpg') }}" alt="tour-detail-img">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection