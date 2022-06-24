@extends('layouts.app')
@section('title', 'TourTeam aanmaken')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Een <span class="title-colored">team</span> aanmaken</h1>
            </div>
            <div class="col-12 mb-5">
                <form class="needs-validation py-5 grey-bg" novalidate action="/quiz/aanmaken" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tour_id" value="{{$tour->id}}">
                    <input id="amount_players" type="hidden" name="amount_players" value="1">
                    <div class="form-row">
                        <div class="col-10 mx-auto mb-5">
                            <label for="tourName" class="mb-1 fw-bold">Teamnaam</label>
                            <input type="text" name="team_name" class="form-control" id="team_name" placeholder="Script Serpents" required>
                        </div>
                        @for($i = 1; $i <= 8; $i++)
                        <div class="col-10 mx-auto mb-3">
                            <label id="team_player_label_{{$i}}" for="tourName" class="mb-1 fw-bold @if($i!=1) d-none @endif">Naam lid {{$i}}</label>
                            <input id="team_player_input_{{$i}}" type="text" name="member_{{$i}}" class="form-control @if($i!=1) d-none @endif" @if($i!=1) disabled @endif placeholder="Naam speler {{$i}}" required>
                        </div>
                        @endfor
                        <div class="col-10 mx-auto mb-3">
                            <div class="row">
                                <div class="col-8 col-lg-9">
                                    <div id="max_players_reached" class="alert alert-danger d-none mb-0 py-1" role="alert">Een team bestaat uit maximaal 8 spelers!</div>
                                    <div id="min_players_reached" class="alert alert-danger d-none mb-0 py-1" role="alert">Een team bestaat uit minimaal 1 speler!</div>
                                </div>
                                <div class="col-4 col-lg-3 d-flex">
                                    <button onclick="hideMemberInputField()" type="button" class="btn create-btn delete-btn ms-auto"><i class="fa-solid fa-minus"></i></i></button>
                                    <button onclick="showMemberInputField()" type="button" class="btn create-btn ms-auto"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                        <a class="btn primary-btn mt-3" href="/tour/{{$tour->id}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                        <button class="btn primary-btn secondary-btn mt-3" type="submit">Aanmaken <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
