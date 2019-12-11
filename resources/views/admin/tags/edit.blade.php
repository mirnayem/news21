@extends('layouts.app')


@section('content')
<div class="row pl-2">

    <div class="col-sm-6">
        @if(Session::has('success'))
        <div class="alert-box success">
            <h5>{{ Session::get('success') }}</h5>
        </div>
        @endif
        <h1>Edit Tag</h1>

        {!! Form::model($tag,['method'=>'PATCH' ,'action'=>[ 'TagController@update',$tag->id]])
        !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name','Tag Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block text-danger ">:message</p>') !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Update Tag',['class'=>'btn btn-success float-left']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE' ,'action'=>[ 'TagController@destroy',$tag->id]]) !!}



        <div class="form-group">
            {!! Form::submit('Delete Tag',['class'=>'btn btn-danger float-right']) !!}
        </div>
        {!! Form::close() !!}

    </div>
</div>
@endsection
