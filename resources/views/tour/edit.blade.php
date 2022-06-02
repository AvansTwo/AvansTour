@extends('layouts.app')
@section('title', 'Speurtocht detail')
@section('content')

<div class="container">

    <div class="row">


        <form class="row g-3 needs-validation form-style" id="theform" novalidate>

            <div class="col-12 col-lg-6">


                <div class="col-md-6">
                    <!-- <label for="tilteInputField" class="form-label"></label> -->
                    <input type="text" class="form-control placeholder-style" id="tilteInputField" placeholder="Naam tocht" required>
                </div>

                <div class="col-md-8 mt-3">
                    <!-- <label for="omschrijvingTextarea" class="form-label"></label> -->
                    <textarea class="form-control" id="omschrijvingInputTextarea" placeholder="Beschrijving van de tocht" rows="3" required></textarea>
                </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="col-md-12">

                    <label for="imageUpload">Speurtocht foto</label>
                    <input type="file" class="form-control" id="imageUpload" />
                </div>

            </div>

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
            </div>
        </form>
    </div>
</div>



@endsection