@extends('layouts.app')
@section('title', 'Gebruikers pagina')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" onclick="location.href='/instellingen';"
                        class="btn primary-btn secondary-btn mt-5"><i class="fa-solid fa-chevron-left"></i> Ga terug
                </button>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h1><span class="title-colored">AvansTour</span></h1>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="float-none float-lg-end mb-5 mb-lg-0">
                            <button type="button" onclick="location.href='/register';" class="btn create-btn mt-2"><i id="create-tour-btn-icon" class="fa-solid fa-square-plus"></i>Aanmaken</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grey-bg my-5 p-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3">Gebruikers AvansTour</h2>
                    </div>
                    <div class="col-12">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Naam</th>
                                <th scope="col">Email</th>
                                <th scope="col">Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <button type="button" onclick="JSalertDeleteUser()" class="btn secondary-btn delete-btn">
                                            <a id="delete-user-url" style="pointer-events: none" href="/instellingen/gebruiker/{{$user->id}}/verwijderen" class="fa-solid fa-trash"></a>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
