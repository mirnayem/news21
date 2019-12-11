@extends('layouts.app')

@section('title', '| Tags')

@section('content')
<div class="row">


    <div class="col-md-8">


        <p>{{$tag->name}} tag contains <small>{{$tag->posts()->count()}} </small> posts </p>
    </div>
    <div class="col-md-2">

        <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-success px-2">Edit Tag</a>

    </div>
</div>

<div class="row">
    <div class="col-md-12">




        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tag Name</th>
                    <th>All Tags</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag->posts as $post)
                <tr>
                    <td scope="row"> {{$post->id}} </td>
                    <td> {{$post->name}} </td>
                    <td>

                        @foreach ($post->tags as $tag)
                        <span class="badge  p-2 "> {{$tag->name}} </span>
                        @endforeach

                    </td>
                    <td> <a href=" {{route('posts.show',$post->id)}} ">View</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>



    </div>

</div>

@endsection
