@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">List User</div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="even gradeC">
                                        <td class="even gradeC">{{ $user->id }}</td>
                                        <td class="even gradeC">{{ $user->name }}</td>
                                        <td class="even gradeC">{{ $user->email }}</td>
                                        <td class="even gradeC">
                                            <a class="btn btn-primary" href="{{ URL::route('admin.user.edit', $user->id) }}">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                             </a>
                                        </td>
                                        <td class="even gradeC">
                                            {!! Form::open([
                                                'route' => [
                                                    'admin.user.destroy',
                                                    $user->id
                                                ],
                                                'method' => 'delete',
                                                'files' => true,
                                                'onsubmit' => 'return confirm("Are you sure delete this catagory?")'
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
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-5 text-left">
                            {!! link_to_action('Admin\ManageWordController@index', 'word', [], ['class' => 'btn btn-primary']) !!}
                        </div>
                        <div class="col-md-5 text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
