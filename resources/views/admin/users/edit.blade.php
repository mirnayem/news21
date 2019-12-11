@extends('layouts.app')

@section('content')

<div class="container">





    <h2>Edit User</h2>
    <div class="row pt-5">

        <div class="col-sm-3">
            <img src=" {{$user->photo ? $user->photo->image : ' /images/imgnotfound.png' }} " alt="" class="img  w-100">
        </div>

        <div class="col-sm-9">

            {!! Form::model($user,['method'=>'PATCH' ,'action'=>
            ['UsersController@update',$user->id],'files'=>true]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',"$user->name",['class'=>'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description','Description:') !!}
                {!! Form::text('description',"$user->description",['class'=>'form-control']) !!}
                {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email','Email:') !!}
                {!! Form::email('email',$user->email,['class'=>'form-control ']) !!}
                {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
                {!! Form::label('role','Role:') !!}
                {!! Form::select('role_id', $roles,null,['class'=>'form-control ']) !!}
                {!! $errors->first('role_id', '<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('is_active') ? 'has-error' : ''}} ">
                {!! Form::label('is_active','Status:') !!}
                {!! Form::select('is_active',[1=>'Active',0=>'Not Active'],null,['class'=> 'form-control ']) !!}
                {!! $errors->first('is_active', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group {{ $errors->has('photo_id') ? 'has-error' : ''}} ">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id',['class'=> 'form-control ']) !!}
                {!! $errors->first('photo_id','<p class="help-block text-danger">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password','Password:') !!}
                {!! Form::password('password',['class'=> 'form-control ']) !!}
                {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User',['class'=>'btn btn-success col-sm-2 float-left']) !!}
            </div>

            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE' ,'action'=>[ 'UsersController@destroy', $user->id],'files'=>true])
            !!}
            <div class="form-group">
                {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-2 float-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
