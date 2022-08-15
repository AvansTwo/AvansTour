@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 grey-bg my-5 p-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1 class="mb-5"><span class="title-colored">AvansTour</span> </br>Digitale speurtocht</h1>
                        <p class="mb-5">Ga digitaal op avontuur door Avans en de stad Breda, leer zo jouw toekomstige studiegenoten beter kennen en de plek waar je gaat studeren, ga de strijd aan met andere groepjes om zoveel mogelijk punten te verzamelen.</p>
                        <p class="landing-phrase"><span class="red-dot"></span>Speel de tocht op jouw mobiele telefoon</p>
                        <p class="landing-phrase"><span class="red-dot"></span>Een teamnaam is genoeg om aan de slag te gaan</p>
                        <button type="button" onclick="location.href='/tours';" class="btn primary-btn mt-5">Start nu <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                    <div class="col-12 col-lg-6">
                        <img class="img-fluid" src="{{ asset('img/landing_img.png') }}" alt="landing-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
