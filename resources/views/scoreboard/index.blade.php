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
                        @foreach($results as $result)
                            <a href="/scoreboard/tour/{{ $result->tour->id }}">{{$result->tour->name}}</a>
                        @endforeach
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
                            <td>{{ $result->tour->id }}</td>
                            <td>{{ $result->tour->name }}</td>
                            <td>{{ $result->team_name }}</td>
                            @if (isset($result->end_time))
                                <td> {{ $startDate
                                        ->diff(new \Nette\Utils\DateTime($result->end_time))
                                        ->format("%h hours, %i minutes and %s seconds")}}
                                </td>
                            @else
                                <td> {{ $startDate
                                        ->diff(new \Nette\Utils\DateTime())
                                        ->format("%h hours, %i minutes and %s seconds") }}
                                </td>
                            @endif
                            <td>
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
