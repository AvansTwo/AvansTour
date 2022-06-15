@extends('layouts.app')
@section('title', 'Scoreboard')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 mt-5">
                <h1>Scoreboard <span class="title-colored">AvansTour</span></h1>
                <p>Filter op tournaam of zoek op teamnaam</p>
            </div>
            <div class="col-12 col-md-7">
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
            <div class="col-6 mt-4 mt-md-0 col-md-2">
                <div class="dropdown h-100 w-100">
                <button class="dropbtn d-block w-100">Filter Opleiding <i class="fa-solid fa-sort-down"></i></button>
                    <div class="dropdown-content">
                        @foreach($categories as $category)
                            <a href="/scoreboard/categorie/{{ $category->id }}">{{$category->category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-6 mt-4 mt-md-0 col-md-2">
                <div class="dropdown h-100 w-100">
                    <button class="dropbtn d-block w-100 h-100">Sorteer op <i class="fa-solid fa-sort-down"></i></button>
                    <div class="dropdown-content">
                        <a href="{{ route('sortPoints', 0) }}">Punten oplopend</a>
                        <a href="{{ route('sortPoints', 1) }}">Punten aflopend</a>
                        <a href="{{ route('sortTime', 1) }}">Totale tijd aflopend</a>
                        <a href="{{ route('sortTime', 0) }}">Totale tijd oplopend</a>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <a class="btn btn-secondary rounded-0 d-block h-100 w-100" href="{{ route('scoreboard.index') }}">
                    <i class="fa-solid fa-rotate-right h-100"></i>
                </a>
            </div>
            <div class="col-12 my-5">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Plaats</th>
                        <th scope="col">Tour naam</th>
                        <th scope="col">Team naam</th>
                        <th scope="col">Totale tijd</th>
                        <th scope="col">Punten</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        @php
                            $startDate = new \Nette\Utils\DateTime($result->start_time);
                        @endphp
                        <tr>
                            <td>#{{ $result->id }}</td>
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
