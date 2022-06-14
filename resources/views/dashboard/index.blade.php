@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1>Welkom op het <span class="title-colored">Dashboard</span></h1>
                <p>Open vragen die nog beantwoord moeten worden</p>
            
            </div>
            <div class="col-12 grey-bg my-5 p-5">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titel</th>
                        <th scope="col">Team naam</th>
                        <th scope="col">Bekijken</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- @foreach($tour->question as $question) --}}
                        <tr>
                            <th scope="row">1</th>
                            <td>Vraag titel</td>
                            <td>Team naam</td>
                            <td>
                                <button onclick="location.href='/dashboard/vraag';" class="btn secondary-btn"><i class="fa-solid fa-eye"></i></button>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection
