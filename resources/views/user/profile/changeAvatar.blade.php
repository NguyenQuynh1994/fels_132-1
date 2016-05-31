@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('user.profile.partial')
            <div class="col-lg-9 user-content">
                <div class="col-lg-12">
                    <h1 class="page-header">Change
                        <small>Avatar</small>
                    </h1>
                </div>
                <div class="col-lg-9">
                    @include('common.errors')
                    {!! Form::open(['url' => 'user/profiles/postChangeAvatar/' . $user->id, 'method' => 'POST','files' => true, 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('avatar', 'Avatar', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::file('avatar') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Edit', ['class' => 'btn btn-info']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
