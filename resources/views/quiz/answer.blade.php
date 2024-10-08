@extends('layouts.play')
@section('title', 'Vraag beantwoorden')
@section('content')
<div class="container">
    <div class="col-12">
        <h1 class="my-5"><span class="title-colored">Beantwoord</span> de volgende vraag</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row grey-bg my-5">
        <div class="col-12 col-lg-6 order-1 order-lg-6 p-3 p-md-5">
            <h1>{{$question->title}}</h1>
            <p>{{$question->description}}</p>
            <form class="needs-validation py-3 grey-bg" novalidate action="/quiz/spelen/{{$teamHash}}/vraag/{{$question->id}}/beantwoorden" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Meerkeuze -->
                <div class="col-12 mx-auto mb-3 d-none" id="multipleChoiceFields">
                    @foreach($question->answer as $answer)
                        <label for="questionAnswer1" class="mb-1 fw-bold">Antwoord {{ $loop->index+1 }}</label>
                        <div class="input-group mb-3">
                            <input name="teamAnswerMC" class="form-check-input questionCheckbox" type="radio" required value="{{$answer->answer}}">
                            <input name="answerInput" disabled type="text" readonly value="{{$answer->answer}}" class="form-control">
                        </div>
                    @endforeach
                </div>

                <!-- Openvraag -->
                <div class="col-12 mx-auto mb-3 d-none" id="openvraagFields">
                    <label for="questionAnswerOpen" class="mb-1 fw-bold title-colored"> Antwoord: </label>
                    <textarea name="teamAnswerOpen" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <!-- Mediavraag -->
                <div id="mediaQuestionAnswer" class="col-12 mx-auto mb-5 d-none">
                    <label for="questionImg" class="mb-1 fw-bold">Upload foto: </label>
                    <input class="form-control" multiple="multiple" name="teamAnswerMedia[]" type="file" accept="image/png, image/jpg, image/jpeg" id="teamAnswerMedia" required>
                </div>

                    <small class="w-100 pt-3 d-block fst-italic">Zijn de antwoorden niet helemaal leesbaar? Sleep ze naar links om het gehele antwoord te zien.</small>


                    <div class="col-10 mx-auto mb-3 flex-xl-row flex-column d-flex justify-content-between">
                    <a class="btn primary-btn mt-3" href="/quiz/spelen/{{$teamHash}}"><i class="fa-solid fa-chevron-left"></i> Ga terug</a>
                    <button class="btn primary-btn secondary-btn mt-3" type="submit">Versturen <i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-6 order-6 order-lg-1 p-5">
            <img class="img-fluid rounded mb-5 mb-lg-0" @if(!empty($question->image_url)) src="{{$question->image_url}}" @else src="{{asset('img/landing_img.png')}}" @endif alt="tour-detail-img">
        </div>
    </div>
    <script>
        const question = {!! json_encode($question) !!};
        const type = question.type;
        if(type == "Meerkeuze"){
            $("#multipleChoiceFields").removeClass('d-none')

            $("#openvraagFields :input").attr({
                disabled: true,
                required: false
            })

            $("#mediaQuestionAnswer :input").attr({
                disabled: true,
                required: false
            })
        }

        if(type == "Open"){
            $("#openvraagFields").removeClass('d-none')

            $("#meerkeuze :input").attr({
                disabled: true,
                required: false
            })

            $("#mediaQuestionAnswer :input").attr({
                disabled: true,
                required: false
            })
        }

        if(type == "Media"){
            $("#mediaQuestionAnswer").removeClass('d-none')

            $("#openvraagFields :input").attr({
                disabled: true,
                required: false
            })

            $("#meerkeuze :input").attr({
                disabled: true,
                required: false
            })
        }
    </script>
</div>
@endsection
