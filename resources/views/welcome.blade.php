@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 landing my-5 p-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1 class="mb-5">AvansTour </br><span id="landing-title">Digitale speurtocht</span></h1>
                        <p class="mb-5">Ga digitaal op avontuur door de stad Breda en leer deze en jouw toekomstig studiegenoten beter kennen, ga de strijd aan met andere groepjes om zoveel mogelijk punten te verzamelen</p>
                        <p class="landing-phrase"><span class="red-dot"></span>Speel de tocht op jouw mobiele telefoon</p>
                        <p class="landing-phrase"><span class="red-dot"></span>Een teamnaam is genoeg om aan de slag te gaan</p>
                        <button type="button" class="btn primary-btn mt-5">Start nu <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                    <div class="col-12 col-lg-6">
                        <img class="img-fluid" src="{{ asset('img/landing_img.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
