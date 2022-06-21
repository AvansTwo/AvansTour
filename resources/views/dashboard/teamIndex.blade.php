@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <button type="button" onclick="location.href='/dashboard';" class="btn primary-btn secondary-btn mt-5"><i class="fa-solid fa-chevron-left"></i> Ga terug</button>
            </div>
            <div class="col-12 mt-5">
                <h1>Team <span class="title-colored">{{$teamName->team->team_name}}</span></h1>
                <p>Vragen die nog niet zijn nagekeken</p>
            </div>
            <div class="col-12 grey-bg my-5 p-5">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Teamnaam</th>
                        <th scope="col">Vraag</th>
                        <th scope="col">Bekijken</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teamProgress as $item)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{$item->team->team_name}}</td>
                            <td>{{$item->question->description}}</td>
                            <td>
                                <button onclick="location.href='/dashboard/vraag/{{$item->id}}';" class="btn secondary-btn"><i class="fa-solid fa-eye"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
