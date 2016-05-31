@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Word
                        <small>List</small>
                    </h1>
                </div>
                <div class="col-lg-7">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {!! link_to_action('Admin\ManageWordController@create', 'Add', [], ['class' => 'btn btn-default']) !!}
                        </h3>
                    </div>
                    <div class="panel-body">
                        @include('common.flash_message')
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Word</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>View Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($words as $key => $word)
                                    <tr class="even gradeC">
                                        <td class="even gradeC">{{ $key++ }}</td>
                                        <td class="even gradeC">{{ $word->id }}</td>
                                        <td class="even gradeC">{{ $word->category->name }}</td>
                                        <td class="even gradeC">{{ $word->content}}</td>
                                        <td class="even gradeC">
                                            <a class="btn btn-info" href="{{ URL::route('admin.word.edit', $word->id) }}">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td class="even gradeC">
                                            {!! Form::open([
                                                'route' => [
                                                    'admin.word.destroy',
                                                    $word->id
                                                ],
                                                'method' => 'delete',
                                                'files' => true,
                                                'onsubmit' => 'return confirm("Are you sure delete this word?")'
                                            ]) !!}
                                                {!! Form::submit('Delete', [
                                                    'class' => 'btn btn-info btn-sm pull-left'
                                                ]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                        <td class="even gradeC">{!! link_to_action('Admin\ManageWordController@show', 'View Answer', [$word->id], ['class' => 'btn btn-info']) !!}
                                        </td>
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
@endsection
