@extends('layouts.main')


@section('title', '| Posts')

@section('main-content')






<div class="site-main-container">
    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-nav-area">
                        <h1 class="text-white">{{$post->title}}</h1>
                        <p class="text-white link-nav"><a href="index.html">Home </a> <span
                                class="lnr lnr-arrow-right"></span><a href="#">{{$post->category->name}} </a><span
                                class="lnr lnr-arrow-right"></span><a href="gallery-post.html">Gallery Post </a></p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>Breaking News:</span> <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">



                    <!-- Start single-post Area -->
                    <div class="single-post-wrap">
                        <div class="feature-img-thumb relative">
                            <div class="active-gallery-carusel">
                                @foreach ($post->images as $image)
                                <div class="single-img">
                                    <div class="overlay overlay-bg"></div>
                                    <img id="post_img" class="img-fluid item" src="/post_images/{{$image->path }}"
                                        alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="content-wrap">
                            <ul class="tags mt-10">
                                <li><a href="#">{{$post->category->name}}</a></li>
                            </ul>
                            <a href="#">
                                <h3>{{$post->title}}</h3>
                            </a>
                            <ul class="meta pb-20">
                                <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                <li><a href="#"><span
                                            class="lnr lnr-calendar-full"></span>{{ $post->created_at->format('d M Y') }}</a>
                                </li>
                                <li><a href="#"><span class="lnr lnr-bubble"></span>{{count($post->comments)}}</a></li>
                                <li> <span class="lnr lnr-eye"></span> {{$post->views}} </li>
                            </ul>
                            @foreach ($post->tags as $tag)

                            <span class="badge badge-warning text-dark"> {{$tag->name}} </span>

                            @endforeach
                            <p>
                                {{$post->body}}
                            </p>

                            <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </blockquote>

                            <div class="navigation-wrap justify-content-between d-flex">
                                <div class="float-left">
                                    @if (isset($previous))
                                    <a class="prev" href="{{route('posts.show',$previous->id)}} "><span
                                            class="lnr lnr-arrow-left"></span>Prev Post</a>
                                    @endif
                                </div>
                                <div class='float-right'>
                                    @if(isset($next))
                                    <a class="next" href="{{route('posts.show',$next->id)}} ">Next Post<span
                                            class="lnr lnr-arrow-right "></span></a>
                                    @endif
                                </div>
                            </div>

                            <div class="comment-sec-area">
                                <div class="container">
                                    <div class="row flex-column">
                                        <h6>{{count($post->comments)}}
                                            <?php echo (count($post->comments) <=1 ? 'comment': 'comments');  ?></h6>

                                        @foreach ($comments as $comment)

                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img height="40" class="rounded-circle"
                                                            src="{{$comment->photo}}" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">{{$comment->author}}</a></h5>
                                                        <p class="date text-dark">
                                                            {{$comment->created_at->format('F j, Y ')}} at
                                                            {{$comment->created_at->format(' h:i:s A')}} </p>
                                                        <p class="comment">
                                                            {{$comment->body}}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="comment-list left-padding">

                                            @foreach ($comment->replies as $reply)
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img height="30" class="rounded-circle" src="{{$reply->photo}}"
                                                            alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">{{$reply->author}}</a></h5>
                                                        <p class="date text-dark">
                                                            {{$reply->created_at->format('F j, Y ')}} at
                                                            {{$reply->created_at->format(' h:i:s A')}} </p>
                                                        <p class="comment">
                                                            {{$reply->body}}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            @endforeach



                                            <div class="reply-box ">

                                                <button class="toggle-reply btn-reply float-right">reply</button>


                                                <div style="display:none" class="comment-reply mt-5">

                                                    {!! Form::open(['method'=>'POST' ,'action'=>
                                                    'CommentReplyController@store','files'=>true])
                                                    !!}
                                                    <input type="hidden" name="comment_id" value="{{$comment->id}} ">
                                                    <div
                                                        class="form-group  {{ $errors->has('body') ? 'has-error' : ''}}">


                                                        {!! Form::textarea('body',null,['class'=>'form-control w-75
                                                        ','rows'=>1]) !!}
                                                        {!! $errors->first('body', '<p class="help-block text-danger ">
                                                            :message</p>') !!}
                                                    </div>

                                                    <div class="form-group">
                                                        {!! Form::submit('submit',['class'=>' btn reply-btn
                                                        float-left']) !!}
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>


                                            @section('main-script')
                                            <script>
                                                $('.reply-box').ready(function(){
                                                    $(".toggle-reply").click(function(){
                                                        $(this).closest('div').find(".comment-reply").slideToggle( "slow" );

                                                    });
                                                  });
                                            </script>
                                            @endsection



                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h4>Post Comment</h4>


                            {!! Form::open(['method'=>'POST' ,'action'=> 'CommentController@store','files'=>true]) !!}
                            <input type="hidden" name="post_id" value="{{$post->id}} ">
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">


                                {!! Form::textarea('body',null, ['class'=>'form-control','rows'=>3]
                                ) !!}
                                {!! $errors->first('body', '<p class="help-block text-danger ">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Post Comment',['class'=>'btn comment-btn float-right']) !!}
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                    <!-- End single-post Area -->




                </div>

                @include('inc.sidebar')

            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>

@endsection
