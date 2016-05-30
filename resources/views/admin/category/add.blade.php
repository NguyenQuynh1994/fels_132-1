@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('admin.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>Add</small>
                    </h1>
                </div>
                <div class="col-lg-7" user-main>
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/category/']) !!}
                        {!! Form::label('category', 'Category') !!}
                        {!! Form::text('categoryName', null, ['class' => 'form-control']) !!}
                        {!! Form::submit('Save', ['class' => 'btn btn-info']) !!}
                        {!! Form::reset('Reset', ['class' => 'btn btn-info']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
