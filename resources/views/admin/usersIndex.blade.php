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
                            <button type="button" data-bs-toggle="modal" data-bs-target="#createUserModal" class="btn create-btn mt-2"><i id="create-tour-btn-icon" class="fa-solid fa-square-plus"></i>Aanmaken</button>
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

        <!-- Create User Modal -->
        <div class="modal fade bd-example-modal-lg" id="createUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gebruiker aanmaken</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate action="/instellingen/gebruiker/aanmaken" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-10 mx-auto mb-3">
                                    <label for="username" class="mb-1 fw-bold">Gebruikersnaam</label>
                                    <input type="text" required name="username" value="{{ old('username') }}" class="form-control" placeholder="JanPeter2">
                                    @error('username')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-10 mx-auto mb-3">
                                    <label for="email" class="mb-1 fw-bold">Email</label>
                                    <input type="email" required name="email" value="{{ old('email') }}" class="form-control" placeholder="Janpeter@student.avans.nl">
                                    @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-10 mx-auto mb-3">
                                    <label for="password" class="mb-1 fw-bold">Wachtwoord</label>
                                    <input type="password" required name="password" value="{{ old('password') }}" class="form-control" placeholder="*****">
                                    @error('password')
                                    <div class="alert alert-danger mt-1">Wachtwoord moet uit minimaal 8 karakters, minimaal 1 letter en 1 cijfer bestaan.</div>
                                    @enderror
                                </div>
                                <div class="col-10 mx-auto mb-3">
                                    <label for="confirm_password" class="mb-1 fw-bold">Bevestig wachtwoord</label>
                                    <input type="password" required name="password_confirmation" class="form-control" placeholder="*****">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn primary-btn secondary-btn" data-bs-dismiss="modal">Sluiten</button>
                                <button type="submit" class="btn primary-btn">Opslaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if ($errors->any())
        $(document).ready(function(){
            $("#createUserModal").modal('show');
        });
        @endif
    </script>
@endsection
