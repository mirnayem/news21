@extends('layouts.app')

@section('title', '| Tags')

@section('content')
<div class="row pl-3">

    <div class="col-sm-6">
        <h1>Create Tag</h1>

        {!! Form::open(['method'=>'post' ,'action'=> 'TagController@store']) !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name','Tag Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block text-danger ">:message</p>') !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Tag',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}

    </div>

    <div class='col-sm-6'>

        @if (Session::has('deleted_tag'))
        <p class="alert alert-danger"> {{Session::get('deleted_tag')}} </p>
        @endif





        @if(count($tags)>0)
        <h1>All Tags</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tag Name </th>



                </tr>
            </thead>
            <tbody>

                @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->id}} </td>
                    <td><a class="text-success" href="{{route('tags.show',$tag->id)}} ">{{$tag->name}}
                        </a> </td>

                </tr>
                @endforeach

                @else
                <div class="text-center">
                    <h3> No Tags found</h3>
                </div>

                @endif



            </tbody>
        </table>
    </div>

</div>
@endsection
