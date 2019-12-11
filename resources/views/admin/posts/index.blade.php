@extends('layouts.app')
@section('content')

@if (Session::has('deleted_post'))
<p class="alert alert-info"> {{Session::get('deleted_post')}} </p>
@endif


@if (count($posts)>0)
<h1>All Posts</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Owner </th>
            <th scope="col">Category</th>
            <th scope="col">Photo</th>
            <th scope="col">Title</th>
            <th scope="col">Post</th>
            <th scope="col">Comment</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>


        </tr>
    </thead>
    <tbody>

        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}} </td>
            <td> <a href="{{ route('posts.edit',[$post->id]) }}"> {{$post->user->name}} </a></td>
            <td>{{$post->category ? $post->category->name : 'Uncatagorized'}} </td>
            <td> <img style="height:50px" src="{{$post->photo ? $post->photo->image : '/images/imgnotfound.png' }} ">
            </td>

            <td> {{$post->title}} </td>

            <td> <a href="{{route('posts.show',$post->id)}} ">View Post</a> </td>
            <td> <a href="{{route('comments.show',$post->id)}} ">View Comment</a> </td>
            <td> {{$post->created_at->diffForHumans()}} </td>
            <td> {{$post->updated_at->diffForHumans()}} </td>

        </tr>
        @endforeach

        @else

        <h3 class="text-center">No Posts Available Now</h3>
        @endif



    </tbody>
</table>
@endsection
