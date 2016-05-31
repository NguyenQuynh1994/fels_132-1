@extends('layouts.app')

@section('content')
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9 user-content">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>Edit</small>
                        Manage User
                </h1>
            </div>
            <div class="col-lg-7 user-main">
                @include('common.errors')
                {!! Form::model($user, [
                    'route' => ['admin.user.update', $user->id],
                    'method' => 'PATCH',
                    'files' => true
                ]) !!}
                    <div class="form-group">
                        <img src="{{ url('uploads/image/' . $user->avatar) }}" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Name', [
                            'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', $user->name, [
                                'class' => 'form-control',
                                'placeholder' => 'Input name'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', [
                            'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-10">
                            {!! Form::email('email', $user->email, [
                                'class' => 'form-control',
                                'placeholder' => 'Email'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('role', 'Role', [
                            'class' => 'col-sm-2 control-label'
                        ]) !!}
                        <div class="col-sm-10">
                            {!! Form::select('role', config('user.role_array'), [
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Update User', [
                                'class' => 'btn btn-success btn-sm pull-left'
                            ]) !!}
                         </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
