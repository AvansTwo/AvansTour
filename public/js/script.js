// Alertify javascript voor bevestiging tour afronden
function JSalert() {
    alertify
        .confirm(
            "Weet je het zeker?",
            "Wil je de tour afronden? Zodra de tour is afgerond kun je niet meer terug!",
            function () {
                document.getElementById("exit-tour-url").style.pointerEvents =
                    "";
                window.location.href =
                    document.getElementById("exit-tour-url").href;
            },
            function () {}
        )
        .set("movable", false)
        .set("closable", false);
}

// Alertify javascript voor bevestiging tour verwijderen
function JSalertDeleteTour() {
    alertify
        .confirm(
            "Weet je het zeker?",
            "Wil je deze tour verwijderen? Een verwijderde tour is echt weg!",
            function () {
                document.getElementById("delete-tour-url").style.pointerEvents =
                    "";
                window.location.href =
                    document.getElementById("delete-tour-url").href;
            },
            function () {}
        )
        .set("movable", false)
        .set("closable", false);
}

// Alertify javascript voor bevestiging vraag verwijderen
function JSalertDeleteQuestion() {
    alertify
        .confirm(
            "Weet je het zeker?",
            "Wil je deze vraag verwijderen? Een verwijderde vraag is echt weg!",
            function () {
                document.getElementById(
                    "delete-question-url"
                ).style.pointerEvents = "";
                window.location.href = document.getElementById(
                    "delete-question-url"
                ).href;
            },
            function () {}
        )
        .set("movable", false)
        .set("closable", false);
}

// Alertify javascript voor foutkeuren antwoord
function JSalertCorrectAnswer() {
    alertify
        .confirm(
            "Weet je het zeker?",
            "Wil je dit antwoord foutkeuren? Hierdoor krijgen de studenten geen punten voor deze vraag :(",
            function () {
                document.getElementById(
                    "incorrect-answer-url"
                ).style.pointerEvents = "";
                window.location.href = document.getElementById(
                    "incorrect-answer-url"
                ).href;
            },
            function () {}
        )
        .set("movable", false)
        .set("closable", false);
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                    form.addEventListener(
                        "submit",
                        function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        },
                        false
                    );
                }
            );
        },
        false
    );
})();

// Create question page
function showImageInput() {
    $("#questionImgWrapper").removeClass("d-none");
    $("#questionImg").attr({
        disabled: false,
        required: true,
    });

    $("#questionVideoWrapper").addClass("d-none");
    $("#questionVideo").attr({
        disabled: true,
        required: false,
    });
}

function showVideoInput() {
    $("#questionVideoWrapper").removeClass("d-none");
    $("#questionVideo").attr({
        disabled: false,
        required: true,
    });

    $("#questionImgWrapper").addClass("d-none");
    $("#questionImg").attr({
        disabled: true,
        required: false,
    });
}

$("input[type=radio][name=typeRadio]").change(function () {
    if (this.value == "Meerkeuze") {
        $("#multiple-choice-fields").show();
        $("#multiple-choice-fields :input").attr({
            disabled: false,
            required: true,
        });
    } else {
        $("#multiple-choice-fields").hide();
        $("#multiple-choice-fields :input").attr({
            disabled: true,
            required: false,
        });
    }
});

// Question edit page
function removeQuestionImage() {
    document.getElementById("questionImg").classList.remove("d-none");
    document.getElementById("questionImg").disabled = false;
    document.getElementById("tour-img-wrapper").classList.add("d-none");
}

function showImageInput() {
    if (!document.getElementById("questionPhoto")) {
        document.getElementById("questionImg").classList.remove("d-none");
    }
    document.getElementById("questionImgWrapper").classList.remove("d-none");
    document.getElementById("questionImg").disabled = false;
    document.getElementById("questionImg").required = true;

    document.getElementById("questionVideoWrapper").classList.add("d-none");
    document.getElementById("questionVideo").disabled = true;
    document.getElementById("questionVideo").required = false;
}

function showVideoInput() {
    document.getElementById("questionVideoWrapper").classList.remove("d-none");
    document.getElementById("questionVideo").disabled = false;
    document.getElementById("questionVideo").required = true;

    document.getElementById("questionImgWrapper").classList.add("d-none");
    document.getElementById("questionImg").disabled = true;
    document.getElementById("questionImg").required = false;
}

function checkType(type) {
    if (type == "Open") {
        $("#openvraagFields").removeClass("d-none");

        $("#multipleChoiceFields :input").attr({
            disabled: true,
            required: false,
        });

        $("#mediaQuestionAnswer :input").attr({
            disabled: true,
            required: false,
        });
    }

    if (type == "Media") {
        $("#mediaQuestionAnswer").removeClass("d-none");

        $("#openvraagFields :input").attr({
            disabled: true,
            required: false,
        });

        $("#multipleChoiceFields :input").attr({
            disabled: true,
            required: false,
        });
    }
}

// Create team page
let count = 1;
function showMemberInputField() {
    if (count === 8) {
        document
            .getElementById("max_players_reached")
            .classList.remove("d-none");
        setTimeout(function () {
            document
                .getElementById("max_players_reached")
                .classList.add("d-none");
        }, 5000);
    } else {
        count++;
        document
            .getElementById("team_player_label_" + count)
            .classList.remove("d-none");
        document
            .getElementById("team_player_input_" + count)
            .classList.remove("d-none");
        document.getElementById("team_player_input_" + count).disabled = false;
        document.getElementById("amount_players").value = count;
    }
}

function hideMemberInputField() {
    if (count != 1) {
        document
            .getElementById("team_player_label_" + count)
            .classList.add("d-none");
        document
            .getElementById("team_player_input_" + count)
            .classList.add("d-none");
        document.getElementById("team_player_input_" + count).disabled = true;
        count--;
        document.getElementById("amount_players").value = count;
    } else {
        document
            .getElementById("min_players_reached")
            .classList.remove("d-none");
        setTimeout(function () {
            document
                .getElementById("min_players_reached")
                .classList.add("d-none");
        }, 5000);
    }
}

// Edit tour page
function removeTourImage() {
    document.getElementById("tour-img-input").classList.remove("d-none");
    document.getElementById("tour-img-input").disabled = false;
    document.getElementById("tour-img-wrapper").classList.add("d-none");
}

// Admin page counter
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


$(function() {
    $('#datepicker').datepicker();
});

