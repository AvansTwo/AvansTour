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
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Website <span class="title-colored">toegang</span> geven tot je locatie</h2>
                                                    <p class="mt-4">Als je een tour bent gestart kom je op de tour map uit, op deze pagina word gevraagd of je toestemming wilt geven dat de website je locatie gebruikt. Als je hier op accepteren/allow drukt word jouw locatie pin op de map geupdate en gedurende dat je de tocht loop bijgehouden.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/android_website_permission.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2><span class="title-colored">Toegang</span> geven tot je locatie door middel van slotje</h2>
                                                    <p>Het kan voorkomen dat de pop-up niet word getoond op jouw telefoon, je kunt door middel van op het slotje te klikken in de URL balk kijken of de website toegang heeft tot jouw locatie. Zorg dat de slider voor locatie permissie aanstaat. </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/android_website_lock_permission.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Webbrowser <span class="title-colored">toegang</span> geven tot je locatie door middel van instellingen</h2>
                                                    <p>Mocht je hebben ingesteld dat jouw webbrowser helemaal geen toegang heeft tot jouw locatie zal de website hier niet naar vragen. Navigeer naar: Instelligen->Apps->GoogleChrome*->Permissies en zet hier "locatie-toegang" op "Alleen wanneer ik de app gebruik".</p>
                                                    <small class="w-100 d-block my-2 fst-italic">*Google Chrome is in dit geval een voorbeeld, dit moet jouw desbetreffende browser zijn zoals bijv. FireFox of Opera</small>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/android_settings_permission.jpg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="locationIos">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLocationIos" aria-expanded="true">
                                        Instellen gebruik locatie IOS (Apple) besturingssysteem.
                                    </button>
                                </h2>
                                <div id="collapseLocationIos" class="accordion-collapse collapse" aria-labelledby="locationIOS" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Website <span class="title-colored">toegang</span> geven tot je locatie</h2>
                                                    <p class="mt-4">Als je een tour bent gestart kom je op de tour map uit, op deze pagina word gevraagd of je toestemming wilt geven dat de website je locatie gebruikt. Als je hier op accepteren/allow drukt word jouw locatie pin op de map geupdate en gedurende dat je de tocht loop bijgehouden.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/IOS_website_permission.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2><span class="title-colored">Toegang</span> geven tot je locatie door middel van browser instellingen</h2>
                                                    <p>Om je exacte locatie weer te geven op de website heeft de website toegang nodig van Safari. Dit doe je door op het aA icoon op je zoekbalk te drukken. Dit opent een submenu, druk vervolgens op de knop Website-instellingen. Deze knop brengt je naar een instellingen pagina waar u verschillende instellingen vind. Klik hier vervolgens op Locatie en ten slotte op Sta toe.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/IOS_website_lock_permission.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Webbrowser <span class="title-colored">toegang</span> geven tot je locatie door middel van instellingen</h2>
                                                    <p>Heeft AvansTour nog steeds geen toegang tot jouw locatie of staat deze in het centrum van Breda? Dan heeft Safari hoogst waarschijnlijk helemaal geen toegang tot je locatie. Je kunt in de instellingen van je apparaat toegang geven door naar de volgende pagina te gaan:
                                                        <strong>Privacy > Locatievoorzieningen > Safari-sites</strong>
                                                        Op deze pagina staan de instellingen voor toegang tot locatie van Safari. Controleer of de instellingen als volgt staan.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/IOS_settings_permission.jpg') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
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
