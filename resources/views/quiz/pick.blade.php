@extends('layouts.play')
@section('title', 'Vraag beantwoorden')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 grey-bg p-5 my-5">
            <h1>De speurtocht <span class="title-colored"> kaart</span></h1>
            <p>loop naar één van de markers op de map en klik deze aan als je bent aangekomen op de bestemming</p>
            <x-leaflet-map :centerpoint="$tour->location" :markers="$remainingQuestions" markerCallback="markerClick"></x-leaflet-map>
            @if(Auth::check())
            <x-geolocation isAdmin="true" radius={{$radius}}></x-geolocation>
            @else
            <x-geolocation isAdmin="false" radius={{$radius}}></x-geolocation>
            @endif
            <p class="text-center mt-4">Nog <span id="amount-question-left">{{$amount}}</span> vragen te beantwoorden</p>
            <div class="d-flex">
                {{-- In de href nog de url van de eind pagina --}}
                <button type="button" onclick="JSalertEndTour()" class="btn primary-btn my-1 mx-auto"><a id="exit-tour-url" style="pointer-events: none" href="/quiz/einde/{{$teamHash}}">Tocht afronden</a></button>

            </div>
        </div>
    </div>
</div>
@endsection
