@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Welkom op het <span class="title-colored">Dashboard</span></h1>
                <p>Teams die meedoen aan AvansTour</p>

            </div>
            <div class="col-12 grey-bg my-5 p-0 p-lg-5">
                <div class="accordion accordion-flush">
                    @foreach($teams as $team)
                    <div class="accordion-item mb-3">
                      <h2 class="accordion-header" id="header-{{$team->team_id}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#button-{{$team->team_id}}" aria-expanded="false" aria-controls="button-{{$team->team_id}}">
                            <div class="d-block">
                                <p class="d-inline fw-bold dashboard-link">{{$team->team_name}} | <span class="title-colored">{{$team->tour_name}}</span> ({{count($team->progress)}})</p>
                            </div>
                        </button>
                      </h2>

                      <div class="accordion-collapse collapse" id="button-{{$team->team_id}}" aria-labelledby="header-{{$team->team_id}}">
                        <div class="accordion-body p-4">
                          <h4 class="fw-bold mb-3">Na te kijken <span class="title-colored">vragen</span></h4>

                          @foreach($team->progress as $progress)
                          <div class="card mb-3">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img @if(!empty($progress->question->image_url)) src="{{asset('tourimg/'. $progress->question->image_url)}}" @else src="{{asset('img/landing_img.png')}}" @endif class="img-fluid">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h4 class="card-title title-colored">{{$progress->question->title}} <small class="small-text text-muted">({{$progress->question->type}}-vraag)</small></h4>
                                  <p class="card-text">{{$progress->question->description}}</p>
                                </div>
                              </div>
                              <div class="col-md-12 card-footer accordion accordion-flush p-0">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="progressheader-{{$progress->question_id}}-{{$progress->team_id}}">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#progress-{{$progress->question_id}}-{{$progress->team_id}}" aria-expanded="false" aria-controls="progress-{{$progress->question_id}}-{{$progress->team_id}}">
                                      Nakijken
                                    </button>
                                  </h2>
                                  <div id="progress-{{$progress->question_id}}-{{$progress->team_id}}" class="accordion-collapse collapse" aria-labelledby="progress-{{$progress->question_id}}-{{$progress->team_id}}" data-bs-parent="#progress-{{$progress->question_id}}-{{$progress->team_id}}">
                                    <div class="accordion-body p-3">
                                        <h5 class="fw-bold">Team <span class="title-colored">{{$team->team_name}}</span> heeft geantwoord:</h5>

                                        @if($progress->question->type == 'Media')
                                            <img class="img-fluid" src="{{asset('teamimg/' . $progress->answer->answer)}}" height="400" width="300" />
                                        @else
                                            <p>{{$progress->answer->answer}}</p>
                                        @endif

                                        <div class="d-block">
                                            <button onclick="location.href='/dashboard/team/{{$team->team_id}}/vraag/{{$progress->question_id}}/goed'"
                                                class="btn create-btn mt-2">Goedkeuren <i class="fa-solid fa-check"></i>
                                            </button>

                                            <button onclick="JSalertCorrectAnswer()" class="btn create-btn delete-btn mt-2">
                                                <a id="incorrect-answer-url" style="pointer-events: none" href="/dashboard/team/{{$team->team_id}}/vraag/{{$progress->question_id}}/fout">Afkeuren <i class="fa-solid fa-xmark"></i></a>
                                            </button>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
            </div>
        </div>
    </div>
@endsection
