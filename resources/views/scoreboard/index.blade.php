@extends('layouts.app')
@section('title', 'Scoreboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <button class="dropbtn">Filter <i class="fa-solid fa-sort-down"></i></button>
                @foreach($tours as $tour)
                    <a href="/scoreboard/tour/{{ $tour->id }}">{{$tour->name}}</a>
                @endforeach
            </div>

        </div>
    </div>
@endsection
