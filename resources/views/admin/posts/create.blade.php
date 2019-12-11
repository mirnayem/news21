@extends('layouts.main')
@section('main-stylesheet')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('main-content')

<div class="container">
    <h1>Create Post</h1>

    {!! Form::open(['method'=>'post' ,'action'=> 'PostsController@store','files'=>true]) !!}

    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block text-danger ">:message</p>') !!}
    </div>


    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id' ,$categories,null,['class'=>'form-control']) !!}
        {!! $errors->first('category_id', '<p class="help-block text-danger ">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
        {!! Form::label('tags','Tags:') !!}
        <select class="form-control select2-multi" multiple="multiple" name="tags[]">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}"> {{$tag->name}} </option>
            @endforeach
        </select>
        {!! $errors->first('tags', '<p class="help-block text-danger ">:message</p>') !!}
    </div>


    <div class="form-group">
        {!! Form::label('images','Photo:') !!}

        <input type="file" name="image[]" multiple="multiple" class="form-control">

    </div>
    <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
        {!! Form::label('body','Description:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        {!! $errors->first('body', '<p class="help-block text-danger ">:message</p>') !!}
    </div>

    <div class="form-group pb-5">

        {!! Form::label('is_editor','Editor:') !!}
        {!! Form::select('is_editor',[1=>"Editor's Pick",0=>'Regular Post'],0,['class'=> 'form-control ']) !!}

        {!! Form::label('is_relevant','Relevent:') !!}
        {!! Form::select('is_relevant',[1=>'Relevent Post',0=>'Regular Post'],0,['class'=> 'form-control '])
        !!}
        {!! Form::label('is_breaking','Breaking:') !!}
        {!! Form::select('is_breaking',[1=>'Breaking Post',0=>'Regular Post'],0,['class'=> 'form-control ']) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('Create Post',['class'=>'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

    @endsection
</div>

@section('main-script')
<script src="{{asset('js/select2.min.js')}}"></script>

<script>
    $('.select2-multi').select2();

</script>

@endsection
