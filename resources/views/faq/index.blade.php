@extends('layouts.app')
@section('title', 'FAQ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 grey-bg my-5 p-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-5 text-center"><span class="title-colored">FAQ pagina</span> AvansTour</h1>
                        <p class="text-center">Hier kun je uitleg vinden over het gebruik van de website, zo is het van belang dat jouw locatie instellingen goed staan anders kun je geen speurtocht spelen.</p>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="locationAndroid">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLocationAndroid" aria-expanded="true">
                                        Instellen gebruik locatie Android besturingssysteem.
                                    </button>
                                </h2>
                                <div id="collapseLocationAndroid" class="accordion-collapse collapse" aria-labelledby="locationAndroid" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                       Hier komt informatie over het instellen.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="locationIos">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLocationIos" aria-expanded="true">
                                        Instellen gebruik locatie IOS (Apple) besturingssysteem.
                                    </button>
                                </h2>
                                <div id="collapseLocationIos" class="accordion-collapse collapse" aria-labelledby="locationAndroid" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Hier komt informatie over het instellen.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
