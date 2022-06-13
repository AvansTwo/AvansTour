// Example starter JavaScript for disabling form submissions if there are invalid fields
function FormRequiredFields() {
    ("use strict");

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
                getAnswers();
            },
            false
        );
    });
}

qCounter = 1;

function addQuestion() {
    const question = document.getElementById("question1");
    qCounter++;
    const questionClone = question.cloneNode(true);
    questionClone.id = `question${qCounter}`;

    var aCounter = 0;
    let tbody = questionClone.childNodes[1];

    for (var i = 0; i < tbody.childNodes.length; i = i + 2) {
        if (
            tbody.childNodes[
                i
            ].childNodes[1].childNodes[0].nodeName.toLowerCase() == "input"
        ) {
            let input = tbody.childNodes[i].childNodes[1].childNodes[0];
            if (input.name) {
                //Answer
                let text = tbody.childNodes[i].childNodes[1].childNodes[2];
                text.value = "";
                input.id = `Q${qCounter}A${aCounter}`;
                input.name = `question${qCounter}`;
                input.checked = false;
            } else {
                //Question
                input.id = `Q${qCounter}`;
                input.placeholder = `Vraag ${qCounter}`;
            }
            input.value = "";
            aCounter++;
        }
    }
    document.getElementById("questions").appendChild(questionClone);
}

let Questions = [];

function getAnswers() {
    for (let j = 1; j <= qCounter; j++) {
        const question = document.getElementById(`question${j}`);
        let tbody = question.childNodes[1];
        let wrongAnswers = [];

        for (var i = 0; i < tbody.childNodes.length; i = i + 2) {
            if (
                tbody.childNodes[
                    i
                ].childNodes[1].childNodes[0].nodeName.toLowerCase() == "input"
            ) {
                let input = tbody.childNodes[i].childNodes[1].childNodes[0];
                if (input.name) {
                    let answer =
                        tbody.childNodes[i].childNodes[1].childNodes[2].value;
                    if (input.checked) {
                        //Correct antwoord
                        let correctAnswer = answer;
                    } else {
                        // foute antwoorden
                        wrongAnswers.push(answer);
                    }
                } else {
                    let question = input.value;
                    // alert("Question: " + question);
                    //Question
                }
                if (i == tbody.childNodes.length) {
                    let Response = {
                        question,
                        ...correctAnswer,
                        ...wrongAnswers,
                    };
                }
            }
        }
        Questions.push(Response);
    }

    return Questions;
    Questions = [];
}
