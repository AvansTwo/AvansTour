@extends('layouts.app')
@section('title', 'Vraag beantwoorden')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 grey-bg p-5 my-5">
            <h1>De speurtocht <span class="title-colored"> kaart</span></h1>
            <p>Loop naar een van de markers op de map en klik deze aan als je bent aangekomen op bestemming</p>
            <x-leaflet-map :centerpoint="$tour->location" :markers="$remainingQuestions" markerCallback="markerClick"></x-leaflet-map>
            <p class="text-center mt-4">Nog <span id="amount-question-left">3</span> vragen te beantwoorden</p>
            <div class="d-flex">
                <button type="button" disabled onclick="location.href='#';" class="btn primary-btn my-1 mx-auto">Tocht afronden <i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection
