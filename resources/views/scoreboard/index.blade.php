@extends('layouts.app')
@section('title', 'Scoreboard')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 mt-5">
                <h1>Scoreboard <span class="title-colored">AvansTour</span></h1>
                <p>Filter op tournaam of zoek op teamnaam</p>
            </div>
            <div class="col-md-8">
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
            <div class="col-md-2">
                <div class="dropdown h-100 w-100">
                    <button class="dropbtn d-block w-100">Filter Tours <i class="fa-solid fa-sort-down"></i></button>
                    <div class="dropdown-content">
                        @foreach($categories as $category)
                            <a href="{{ route('scoreboardCategoryFilter', $category->id) }}">{{ $category->category_name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="dropdown h-100 w-100">
                    <button class="dropbtn d-block w-100">Sorteer op <i class="fa-solid fa-sort-down"></i></button>
                    <div class="dropdown-content">
                        <a href="{{ route('sortPoints', 0) }}">Punten oplopend</a>
                        <a href="{{ route('sortPoints', 1) }}">Punten aflopend</a>
                        <a href="{{ route('sortTime', 1) }}">Totale tijd aflopend</a>
                        <a href="{{ route('sortTime', 0) }}">Totale tijd oplopend</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tour Name</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">Total Time</th>
                        <th scope="col">Points</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        @php
                            $startDate = new \Nette\Utils\DateTime($result->start_time);
                        @endphp
                        <tr>
                            <td>{{ $result->id }}</td>
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
            <div class="d-flex justify-content-center">
                {{$results->links()}}
            </div>
        </div>
    </div>
@endsection
