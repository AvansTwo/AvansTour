@extends('layouts.app')
@section('title', 'Speurtochten')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1>Kies een <span class="title-colored">speurtocht</span> !</h1>
                        @if(Session::has('tourSuccessful'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('tourSuccessful') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="float-none float-lg-end mb-5 mb-lg-0">
                            <button type="button" onclick="location.href='/speurtochten/aanmaken';" class="btn create-btn mt-2"><i id="create-tour-btn-icon" class="fa-solid fa-square-plus"></i>Aanmaken</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grey-bg p-5 my-5">
                <div class="row">
                    <div class="col-7 col-lg-6">
                        <h2>Op dit moment actueel</h2>
                    </div>
                    <div class="col-5 col-lg-6">
                        <div class="float-end">
                            <div class="dropdown">
                                <button class="dropbtn">Filter <i class="fa-solid fa-sort-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="#">Informatica</a>
                                    <a href="#">Werktuigbouw</a>
                                    <a href="#">Tech. Informatica</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="row">
                            @for($i = 0; $i<6; $i++)
                                <div class="col-12 col-lg-4">
                                    <div class="tour-card mb-5">
                                        <a href="#"><img class="img-fluid tour-img" src="{{ asset('img/tour_card.jpg') }}" alt="tour_card"></a>
                                        <div class="tour-desc">
                                            <p class="tour-text">Breda op de water snapje, deze titel is lang</p>
                                            <p id="tour-year" class="tour-text ml-5">2022</p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" onclick="location.href='/speurtochten';" class="btn primary-btn secondary-btn mt-3 mx-auto">Bekijk meer <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
