@extends('layouts.app')
@section('title', 'Tour aanmaken')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-5 text-center">Een <span class="title-colored">tour</span> aanmaken</h1>
            </div>
            <div class="col-12 my-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="needs-validation py-5 grey-bg" novalidate action="/tour/aanmaken" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-row">
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourName" class="mb-1 fw-bold">Naam tocht</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="tourName" placeholder="Informatica tour" required>
                            @error('name')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="validationCustom02" class="mb-1 fw-bold">Beschrijving tour</label>
                            <textarea class="form-control" name="description" id="descriptionTour" placeholder="Tour voor eerste jaars informatica studenten" rows="5" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourStartLocation" class="mb-1 fw-bold">Start locatie</label>
                            <div id="map">
                            <x-leaflet-map centerpoint="51.583683,4.798869"  mapCallback="mapPickLocation"></x-leaflet-map>
                            <div id="locationChanged" class="alert alert-success d-none mb-0 py-1" role="alert">Locatie aangepast!</div>
                            <br>
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend" onclick="showMap()">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                                </div>
                                <input type="text" value="{{ old('location') }}" class="form-control" name="location" id="tourStartLocation" value="51.583683,4.798869" aria-describedby="inputGroupPrepend" readonly>
                                @error('location')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="image_url" class="mb-1 fw-bold">Tour foto</label>
                            <input class="form-control @error('image_url') is-invalid @enderror" value="{{ old('image_url') }}" name="image_url" type="file" accept="image/png, image/jpg, image/jpeg" id="formFile">
                            <small class="w-100 d-block">Bestandstypen: jpeg,png,jpg | Max grootte: 8MB | Minimale afmetingen: 600x350</small>
                            <div class="invalid-feedback">
                                Selecteer een afbeelding.
                            </div>
                        </div>
                        <div class="col-10 mx-auto mb-3">
                            <label for="tourCategory" class="mb-1 fw-bold">Categorie</label>
                            <select class="form-select" id="tourCategory" name="category_id" required>
                                <option disabled selected hidden>Selecteer opleidings categorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger mt-1">Je dient een catgorie te selectere.</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                        <a class="btn primary-btn mt-3" href="/tours"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                        <button class="btn primary-btn secondary-btn mt-3" type="submit">Aanmaken <i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
