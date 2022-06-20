@extends('layouts.app')
@section('title', 'Vraag detail')
@section('content')
<div class="container">
    <div class="row my-5 col-12">

        <div class="col-12 col-lg-6">
            <p>Geef aan hoe dichtbij de speler bij het punt moet zijn.</p>
            <div class='ctrl'>
                <div class='ctrl__button ctrl__button--decrement'>&ndash;</div>
                <div class='ctrl__counter'>
                  <input class='ctrl__counter-input' maxlength='10' type='text' value='0'>
                  <div class='ctrl__counter-num'>100</div>
                </div>
                <div class='ctrl__button ctrl__button--increment'>+</div>
            </div>

            <button type="button" onclick="saveRange()" class="btn primary-btn mt-5">Opslaan</button>
        </div>


        <div class="col-12 col-lg-6">
            <p>Geef aan van welke tot welke datum wil je tourgegevens verwijderen</p>
            <label for="start">Start date:</label>

            <input type="date" id="start" name="trip-start" value="2022-06-20" min="2000-01-01" max="2050-12-31">

            <label for="start">End date:</label>
            <input type="date" id="start" name="trip-end" value="2022-06-20" min="2000-01-01" max="2050-12-31">
        </div>

        <div class="col-12 col-lg-6 my-5">    
            <label for="category" class="mb-1 fw-bold">Categorie toevoegen</label>
            <input type="text" name="name" class="form-control" id="tourName" placeholder="Categorie naam">
            
            <button type="button" onclick="deleteTourData()" class="btn primary-btn mt-5">Opslaan</button>
        </div>

        <div class="col-12 col-lg-6 my-5">
            <p>Nieuwe gebruiker registeren</p>
            <button type="button" onclick="location.href='/register';" class="btn primary-btn mt-5">Register</button>
        </div>
    </div>
</div>

<script src="dist/js/datepicker.min.js"></script>
<script src="dist/js/locales/fr.min.js"></script>

<script>

    (function() {
    'use strict';
    function ctrls() {
        var _this = this;
        this.counter = 100;
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
