@extends('user.lesson.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2>Lesson {{ session()->get('categoryName') }}</h2>
                </div>
                <div class="panel-body">
                    <div class="col-lg-11">
                        <div class="panel-body">
                            <h3>Question: {{ session()->get('questionIndex') + 1 }} / {{ session()->get('totalQuestions') }}</h3>
                            @include('common.flash_message')
                            <div class="col-lg-5">
                                <h3>{{ $words[session()->get('questionIndex')]->content }}</h3>
                            </div>
                            <div class="col-lg-7">
                                @foreach($lessonOptions as $lessonOption)
                                    {!! Form::open(['method' => 'POST', 'url' => 'user/lessonwords/']) !!}
                                        {!! Form::hidden('lessonId', $lessonId) !!}
                                        {!! Form::hidden('wordId', $lessonOption['wordId']) !!}
                                        {!! Form::hidden('wordAnswerId', $lessonOption['wordAnswerId']) !!}
                                        {!! Form::hidden('wordAnswerCorrect', $lessonOption['wordAnswerCorrect']) !!}
                                        {!! Form::submit($lessonOption['wordAnswerContent'], ['class' => 'btn btn-default']) !!}
                                    {!! Form::close() !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
