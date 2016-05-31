@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Add
                        <small>Word Answer</small>
                        <h3>{{ session()->get('wordContent') }}</h3>
                    </h1>
                </div>
                <div class="col-lg-7" user-main>
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/wordAnswer/']) !!}
                        {!! Form::hidden('wordId', session()->get('wordId')) !!}
                        <div class="form-group">
                            {!! Form::label('content', 'Content', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('content', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('correct', 'Correct', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::radio('correct', '1', true) !!}
                            {!! Form::label('true', 'TRUE') !!}
                            {!! Form::radio('correct', '0') !!}
                            {!! Form::label('true', 'FALSE') !!}
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
