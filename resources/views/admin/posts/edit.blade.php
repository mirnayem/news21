@extends('layouts.main')
@section('main-stylesheet')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('main-content')
<h1>Edit Post</h1>
<div class="row">

    <div class="col-sm-3">

    </div>


    <div class="col-sm-9">
        {!! Form::model($post,['method'=>'PATCH' ,'action'=> ['PostsController@update',$post->id],'files'=>true])
        !!}

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
            {!! Form::select('tags[]', $tags, null,['class'=>'form-control select2-multi','multiple'=>'multiple']) !!}
            {!! $errors->first('tags', '<p class="help-block text-danger ">:message</p>') !!}
        </div>


        <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
            {!! Form::label('image','Photo:') !!}

            <input type="file" name="image[]" multiple="multiple" class="form-control">
            <div>

                @foreach ($post->images as $image )
                <img height="50" class="p-2" src="/post_images/{{$image->path}}" alt="">
                @endforeach
            </div>

            {!! $errors->first('image', '<p class="help-block text-danger ">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            {!! $errors->first('body', '<p class="help-block text-danger ">:message</p>') !!}
        </div>

        <div class="form-group pb-5">

            {!! Form::label('is_editor','Editor:') !!}
            {!! Form::select('is_editor',[1=>"Editor's Pick",0=>'Regular Post'],null,['class'=> 'form-control ']) !!}

            {!! Form::label('is_relevant','Relevant:') !!}
            {!! Form::select('is_relevant',[1=>'Relevant Post',0=>'Regular Post'],null,['class'=> 'form-control '])
            !!}
            {!! Form::label('is_breaking','Breaking:') !!}
            {!! Form::select('is_breaking',[1=>'Breaking Post',0=>'Regular Post'],null,['class'=> 'form-control ']) !!}

        </div>


        {{-- @if ($post->userCanEdit(Auth::user())) --}}
        <div class="form-group">
            {!! Form::submit('Edit Post',['class'=>'btn btn-success col-sm-2 float-left']) !!}
        </div>

        {{-- @endif --}}
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE' ,'action'=>[ 'PostsController@destroy', $post->id],'files'=>true]) !!}
        {{-- @if ($post->userCanEdit(Auth::user())) --}}
        <div class="form-group">
            {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-sm-2 float-right']) !!}
        </div>
        {{-- @endif --}}
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('main-script')
<script src="{{asset('js/select2.min.js')}}"></script>

<script>
    $('.select2-multi').select2();

</script>
@endsection
