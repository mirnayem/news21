<div class="site-main-container">
    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row small-gutters">


                @foreach ($f_popularpost as $post )


                <div class="col-lg-8 top-post-left">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid relative" src="/post_images/{{$post->images[2]->path }}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li><a href="#">{{$post->category->name}}</a></li>
                        </ul>
                        <a href="{{route('posts.show',$post->id)}}">
                            <h3>{{$post->title}}</h3>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                            <li><a href="#"><span
                                        class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d F Y')}}</a>
                            </li>
                            <li><a href="#"><span class="lnr lnr-bubble"></span>{{count($post->comments)}}Comments</a>
                            </li>
                        </ul>
                    </div>
                </div>


                @endforeach

                <div class="col-lg-4 top-post-right">



                    @foreach ($s_popularpost as $post)
                    <div class="single-top-post">

                        <div class="feature-image-thumb relative ">
                            <div class="overlay overlay-bg "></div>
                            <img class="img-fluid relative" src="/post_images/{{$post->images[1]->path }}" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li><a href="#">{{$post->category->name}}</a></li>
                            </ul>
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
                        </div>

                    </div>
                    @endforeach


                </div>
                @foreach ($breaking as $post )


                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>Breaking News:</span> <a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
                        </h6>
                    </div>
                </div>

                @endforeach
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
                        <h4 class="cat-title">Latest News</h4>
                        @foreach ($posts as $post )



                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>



                                    <img class="img-fluid" src="/post_images/{{$post->images[0]->path }}" alt="">


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
                                <p class="excert">


                                    {!! \Illuminate\Support\Str::words($post->body, 10,'....') !!}


                                </p>
                            </div>
                        </div>

                        @endforeach


                    </div>
                    <!-- End latest-post Area -->

                    <!-- Start banner-ads Area -->
                    <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                        <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                    </div>
                    <!-- End banner-ads Area -->
                    <!-- Start popular-post Area -->
                    <div class="popular-post-wrap">
                        <h4 class="title">Popular Posts</h4>
                        <div class="feature-post relative">
                            @foreach ($f_popularpost as $post )



                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="/post_images/{{$post->images[0]->path }}" alt="">
                            </div>
                            <div class="details">
                                <ul class="tags">

                                    <li><a href="#"></a> {{$post->category->name}} </li>


                                </ul>
                                <a href="{{route('posts.show',$post->id)}}">
                                    <h3>{{$post->title}}</h3>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                    <li><a href="#"><span
                                                class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d F Y')}}
                                        </a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span>{{count($post->comments)}}
                                            Comments</a></li>
                                </ul>
                            </div>
                            @endforeach

                        </div>
                        <div class="row mt-20 medium-gutters">

                            @foreach ($s_popularpost as $post )



                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img style="height:220px" class="img-fluid"
                                            src="/post_images/{{$post->images[0]->path }}" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#">{{$post->category->name}}</a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="{{route('posts.show',$post->id)}}">
                                        <h4>{{$post->title}}<h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                                        <li><a href="#"><span
                                                    class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d F Y')}}</a>
                                        </li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>{{count($post->comments)}}
                                            </a></li>
                                    </ul>
                                    <p class="excert">
                                        {!! \Illuminate\Support\Str::words($post->body, 9,'....') !!}
                                    </p>
                                </div>
                            </div>


                            @endforeach

                        </div>
                    </div>
                    <!-- End popular-post Area -->
                    <!-- Start relavent-story-post Area -->
                    <div class="relavent-story-post-wrap mt-30">
                        <h4 class="title">Relavent Stories</h4>
                        <div class="relavent-story-list-wrap">


                            @foreach ($relevant as $post )


                            <div class="single-relavent-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="/post_images/{{$post->images[0]->path }}" alt="">
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
                                    <p class="excert">
                                        {!! \Illuminate\Support\Str::words($post->body, 9,'....') !!}
                                    </p>
                                </div>
                            </div>


                            @endforeach

                        </div>
                    </div>
                    <!-- End relavent-story-post Area -->
                </div>

                @include('inc.sidebar')


            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>
