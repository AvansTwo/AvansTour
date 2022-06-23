@extends('layouts.app')
@section('title', 'Scoreboard')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 mt-5">
                <h1>Scoreboard <span class="title-colored">AvansTour</span></h1>
                <p>Filter op tournaam of zoek op teamnaam</p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-10 col-lg-11 col-sm-10">
                <form class="h-100" action="/scoreboard/team" method="post">
                    @csrf
                    <div class="input-group h-100">
                        <input type="text" class="form-control rounded-0" placeholder="Zoek op teamnaam"
                               aria-label="Team name" aria-describedby="button-addon2" name="teamString">
                        <button class="btn btn-outline-danger px-5 rounded-0" type="submit" id="button-addon2">Zoek
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-2 col-lg-1 col-sm-2 d-flex flex-column-justify-content-center">
                <a class="btn btn-secondary h-100 w-100 d-flex flex-column justify-content-center rounded-0"
                   href="{{ route('scoreboard.index') }}">
                    <i class="fa-solid fa-rotate-right"></i>
                </a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-lg-8 col-md-6 d-flex flex-column justify-content-center mb-3 mb-md-0">
                <form class="h-100" action="{{ route('scoreboard.dayFilter') }}" method="post">
                    @csrf
                    <div class="input-group h-100">
                        <input class="form-control rounded-0 h-100" type="date" placeholder="test"
                               aria-label="Datum" aria-describedby="button-addon3" name="datePicker"
                               value="YYYY-MM-DD"/>
                        <button class="btn btn-outline-danger px-5 rounded-0" type="submit" id="button-addon3">Filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-6 col-lg-2 col-md-3 d-flex flex-column justify-content-center">
                <div class="dropdown">
                    <button class="dropbtn d-block w-100">Sorteer <i class="fa-solid fa-sort-down"></i></button>
                    <div class="dropdown-content w-100">
                        <a href="{{ route('sortPoints', 0) }}">Punten oplopend</a>
                        <a href="{{ route('sortPoints', 1) }}">Punten aflopend</a>
                        <a href="{{ route('sortTime', 1) }}">Totale tijd aflopend</a>
                        <a href="{{ route('sortTime', 0) }}">Totale tijd oplopend</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-2 col-md-3 d-flex flex-column justify-content-center">
                <div class="dropdown">
                    <button class="dropbtn d-block w-100">Opleiding <i class="fa-solid fa-sort-down"></i>
                    </button>
                    <div class="dropdown-content w-100">
                        @foreach($categories as $category)
                            <a href="/scoreboard/categorie/{{$category->id}}">{{$category->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 my-5">
            <div class="table-responsive">
                <table class="table table-striped custom-table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Tour naam</th>
                        <th scope="col">Team naam</th>
                        <th scope="col">Totale tijd</th>
                        <th scope="col">Punten</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($results) === 0)
                        <tr>
                            <td colspan="4" class="text-center"> No results found!</td>
                        </tr>
                    @endif
                    @foreach($results as $result)
                        @php
                            $startDate = new \Nette\Utils\DateTime($result->start_time);
                        @endphp
                        <tr>
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->team_name }}</td>
                            @if (isset($result->end_time))
                                <td>{{ $result->timeDiff }}</td>
                            @else
                                <td>Team heeft geen eindtijd.</td>
                            @endif
                            <td>
                                {{ $result->points }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$results->links()}}
            </div>
        </div>
    </div>
@endsection
