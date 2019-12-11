@extends('layouts')


@section('content')
@if (count($comments) > 0)
<h1>Comments By Post</h1>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Id</th>
            <th>Commenter</th>
            <th>Email</th>
            <th>Body</th>
            <th>Post</th>
        </tr>
    </thead>



    @foreach ($comments as $comment)
    <tbody>
        <tr>
            <td scope="row"> {{$comment->id}} </td>
            <td> {{$comment->author}} </td>
            <td> {{$comment->email}} </td>
            <td> {{$comment->body}} </td>
            <td> <a href="{{route('posts.show', $comment->post->id)}} ">View Post</a> </td>
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

    </tbody>
    @endforeach
</table>
@else
<h1>No Comments Available</h1>
@endif
@endsection
