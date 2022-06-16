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
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        let count = 1;
        function showMemberInputField() {
            if(count === 8){
                document.getElementById("max_players_reached").classList.remove("d-none");
                setTimeout(function(){
                    document.getElementById("max_players_reached").classList.add("d-none");
             },5000);

            } else{
                count++;
                document.getElementById("team_player_label_"+count).classList.remove("d-none");
                document.getElementById("team_player_input_"+count).classList.remove("d-none");
                document.getElementById("team_player_input_"+count).disabled = false;
                document.getElementById("amount_players").value = count;
            }
        }

        function hideMemberInputField() {
            if(count != 1){
                document.getElementById("team_player_label_"+count).classList.add("d-none");
                document.getElementById("team_player_input_"+count).classList.add("d-none");
                document.getElementById("team_player_input_"+count).disabled = true;
                count--;
                document.getElementById("amount_players").value = count;
            } else{
                document.getElementById("min_players_reached").classList.remove("d-none");
                setTimeout(function(){
                    document.getElementById("min_players_reached").classList.add("d-none");
             },5000);
            }
        }
    </script>
@endsection
