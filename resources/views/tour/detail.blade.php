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
                            <p class="my-auto">Vragen: {{count($tour->question)}}</p>
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
                                    <button type="button" onclick="JSalertDeleteTour()" class="btn create-btn delete-btn mt-2">
                                        <a id="delete-tour-url" style="pointer-events: none" href="/tour/verwijderen/{{$tour->id}}" class="fa-solid fa-trash"></a>
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
                                 src="@if(!empty($tour->image_url)){{ asset('tourimg/'. $tour->image_url) }}@else {{ asset('img/landing_img.png') }} @endif" alt="tour-detail-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grey-bg p-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3 fw-bold"><i class="fa-solid fa-earth-europe tour-icon-bold"></i> Startlocatie:</h2>
                        <x-leaflet-map :centerpoint="$tour->location" :markers="$startLocation" markerCallback="startLocationMarkerClick"></x-leaflet-map>
                    </div>
                </div>
            </div>
            @if(Auth::check())
                <div class="col-12 grey-bg p-5 mt-3 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-3">Tour vragen</h2>
                        </div>
                        <div class="col-12 table-responsive">
                            <table class="table text-center table-striped custom-table-responsive">
                                <thead>
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{$question->title}}</td>
                                    <td>{{$question->description}}</td>
                                    <td>{{$question->points}}</td>
                                    <td>
                                        <button onclick="location.href='/vragen/{{$question->id}}';" class="btn secondary-btn"><i class="fa-solid fa-eye"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
