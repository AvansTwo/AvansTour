@extends('layouts.app')
@section('title', 'Scoreboard')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 mt-5">
                <h1>Scoreboard <span class="title-colored">AvansTour</span></h1>
                <p>Filter op tournaam of zoek op teamnaam</p>
            </div>
            <div class="col-md-10">
                <form class="h-100" action="/scoreboard/team" method="post">
                    @csrf
                    <div class="input-group h-100">
                        <input type="text" class="form-control" placeholder="Zoek op teamnaam"
                               aria-label="Team name" aria-describedby="button-addon2" name="teamString">
                        <button class="btn btn-outline-danger px-5 rounded-0" type="submit" id="button-addon2">Zoek
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <div class="dropdown h-100 w-100">
                    <button class="dropbtn d-block w-100">Filter Tours <i class="fa-solid fa-sort-down"></i></button>
                    <div class="dropdown-content">
                        @foreach($tours as $tour)
                            <a href="/scoreboard/tour/{{ $tour->id }}">{{$tour->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
