@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Word
                        <small>Answer</small>
                        <h3>{{ $word->content }}</h3>
                    </h1>
                </div>
                <div class="col-lg-7">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {!! link_to_action('Admin\ManageWordAnswerController@create', 'Add', [], ['class' => 'btn btn-default']) !!}
                            {!! link_to_action('Admin\ManageWordController@index', 'Back', [], ['class' => 'btn btn-default']) !!}
                        </h3>
                        <div class="panel-body">
                        @include('common.flash_message')
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Content</th>
                                        <th>Correct</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wordAnswers as $index => $wordAnswer)
                                        <tr>
                                            <td scope="row">{{ $index++ }}</td>
                                            <td>{{ $wordAnswer->id }}</td>
                                            <td>{{ $wordAnswer->content }}</td>
                                            <td>{{ $wordAnswer->correct }}</td>
                                            <th>
                                                {!! Form::open(['route' => ['admin.wordAnswer.destroy', $wordAnswer->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-info']) !!}
                                                {!! Form::close() !!}
                                            </th>
                                            <th>
                                                {!! link_to_action('Admin\ManageWordAnswerController@edit', 'Edit', [$wordAnswer->id], ['class' => 'btn btn-info']) !!}
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
