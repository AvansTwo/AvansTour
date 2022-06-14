@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Vraag <span class="title-colored">123</span></h1>
                {{-- <p>Details</p> --}}
            
            </div>
            <div class="row grey-bg my-5 p-5">
                <div class="col-12 col-lg-8">
                    <p>Vraag: Waar kun je pizza scoren binnen de Avans locaties in Breda?</p>
                    <p><span class="title-colored">Paki bois</span> heeft als antwoord gegeven: <em> Hogeschoollaan </em></p>

                    <button onclick="alert('correct');"
                        class="btn create-btn mt-2"><i class="fa-solid fa-check"></i></button>

                    <button onclick="alert('wrong');"
                        class="btn create-btn delete-btn mt-2"><i class="fa-solid fa-xmark"></i></button>

                </div>

                <div class="col-12 col-lg-4">
                    <img class="img-fluid" src="{{ asset('img/landing_img.png') }}" alt="landing-image">
                </div>
            </div>
            
            
        </div>
    </div>
@endsection
