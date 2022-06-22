@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Welkom op het <span class="title-colored">Dashboard</span></h1>
                <p>Teams die meedoen aan AvansTour</p>
            
            </div>
            <div class="col-12 grey-bg my-5 p-5">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Teamnaam</th>
                        <th scope="col">Tour naam</th>
                        <th scope="col">Bekijken</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{$team->team_name}}</td>
                            <td>{{$team->tour_name}}</td>
                            <td>
                                <button onclick="location.href='/dashboard/team/{{$team->team_id}}';" class="btn secondary-btn"><i class="fa-solid fa-eye"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection
