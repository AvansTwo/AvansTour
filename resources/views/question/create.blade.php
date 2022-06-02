@extends('layouts.app')
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


        <form class="row g-3 needs-validation form-style" id="theform" novalidate>
            <!-- <form class="row g-3 needs-validation form-style" enctype="multipart/form-data" method="POST" action="opslaan" id="theform" novalidate> -->
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
            </div>
        </form>


    </div>
</div>



@endsection
<!-- <button class="btn primary-btn mb-4" id="tourSubmitButton" type="submit" onclick="FormRequiredFields()">Aanmaken</button>Testdd( -->