@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="panel-header">User
                        <small>List</small>
                    </h1>
                </div>
                <div class="col-lg-7">
                    <div class="panel-body">
                    @include('common.flash_message')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>AVATAR</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td scope="row">{{ $index++ }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->avatar }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ URL::route('admin.user.edit', $user->id) }}">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                             </a>
                                        </td>
                                        <td>
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
                                                    'class' => 'btn btn-info btn-sm pull-left'
                                                ]) !!}
                                            {!! Form::close() !!}
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
