@extends('layouts.app')
@section('title', 'Settings pagina')
@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Settings pagina van<span class="title-colored"> AvansTour</span></h1>
                <p class="mb-5">Kies wat je wilt aanmaken, wijzigen of verwijderen</p>
            </div>
            <div class="col-6 d-flex justify-content-around mb-5">
                <button type="button" class="btn settins-link" data-toggle="modal" data-target="#radiusModal">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-location-arrow"></i>
                        <h4 class="mt-2">Radius</h4>
                    </div>
                </button>
            </div>
            <div class="col-6 d-flex justify-content-around mb-5">

                <button type="button" class="btn settins-link" data-toggle="modal" data-target="#deleteDataModal">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-trash-arrow-up"></i>
                        <h4 class="mt-2">Gegevens</h4>
                    </div>
                </button>
            </div>
            <div class="col-6 d-flex justify-content-around mb-5">
                <a class="settins-link" href="">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-users"></i>
                        <h4 class="mt-2">Gebruikers</h4>
                    </div>
                </a>
            </div>
            <div class="col-6 d-flex justify-content-around mb-5">
                <a class="settins-link" href="">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <h4 class="mt-2">Opleidingen</h4>
                    </div>
                </a>
            </div>
        </div>

        <!-- Radius Modal -->
        <div class="modal fade" id="radiusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Radius tours aanpassen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center w-60 mx-auto">Geef aan hoe dichtbij de speler bij het punt moet zijn (in meter).</p>
                        <div class='ctrl d-flex justify-content-center my-5'>
                            <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                            <div class='ctrl__counter'>
                                <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                                <div class='ctrl__counter-num'>100</div>
                            </div>
                            <div class='ctrl__button ctrl__button--increment'>+</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                        <button type="button" class="btn btn-primary">Opslaan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Data Modal -->
        <div class="modal fade" id="deleteDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gegevens verwijderen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Geef aan van welke tot welke datum je tourgegevens wilt verwijderen</p>
                        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-6 mx-auto mb-3">
                                    <label for="startdate" class="mb-1 fw-bold">Start datum</label>
                                    <input class="form-control rounded-0" required type="date" placeholder="test" aria-label="Datum" aria-describedby="button-addon3" name="startdate" value="YYYY-MM-DD"/>
                                </div>
                                <div class="col-6 mx-auto mb-3">
                                    <label for="enddate" class="mb-1 fw-bold">Eind datum</label>
                                    <input class="form-control rounded-0" required type="date" placeholder="test" aria-label="Datum" aria-describedby="button-addon3" name="enddate" value="YYYY-MM-DD"/>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
