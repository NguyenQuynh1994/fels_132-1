@extends('layouts.app')

@section('content')
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        @include('user.profile.partial')
        <div class="col-lg-9 user-content">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            <div class="col-lg-7 user-main">
                @include('common.errors')
                {!! Form::open(['url' => 'user/profiles/' . $user->id, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Input name']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                            {!! Form::reset('Reset', ['class' => 'btn btn-default']) !!}
                            <br/>
                                <a class="btn btn-link" href="{{ url('user/profiles/getChangePass/' . $user->id) }}">Change Password</a>
                                <a class="btn btn-link" href="{{ url('user/profiles/getChangeAvatar/' . $user->id) }}">Change Avatar</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
