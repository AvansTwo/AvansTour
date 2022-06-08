@extends('layouts.app')
@section('title', 'Vraag beantwoorden')
@section('content')
<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <div class="container">
        <div class="row">
            <div class="col-12 grey-bg p-5 my-5">
                <h1>De <span class="title-colored"> Kaart</span></h1>
                <x-leaflet-map :centerpoint="$tour->location" :markers="$remainingQuestions" markerCallback="markerClick"></x-leaflet-map>
            </div>
        </div>
    </div>
@endsection
