@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                    </h1>
                </div>
                <div class="col-lg-7">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {!! link_to_action('Admin\ManageCategoryController@create', 'Add', [], ['class' => 'btn btn-default']) !!}
                        </h3>
                    </div>
                    <div class="panel-body">
                        @include('common.flash_message')
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $index => $category)
                                    <tr>
                                        <th scope="row">{{ $index++ }}</th>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <th>
                                            {!! Form::open(['route' => ['admin.category.destroy', $category->id], 'method' => 'DELETE']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-info']) !!}
                                            {!! Form::close() !!}
                                        </th>
                                        <th>
                                            {!! link_to_action('Admin\ManageCategoryController@edit', 'Edit', [$category->id], ['class' => 'btn btn-info']) !!}
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
@endsection
