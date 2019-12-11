@extends('layouts.app')


@section('content')


@if (count($replies) > 0)

<h2>Replies </h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Author </th>
            <th scope="col">Email</th>
            <th scope="col">Body</th>
            <th scope="col">Post</th>


        </tr>
    </thead>
    <tbody>

        @foreach ($replies as $reply)
        <tr>
            <td>{{$reply->id}} </td>
            <td> {{$reply->author}} </a> </td>
            <td> {{$reply->email}} </td>
            <td> {{$reply->body}} </td>
            <td> <a href="{{route('posts.show', $reply->comment->post->id)}} ">View Post</a> </td>
            <td>
                @if ($reply->is_active == 1)
                {!! Form::open(['method'=>'PATCH' ,'action'=>[ 'CommentReplyController@update', $reply->id]]) !!}

                <input type="hidden" name="is_active" value="0">

                {!! Form::submit('UnAprove',['class'=>'btn btn-success']) !!}

                {!! Form::close() !!}
                @else
                {!! Form::open(['method'=>'PATCH' ,'action'=>[ 'CommentReplyController@update', $reply->id]]) !!}

                <input type="hidden" name="is_active" value="1">

                {!! Form::submit('Aprove',['class'=>'btn btn-info']) !!}
                {!! Form::close() !!}
                @endif


            </td>

            <td>
                {!! Form::open(['method'=>'DELETE' ,'action'=>[ 'CommentReplyController@destroy', $reply->id]]) !!}


                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                {!! Form::close() !!}

            </td>
        </tr>
        @endforeach

        @else
        <h1 class=" text-info ml-5">No replies available</h1>

        @endif

        @endsection
