@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3 text-left">
        {!! link_to_action('Admin\ManageWordController@create', 'create', [], [
            'class' => 'glyphicon glyphicon-plus'
        ]) !!}
    </div>
</div>
<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Word</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($words as $key => $word)
                <tr class="even gradeC">
                    <td class="even gradeC">{{ $word->id }}</td>
                    <td class="even gradeC">{{ $word->content }}</td>
                    <td class="even gradeC">{{ $word->category->name }}</td>
                    <td class="even gradeC">
                        <a class="btn btn-primary" href="{{ URL::route('admin.word.edit', $word->id) }}">
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
                                'class' => 'btn btn-danger btn-sm pull-left'
                            ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
