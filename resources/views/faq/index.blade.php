@extends('layouts.app')
@section('title', 'FAQ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 grey-bg my-5 p-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-5"><span class="title-colored">FAQ pagina</span> AvansTour</h1>
                        <p>Hier kun je uitleg vinden over het gebruik van de website, zo is het van belang dat jouw locatie instellingen goed staan anders kun je geen speurtocht spelen.</p>
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
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="howToPlay">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHowToPlay" aria-expanded="true">
                                        Hoe speel je een tour?
                                    </button>
                                </h2>
                                <div id="collapseHowToPlay" class="accordion-collapse collapse" aria-labelledby="howToPlay" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Een <span class="title-colored">tour</span> kiezen</h2>
                                                    <p class="mt-4">Als je in de navigatiebalk op 'Tours' klikt, kom je op de index pagina terecht met alle tours die Avans aanbiedt. Klik hier op een tour die je wilt spelen.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Tour_Page.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Een <span class="title-colored">tour</span> starten</h2>
                                                    <p class="mt-4">Nadat je een tour hebt geselecteerd kom je op de detail pagina uit van een tour, hier vind je wat informatie over de tour en onderaan de pagina een knop om de tour te starten.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Tour_Detail.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Een <span class="title-colored">team</span> aanmaken</h2>
                                                    <p class="mt-4">Voordat de tour start moet je eerst een team aanmaken, een teamnaam is verplicht en een team bestaat uit minimaal 1 speler en maximaal 8. Je kunt door middel van het (+) en (-) het aantal teamleden aanpassen.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Create_Team.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Een <span class="title-colored">team</span> aanmaken</h2>
                                                    <p class="mt-4">Voordat de tour start moet je eerst een team aanmaken, een teamnaam is verplicht en een team bestaat uit minimaal 1 speler en maximaal 8. Je kunt door middel van het (+) en (-) het aantal teamleden aanpassen.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Create_Team.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>De tour <span class="title-colored">map</span> begrijpen</h2>
                                                    <p class="mt-4">Op de tour map zijn meerdere zogenaamde 'pins' te zien. Zo heb je rode pins met het Avans logo daarop, dit zijn vragen die beantwoord moeten worden. Je ziet ook een blauwe pin met 3 gebruikers erop, dit is de huidige locatie van jouw groepje. Komt deze locatie niet overeen met waar je nu staat kijk dan in een van de FAQ onderwerpen over hoe je je locatie goed toestaat. Om jouw locatie pin is ook een blauwe cirkel getrokken, dit is de radius van jouw groepje, de rode vraag pins moeten binnen deze cirkel staan wil je de vragen beantwoorden. Loop naar een van de vragen pins en druk op deze als ze in jouw radius cirkel staan.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Play_Map.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Het <span class="title-colored">beantwoorden</span> van een vraag</h2>
                                                    <p class="mt-4">Nadat je op een vraag pin hebt gedrukt die binnen jouw radius valt kom je op de antwoord pagina terecht. Hier staat de vraag en de antwoord mogelijkheid. Er zijn 3 soorten vragen, meerkeuze, open en media vragen. In het voorbeeld hiernaast is een mediavraag te zien, je moet een selfie uploaden van je groepje. Beantwoord de vraag en druk op versturen, je wordt hierna terugverwezen naar de pagina met de map.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Answer_Question.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Een <span class="title-colored">tour</span> afsluiten</h2>
                                                    <p class="mt-4">Heb je alle vragen beantwoord of moet je de tour vroegtijdig afronden druk dan op de rode knop onderaan de map pagina met 'afronden' erop. Je krijgt dan nog een melding of je zeker weet dat je de tour wilt afsluiten.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Stop_Tour.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Tour <span class="title-colored">score</span> bekijken</h2>
                                                    <p class="mt-4">Nadat je de tour hebt afgesloten kom je op de eindscore pagina uit, hier zie je hoe lang je over de tour hebt gedaan en hoeveel potentiële punten je hebt verdiend, open -en media vragen worden steekproefgewijs nagekeken, in principe krijg je de volle punten voor je antwoord maar het kan zijn dat deze later worden ingetrokken als je antwoord toch fout blijkt te zijn.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Result_Tour.jpg') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 mt-5">
                                                    <h2>Scoreboard <span class="title-colored">pagina</span></h2>
                                                        <p class="mt-4">Na de resultaat pagina word je doorgestuurd naar de scoreboard pagina, hier kun je bekijken hoe klasgenoten het hebben gedaan en kijken op welke plaats je bent geëindigd. Zo heb je meerdere filter opties en kun je sorteren op het aantal punten.</p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <img class="img-thumbnail" src="{{ asset('img/Scoreboard_Page.jpg') }}" alt="">
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
