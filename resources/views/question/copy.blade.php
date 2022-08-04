@extends('layouts.app')
@section('title', 'Vraag kopiëren')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 grey-bg my-5 p-5">
                <div class="row">
                    <div class="col-12">
                        <h1><span class="title-colored">Kopieer</span> Vraag</h1>
                        <h2 class="mb-5">{{$question->title}}</h2>
                        <p>Selecteer hieronder naar welke tours je de vraag wilt kopiëren</p>
                    </div>
                    <div class="col-12 mt-5">
                        <form class="needs-validation grey-bg" novalidate action="/tour/{{$currentTour->id}}/vragen/kopie/{{$question->id}}" method="post">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="row">
                                @foreach($tours as $tour)
                                <div class="col-4 mx-auto mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="{{$tour->name}}" value="{{$tour->id}}"  id="tour{{ $loop->index }}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$tour->name}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-12 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                                <a class="btn primary-btn mt-3" href="{{ url()->previous() }}"><i class="fa-solid fa-chevron-left"></i> Annuleren</a>
                                <button class="btn primary-btn secondary-btn mt-3" type="submit">Kopiëren <i class="fa-solid fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
