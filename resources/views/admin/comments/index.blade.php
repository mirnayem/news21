@extends('layouts.app')


@section('content')


@if (count($comments) > 0)

<h2>Comments</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Author </th>
            <th scope="col">Email</th>
            <th scope="col">Body</th>
            <th scope="col">Post</th>
            <th scope="col">Reply</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}} </td>
            <td>{{$comment->author}} </a> </td>
            <td> {{$comment->email}} </td>
            <td> {{$comment->body}} </td>
            <td> <a href="{{route('posts.show', $comment->post->id )}} ">View Post</a> </td>
            <td> <a href="{{route('replies.show', $comment->id)}} ">View Reply</a> </td>
            <td>
                @if ($comment->is_active == 1)
                {!! Form::open(['method'=>'PATCH' ,'action'=>[ 'CommentController@update', $comment->id]]) !!}

                <input type="hidden" name="is_active" value="0">

                {!! Form::submit('UnAprove',['class'=>'btn btn-success']) !!}

                {!! Form::close() !!}
                @else
                {!! Form::open(['method'=>'PATCH' ,'action'=>[ 'CommentController@update', $comment->id]]) !!}

                <input type="hidden" name="is_active" value="1">

                {!! Form::submit('Aprove',['class'=>'btn btn-info']) !!}
                {!! Form::close() !!}
                @endif


            </td>

            <td>
                {!! Form::open(['method'=>'DELETE' ,'action'=>[ 'CommentController@destroy', $comment->id]]) !!}


                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                {!! Form::close() !!}

            </td>
        </tr>
        @endforeach

        @else
        <h1 class="text-center">No Comments Availble</h1>

        @endif

        @endsection
