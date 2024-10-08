@extends('layouts.app')
@section('title', 'Tour detail')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" onclick="location.href='/tours';"
                        class="btn primary-btn secondary-btn mt-5"><i class="fa-solid fa-chevron-left"></i> Ga terug
                </button>
            </div>
            <div class="col-12 grey-bg p-5 my-5">
                <div class="row">
                    <div class="col-12 col-lg-6 order-1 order-lg-6">
                        <h1>{{$tour->name}}</h1>
                        <p>{{$tour->description}}</p>
                        @if(!Auth::check())
                            <div class="col-12 d-flex mt-4">
                                <i class="fa-solid fa-question question-icon-mark"></i>
                                <p class="my-auto">Vragen: {{count($tour->tourQuestion)}}</p>
                            </div>
                            <div class="col-12 d-flex mt-4">
                                <i class="fa-solid fa-star tour-icon"></i>
                                <p class="my-auto">Punten: {{$totalPoints}}</p>
                            </div>
                        @endif
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-book tour-icon"></i>
                            <p class="my-auto">Opleiding: {{$tour->category->category_name}}</p>
                        </div>
                        <div class="col-12 d-flex mt-4">
                            <i class="fa-solid fa-user tour-icon"></i>
                            <p class="my-auto">Maker: {{$tour->user->name}}</p>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <button type="button" onclick="location.href='/tour/{{$tour->id}}/quiz';"
                                            class="btn primary-btn d-block d-lg-inline">Start nu <i
                                            class="fa-solid fa-chevron-right"></i></button>
                                </div>
                                @if(Auth::check())
                                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                                        <button onclick="location.href='/tour/aanpassen/{{$tour->id}}';"
                                                class="btn create-btn edit-btn mt-2"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button"
                                                onclick="location.href='/tour/{{$tour->id}}/vragen/aanmaken';"
                                                class="btn create-btn mt-2"><i class="mr-5 fa-solid fa-square-plus"></i>
                                        </button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#copyTourDataModel" class="btn create-btn copy-btn mt-2"><i class="mr-5 fa-solid fa-copy"></i>
                                        </button>
                                        <button type="button" onclick="JSalertDeleteTour()"
                                                class="btn create-btn delete-btn mt-2">
                                            <a id="delete-tour-url" style="pointer-events: none"
                                               href="/tour/verwijderen/{{$tour->id}}" class="fa-solid fa-trash"></a>
                                        </button>
                                        <button type="button"
                                                onclick="location.href='/tour/{{$tour->id}}/eindigen';"
                                                class="btn create-btn finish-btn mt-2 ms-4"><i class="mr-5 fa-solid fa-flag-checkered"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 order-6 order-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-fluid rounded mb-5 mb-lg-0"
                                 src="@if(!empty($tour->image_url)){{ $tour->image_url }}@else {{ asset('img/landing_img.png') }} @endif" alt="tour-detail-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grey-bg p-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3 fw-bold"><i class="fa-solid fa-earth-europe tour-icon-bold"></i> Startlocatie:
                        </h2>
                        <x-leaflet-map :centerpoint="$tour->location" :markers="$startLocation"
                                       markerCallback="startLocationMarkerClick"></x-leaflet-map>
                    </div>
                </div>
            </div>

            <div class="col-12 grey-bg p-5 mb-5">
                <div class="row">
                    <div class="col-12 fw-bold">
                        <h2 class="mb-3 fw-bold"><i class="fa-solid fa-trophy tour-icon-bold"></i> Top 5 teams van vandaag:</h2>
                    </div>
                    <div class="col-12 table-responsive">
                        @if(!empty($topTeams[0]))
                        <table class="table text-center table-striped custom-table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Teamnaam</th>
                                <th scope="col">Totale tijd</th>
                                <th scope="col">Punten</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($topTeams as $key => $topTeam)
                                    <tr>

                                        <td>
                                            @if($key == 0)
                                                <i class="fas fa-medal my-auto d-inline mr-2 medal gold"></i>
                                            @elseif($key == 1)
                                                <i class="fas fa-medal my-auto d-inline mr-2 medal silver"></i>
                                            @elseif($key == 2)
                                                <i class="fas fa-medal my-auto d-inline mr-2 medal bronze"></i>
                                            @else
                                                {{$key}}
                                            @endif
                                        </td>
                                        <td>{{$topTeam->team_name}}</td>
                                        <td>{{$topTeam->timeDiff}}</td>
                                        <td>{{$topTeam->totalPoints}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h3>Deze tour is vandaag nog niet gelopen😮</h3>
                        @endif
                    </div>
                </div>
            </div>
            @if(Auth::check())
            <div class="col-12 grey-bg p-5 mt-3 mb-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3 fw-bold"><i class="fa-solid fa-clipboard-list tour-icon-bold"></i> Tour vragen:</h2>
                    </div>
                    <div class="col-12 table-responsive">
                        <table class="table text-center table-striped custom-table-responsive">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titel</th>
                                <th scope="col">Type vraag</th>
                                <th scope="col">Punten</th>
                                <th scope="col">Aanpassen</th>
                                <th scope="col">Kopiëren</th>
                                <th scope="col">Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($tour->tourQuestion as $tourQuestion)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$tourQuestion->question->title}}</td>
                                    <td>{{$tourQuestion->question->type}}</td>
                                    <td>{{$tourQuestion->question->points}}</td>
                                    <td>
                                        <button onclick="location.href='/tour/{{$tour->id}}/vragen/aanpassen/{{$tourQuestion->question->id}}';" class="btn create-btn edit-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                    <td>
                                        <button onclick="location.href='/tour/{{$tour->id}}/vragen/kopie/{{$tourQuestion->question->id}}';" class="btn create-btn copy-btn"><i class="fa-solid fa-copy"></i></button>
                                    </td>
                                    <td>
                                        <button type="button" onclick="JSalertDeleteQuestion({{$tourQuestion->id}})" class="btn create-btn delete-btn">
                                            <a id="delete-question-url-{{$tourQuestion->id}}" style="pointer-events: none" href="/tour/{{$tour->id}}/vragen/verwijderen/{{$tourQuestion->id}}" class="fa-solid fa-trash"></a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            <!-- Copy Tour Data Modal -->
            <div class="modal fade" id="copyTourDataModel" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tour kopiëren</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Wil je een tour kopiëren? <span class="d-block mt-2">Alle vragen worden ook mee gekopieerd.</span></p>
                            <form id="copyTourForm" class="needs-validation" novalidate action="/tour/{{$tour->id}}/kopie" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-10 mx-auto mb-3 mt-2">
                                        <label for="tourName" class="mb-1 fw-bold">Tour naam*</label>
                                        <input class="form-control rounded-0" required type="text" placeholder="Informatica tour (kopie)" aria-label="Tour naam" name="tourName"/>
                                        <small class="w-100 d-block mt-1 fst-italic">*Tournaam dient uniek te zijn.</small>
                                        @error('tourName')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn primary-btn secondary-btn" data-bs-dismiss="modal">Sluiten</button>
                                    <button type="submit" class="btn primary-btn">Kopiëren</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
