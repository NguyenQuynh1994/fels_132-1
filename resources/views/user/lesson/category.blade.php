@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Lesson</div>
                    <div class="panel-body">
                    @include('common.flash_message')
                    @foreach($categories as $category)
                        <div class="col-lg-3">
                            <div class="thumbnail">
                                <h3>{{ $category->name }}</h3>
                                {!! Form::open(['method' => 'POST', 'url' => 'user/lessons/']) !!}
                                    {!! Form::hidden('categoryId', $category->id) !!}
                                    {!! Form::submit('Start Learn', ['class' => 'btn btn-info']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
