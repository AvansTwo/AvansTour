// Alertify javascript voor bevestiging tour afronden
function JSalertEndTour() {
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
            function () { }
        )
        .set("movable", false)
        .set("closable", false);
}

function JSalertDeleteUser(userId) {
    alertify
        .confirm(
            "Weet je het zeker?",
            "Wil je deze gebruiker echt verwijderen?",
            function () {
                document.getElementById(
                    "delete-user-url_" + userId
                ).style.pointerEvents = "";
                window.location.href = document.getElementById(
                    "delete-user-url_" + userId
                ).href;
            },
            function () { }
        )
        .set("movable", false)
        .set("closable", false);
}

function JSalertDeleteCategorie(categorieId) {
    alertify
        .confirm(
            "Weet je het zeker?",
            "Wil je deze categorie echt verwijderen?",
            function () {
                document.getElementById(
                    "delete-categorie-url_" + categorieId
                ).style.pointerEvents = "";
                window.location.href = document.getElementById(
                    "delete-categorie-url_" + categorieId
                ).href;
            },
            function () { }
        )
        .set("movable", false)
        .set("closable", false);
}

function JSalertDeleteTeamProgress() {
    alertify
        .confirm(
            "Weet je het zeker?",
            "Wil je teams tussen de gegeven data verwijderen? <strong class='d-block mt-3'>!! Bij het verwijderen van teams worden leden/fotos/antwoorden ook verwijderd !!</strong>",
            function () {
                document.getElementById("deleteTeamsForm").submit();
            },
            function () { }
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
            function () { }
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
            function () { }
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
            function () { }
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
$("input[type=radio][name=type]").change(function () {
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
    document.getElementById("removeImage").value = 1;
}


function checkType(type) {
    if (type == "Meerkeuze") {
        $("#mediaQuestionAnswer").removeClass("d-none");

        $("#openvraagFields :input").attr({
            disabled: true,
            required: false,
        });

        $("#multipleChoiceFields :input").attr({
            disabled: true,
            required: false,
        });
    } else {
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
    document.getElementById("removeTourImageBool").value = 1;
}
