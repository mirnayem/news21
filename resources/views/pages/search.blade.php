@extends('layouts.main')


@section('title','| search result')

@section('main-content')



<section class="top-post-area pt-10">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-12">



                <div class="hero-nav-area">
                    <h1 class="text-white">Search Results</h1>
                    <h5 class="text-white"> {{count($posts)}} results found for ' {{request()->input('search')}} '
                    </h5>
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
                <!-- Start latest-post Area -->
                <div class="latest-post-wrap">

                    @if(count($posts) > 0)

                    @foreach ($posts as $post)


                    <div class="single-latest-post row align-items-center">
                        <div class="col-lg-5 post-left">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="/post_images/{{$post->images[1]->path }}" alt="">
                            </div>
                            <ul class="tags">
                                <li><a href="#">{{$post->category->name}}</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-7 post-right">
                            <a href="{{route('posts.show',$post->id)}}">
                                <h4>{{$post->title}}</h4>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                <li><a href="#"><span
                                            class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d F Y')}}</a>
                                </li>
                                <li><a href="#"><span class="lnr lnr-bubble"></span>{{count($post->comments)}}
                                        Comments</a></li>
                            </ul>
                            <p>
                                {!! \Illuminate\Support\Str::words($post->body, 10,'....') !!}
                            </p>
                        </div>
                    </div>


                    @endforeach

                    @else
                    <h2>No Posts Found Here....</h2>

                    @endif

                </div>
                <!-- End latest-post Area -->
            </div>
            @include('inc.sidebar')
        </div>
    </div>
</section>
@endsection
