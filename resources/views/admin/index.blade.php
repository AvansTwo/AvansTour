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
                <button type="button" class="btn settins-link" data-bs-toggle="modal" data-bs-target="#radiusModal">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-location-arrow"></i>
                        <h4 class="mt-2">Radius</h4>
                    </div>
                </button>
            </div>
            <div class="col-6 d-flex justify-content-around mb-5">
                <button type="button" class="btn settins-link" data-bs-toggle="modal" data-bs-target="#deleteDataModal">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-trash-arrow-up"></i>
                        <h4 class="mt-2">Gegevens</h4>
                    </div>
                </button>
            </div>
            <div class="col-6 d-flex justify-content-around mb-5">
                <a class="settins-link" href="/instellingen/gebruikers">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-users"></i>
                        <h4 class="mt-2">Gebruikers</h4>
                    </div>
                </a>
            </div>
            <div class="col-6 d-flex justify-content-around mb-5">
                <a class="settins-link" href="/instellingen/categorieën">
                    <div class="settings-btn-bg button-wrapper flex-column d-flex justify-content-center text-center">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <h4 class="mt-2">Opleidingen</h4>
                    </div>
                </a>
            </div>
        </div>

        <!-- Radius Modal -->
        <div class="modal fade" id="radiusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Radius tours aanpassen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center w-60 mx-auto">Geef aan hoe dichtbij de speler bij het punt moet zijn (in meter).</p>
                        <form class="needs-validation" novalidate action="/instellingen/radius/aanpassen" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-12 mx-auto mb-3">
                                    <div class='ctrl d-flex justify-content-center my-5'>
                                        <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                                        <div class='ctrl__counter'>
                                            <input class='ctrl__counter-input' name="radius" maxlength='10' type='text' value='@if(!empty($radius)) {{$radius->radius}} @else 100 @endif'>
                                            <div class='ctrl__counter-num'>@if(!empty($radius)) {{$radius->radius}} @else 100 @endif</div>
                                        </div>
                                        <div class='ctrl__button ctrl__button--increment'>+</div>
                                    </div>
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

        <!-- Delete Data Modal -->
        <div class="modal fade" id="deleteDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gegevens verwijderen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Geef aan van welke tot welke datum je tourgegevens wilt verwijderen</p>
                        <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-8 mx-auto mb-3">
                                    <label for="startdate" class="mb-1 fw-bold">Start datum</label>
                                    <input class="form-control rounded-0" required type="date" placeholder="test" aria-label="Datum" aria-describedby="button-addon3" name="startdate" value="YYYY-MM-DD"/>
                                </div>
                                <div class="col-8 mx-auto mb-3">
                                    <label for="enddate" class="mb-1 fw-bold">Eind datum</label>
                                    <input class="form-control rounded-0" required type="date" placeholder="test" aria-label="Datum" aria-describedby="button-addon3" name="enddate" value="YYYY-MM-DD"/>
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
        (function() {
            'use strict';
            function ctrls() {
                var _this = this;
                this.counter = @if(!empty($radius)) {{$radius->radius}} @else 100 @endif;
                this.els = {
                    decrement: document.querySelector('.ctrl__button--decrement'),
                    counter: {
                        container: document.querySelector('.ctrl__counter'),
                        num: document.querySelector('.ctrl__counter-num'),
                        input: document.querySelector('.ctrl__counter-input')
                    },
                    increment: document.querySelector('.ctrl__button--increment')
                };
                this.decrement = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (_this.counter > 10) ? counter -10 : counter;
                    _this.setCounter(nextCounter);
                };
                this.increment = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (counter <= 990) ? counter+10 : counter;
                    _this.setCounter(nextCounter);
                };
                this.getCounter = function() {
                    return _this.counter;
                };
                this.setCounter = function(nextCounter) {
                    _this.counter = nextCounter;
                };
                this.debounce = function(callback) {
                    setTimeout(callback, 100);
                };
                this.render = function(hideClassName, visibleClassName) {
                    _this.els.counter.num.classList.add(hideClassName);
                    setTimeout(function() {
                        _this.els.counter.num.innerText = _this.getCounter();
                        _this.els.counter.input.value = _this.getCounter();
                        _this.els.counter.num.classList.add(visibleClassName);
                    }, 100);
                    setTimeout(function() {
                        _this.els.counter.num.classList.remove(hideClassName);
                        _this.els.counter.num.classList.remove(visibleClassName);
                    }, 200);
                };
                this.ready = function() {
                    _this.els.decrement.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.decrement();
                            _this.render('is-decrement-hide', 'is-decrement-visible');
                        });
                    });
                    _this.els.increment.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.increment();
                            _this.render('is-increment-hide', 'is-increment-visible');
                        });
                    });
                    _this.els.counter.input.addEventListener('input', function(e) {
                        var parseValue = parseInt(e.target.value);
                        if (!isNaN(parseValue) && parseValue >= 0) {
                            _this.setCounter(parseValue);
                            _this.render();
                        }
                    });
                    _this.els.counter.input.addEventListener('focus', function(e) {
                        _this.els.counter.container.classList.add('is-input');
                    });
                    _this.els.counter.input.addEventListener('blur', function(e) {
                        _this.els.counter.container.classList.remove('is-input');
                        _this.render();
                    });
                };
            };
            // init
            var controls = new ctrls();
            document.addEventListener('DOMContentLoaded', controls.ready);
        })();
    </script>
@endsection
