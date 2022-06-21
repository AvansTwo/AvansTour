@extends('layouts.app')
@section('title', 'Categorie pagina')
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
                            <button type="button" data-bs-toggle="modal" data-bs-target="#createCategoryModel" class="btn create-btn mt-2"><i id="create-tour-btn-icon" class="fa-solid fa-square-plus"></i>Toevoegen</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grey-bg my-5 p-5 mb-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3">Categorieën AvansTour</h2>
                    </div>
                    <div class="col-12">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Naam</th>
                                <th scope="col">Verwijderen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{$categorie->category_name }}</td>
                                    <td>
                                        <button type="button" onclick="JSalertDeleteCategorie()" class="btn secondary-btn delete-btn">
                                            <a id="delete-categorie-url" style="pointer-events: none" href="/instellingen/categorie/{{$categorie->id}}/verwijderen" class="fa-solid fa-trash"></a>
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

        <!-- Create Category Modal -->
        <div class="modal fade" id="createCategoryModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Categorie aanmaken</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Geef de naam op van de nieuwe categorie</p>
                        <form class="needs-validation" novalidate action="/instellingen/categorie/aanmaken" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-10 mx-auto mb-3">
                                    <label for="categoryName" class="mb-1 fw-bold">Naam</label>
                                    <input type="text" required name="category_name" class="form-control" id="categoryName" placeholder="Informatica">
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
@endsection
