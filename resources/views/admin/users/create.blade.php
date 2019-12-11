@extends('layouts.app')

@section('content')
<div class="container">



    <h2>Create Users</h2>

    {!! Form::open(['method'=>'post' ,'action'=> 'UsersController@store','files'=>true]) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        {!! Form::label('description','Description:') !!}
        {!! Form::text('description',null,['class'=>'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email','Email:') !!}
        {!! Form::email('email',null,['class'=>'form-control ']) !!}
        {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
        {!! Form::label('role','Role:') !!}
        {!! Form::select('role_id', [''=>'Chose Options']+ $roles, null,['class'=>'form-control ']) !!}
        {!! $errors->first('role_id', '<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}} ">
        {!! Form::label('is_active','Status:') !!}
        {!! Form::select('is_active',[1=>'Active',0=>'Not Active'],0,['class'=> 'form-control ']) !!}
        {!! $errors->first('is_active', '<p class="help-block text-danger">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('photo_id') ? 'has-error' : ''}} ">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id',null,['class'=> 'form-control ']) !!}
        {!! $errors->first('photo_id','<p class="help-block text-danger">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=> 'form-control ']) !!}
        {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}


</div>
@endsection
