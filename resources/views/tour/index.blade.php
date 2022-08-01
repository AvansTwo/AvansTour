@extends('layouts.app')
@section('title', 'Tours')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1>Kies een <span class="title-colored">Tour</span> !</h1>
                    </div>
                    @if(Auth::check())
                    <div class="col-12 col-lg-6">
                        <div class="float-none float-lg-end mb-5 mb-lg-0">
                            <button type="button" onclick="location.href='/tour/aanmaken';" class="btn create-btn mt-2"><i id="create-tour-btn-icon" class="fa-solid fa-square-plus"></i>Aanmaken</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 grey-bg p-5 my-5">
                <div class="row">
                    <div class="col-7 col-lg-10">
                        <h2>@isset($filteredCategory) Tours zijn gefiltered op {{$filteredCategory->category_name}} @else Op dit moment beschikbaar @endisset</h2>
                    </div>
                    <div class="col-5 col-lg-2">
                        <div class="float-end">
                            @isset($filteredCategory)
                                <button type="button" onclick="location.href='/tours';" class="btn primary-btn">Reset</button>
                            @else
                            <div class="dropdown">
                                <button class="dropbtn">Filter <i class="fa-solid fa-sort-down"></i></button>
                                <div class="dropdown-content">
                                    @foreach($categories as $category)
                                    <a href="/tours/categorie/{{ $category->id }}">{{$category->category_name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            @endisset
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="row">
                            @foreach($tours as $tour)
                                <div class="col-12 col-lg-4">
                                    <div class="tour-card mb-5 @if($tour->active == 0) hidden-tour @endif">
                                        <a class="text-decoration-none" href="/tour/{{$tour->id}}"><img class="img-fluid tour-img" src="@if(!empty($tour->image_url)){{ asset('tourimg/'. $tour->image_url) }}@else {{ asset('img/landing_img.png') }} @endif" alt="tour_card">
                                            <div class="tour-desc text-dark">
                                                <p class="tour-text">{{$tour->name}} @if($tour->active == 0) <i class="fa-solid fa-eye-slash"></i> @endif</p>
                                                <p id="tour-year" class="tour-text ml-5">{{date('Y', strtotime($tour->created_at))}} </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{$tours->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
