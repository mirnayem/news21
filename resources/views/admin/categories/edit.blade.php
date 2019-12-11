@extends('layouts.app')


@section('content')
<div class="row pl-2">

    <div class="col-sm-6">
        <h1>Edit Category</h1>

        {!! Form::model($category,['method'=>'PATCH' ,'action'=>[ 'CategoriesController@update',$category->id]])
        !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name','Category Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block text-danger ">:message</p>') !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Update Category',['class'=>'btn btn-success float-left']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE' ,'action'=>[ 'CategoriesController@destroy',$category->id]]) !!}



        <div class="form-group">
            {!! Form::submit('Delete Category',['class'=>'btn btn-danger float-right']) !!}
        </div>
        {!! Form::close() !!}

    </div>
</div>
@endsection
