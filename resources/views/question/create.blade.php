<!-- @extends('layouts.app')
@section('title', 'Speurtocht detail')
@section('content')

<div class="container">

    <div class="row">

        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <!-- <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option> -->


<p>Kusje van de boys</p>

</select>


<!-- <form class="row g-3 needs-validation form-style" id="theform" novalidate> -->
<!-- <form class="row g-3 needs-validation form-style" enctype="multipart/form-data" method="POST" action="opslaan" id="theform" novalidate>
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <hr>
    <div id="questions">
        <table class="t1" id="question1">
            <tr>
                <td><input type="text" class="form-control placeholder-style" id="Q1" placeholder="Vraag 1">
                </td>

            </tr>
            <tr>
                <td><input type="radio" id="Q1A1" name="question1" value="answer1">
                    <input type="text" placeholder="Antwoord 1">
                </td>
            </tr>
            <tr>
                <td><input type="radio" id="Q1A2" name="question1" value="answer2">
                    <input type="text" placeholder="Antwoord 2">
                </td>
            </tr>
            <tr>
                <td><input type="radio" id="Q1A3" name="question1" value="answer3">
                    <input type="text" placeholder="Antwoord 3">
                </td>

            </tr>
            <tr>
                <td><input type="radio" id="Q1A4" name="question1" value="answer4">
                    <input type="text" placeholder="Antwoord 4">
                </td>
            </tr>

        </table>

    </div>

    <tr><i class="fa-solid fa-circle-plus" id="newQuestionButton" onclick="addQuestion()"></i></tr>



    <div class="col-12">
        <button class="btn primary-btn mb-4" id="tourSubmitButton" type="submit" onclick="FormRequiredFields()">Aanmaken</button>
        <button class="btn primary-btn mb-4" id="tourSubmitButton" type="submit" onclick="getAnswers()">Check</button>
    </div>
</form> -->

<form class="needs-validation py-5 grey-bg" novalidate action="opslaan" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-row">
        <div class="col-10 mx-auto mb-3">
            <label for="tourName" class="mb-1 fw-bold">Naam tocht</label>
            <input type="text" name="tourName" class="form-control" id="tourName" placeholder="Informatica tour" required>
        </div>
        <div class="col-10 mx-auto mb-3">
            <label for="validationCustom02" class="mb-1 fw-bold">Beschrijving tour</label>
            <textarea class="form-control" name="tourDesc" id="descriptionTour" placeholder="Tour voor eerste jaars informatica studenten" rows="5"></textarea>
        </div>
        <div class="col-10 mx-auto mb-3">
            <label for="tourStartLocation" class="mb-1 fw-bold">Start locatie</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-location-dot"></i></span>
                </div>
                <input type="text" class="form-control" name="tourLocation" id="tourStartLocation" placeholder="51.58604484973112, 4.7923486528026755" aria-describedby="inputGroupPrepend" required>
            </div>
        </div>
        <div class="col-10 mx-auto mb-3">
            <label for="tourimg" class="mb-1 fw-bold">Tour foto</label>
            <input class="form-control" name="tourImage" type="file" id="formFile">
        </div>
    </div>
    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
        <button onclick="location.href='/speurtochten';" class="btn primary-btn mt-3" type="reset">Ga terug</button>
        <button class="btn primary-btn secondary-btn mt-3" type="submit">Aanmaken</button>
    </div>
</form>

</div>
</div>



@endsection
<button class="btn primary-btn mb-4" id="tourSubmitButton" type="submit" onclick="FormRequiredFields()">Aanmaken</button>Testdd( -->