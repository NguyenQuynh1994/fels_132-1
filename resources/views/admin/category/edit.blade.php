@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Edit</small>
                    </h1>
                </div>
                <div class="col-lg-7" user-main>
                    @include('common.flash_message')
                    {!! Form::open(['method' => 'PUT', 'route' => ['admin.category.update', $category->id]]) !!}
                        {!! Form::label('category', 'Category') !!}
                        {!! Form::text('categoryName', $category->name, ['class' => 'form-control']) !!}
                        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
