@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit
                        <small>Word Answer</small>
                        <h3>{{ session()->get('wordContent') }}</h3>
                    </h1>
                </div>
                <div class="col-lg-7" user-main>
                    {!! Form::open(['method' => 'PUT', 'route' => ['admin.wordAnswer.update', $wordAnswer->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('content', 'Content', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('content', $wordAnswer->content, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('correct', 'Correct', ['class' => 'col-sm-2 control-label']) !!}
                            @if($wordAnswer->correct == App\Models\WordAnswer::IS_CORRECT)
                                {!! Form::radio('correct', '1', true) !!}
                                {!! Form::label('correct', 'TRUE') !!}
                                {!! Form::radio('correct', '0') !!}
                                {!! Form::label('correct', 'FALSE') !!}
                            @else
                                {!! Form::radio('correct', '1') !!}
                                {!! Form::label('correct', 'TRUE') !!}
                                {!! Form::radio('correct', '0', true) !!}
                                {!! Form::label('correct', 'FALSE') !!}
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
                                {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
