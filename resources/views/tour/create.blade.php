<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tour create</title>

</head>

<body>

    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-12">
            <label for="tilteInputField" class="form-label">Titel</label>
            <input type="text" class="form-control" id="tilteInputField" placeholder="Informatica tour" required>
        </div>

        <div class="col-md-12">
            <label for="omschrijvingTextarea" class="form-label">Omschrijving</label>
            <textarea class="form-control" id="omschrijvingTextarea1" placeholder="Introductie tour voor de aankomend studenten van de Avans Hogeschool in Breda" rows="3" required></textarea>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Aanmaken</button>
        </div>
    </form>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>