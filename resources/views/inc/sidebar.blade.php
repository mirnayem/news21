<div class="col-lg-4">
    <div class="sidebars-area">
        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">Editor’s Pick</h6>
            <div class="editors-pick-post">

                @foreach ($f_editor_pick ?? '' as $post )


                <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="/post_images/{{$post->images[1]->path }}" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="#">{{$post->category->name}}</a></li>
                    </ul>
                </div>


                <div class="details">
                    <a href="{{route('posts.show',$post->id)}}">
                        <h4 class="mt-20">{{$post->title}}</h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                        <li><a href="#"><span
                                    class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d F Y')}}</a>
                        </li>
                        <li><a href="#"><span class="lnr lnr-bubble"></span>{{count($post->comments)}} </a></li>
                    </ul>
                    <p class="excert">
                        {!! \Illuminate\Support\Str::words($post->body, 9,'....') !!}
                    </p>
                </div>

                @endforeach


                <div class="post-lists">

                    @foreach ($editor_pick as $post )


                    <div class="single-post d-flex flex-row">
                        <div class="thumb">
                            <img style="height:80px; width:120px" class="img-fluid"
                                src="/post_images/{{$post->images[0]->path }}" alt="">
                        </div>
                        <div class="detail">
                            <a href="{{route('posts.show',$post->id)}}">
                                <h6>{{$post->title}}</h6>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span
                                            class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d M Y')}}</a>
                                </li>
                                <li><a href="#"><span class="lnr lnr-bubble"></span>{{count($post->comments)}}</a></li>
                            </ul>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
        <div class="single-sidebar-widget ads-widget">
            <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
        </div>
        <div class="single-sidebar-widget newsletter-widget">
            <h6 class="title">Newsletter</h6>
            <p>
                Here, I focus on a range of items
                andfeatures that we use in life without
                giving them a second thought.
            </p>

            <form method="POST" action="{{url('/')}} ">
                @csrf
                <div class="form-group d-flex flex-row">
                    <div class="col-autos">
                        <div class="input-group">
                            <input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Email Address'" type="email" name="email">
                        </div>
                    </div>

                    <button type="submit" class="bbtns">Subscribe</button>
                    {{-- <a href="#" class="bbtns">Subcribe</a> --}}

                </div>
            </form>
            <p>
                You can unsubscribe us at any time
            </p>
        </div>

        {{-- Archive post --}}

        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">Posts Archive</h6>


            <ol class="list-unstyled" id="archive-link">
                @foreach ($archives as $stats)



                <li>


                    <a class="text-success" href="/archive?month={{ $stats['month'] }}&year={{ $stats['year'] }}">


                        {{$stats['month']. ' ' .$stats['year']}}
                    </a>
                </li>


                @endforeach

            </ol>

        </div>









        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">Most Popular</h6>

            @foreach ($popularpost as $post )


            <div class="single-list flex-row d-flex">
                <div class="thumb">
                    <img style="height:80px; width:120px" class="img-fluid"
                        src="/post_images/{{$post->images[0]->path }}" alt="">
                </div>
                <div class="details">
                    <a href="{{route('posts.show',$post->id)}}">
                        <h6>{{$post->title}}</h6>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span
                                    class="lnr lnr-calendar-full"></span>{{$post->created_at->format('d M Y')}}</a></li>
                        <li><a href="#"><span class="lnr lnr-eye"></span>{{$post->views}}</a></li>
                    </ul>
                </div>
            </div>

            @endforeach

        </div>


        <div class="single-sidebar-widget social-network-widget">
            <h6 class="title">Social Networks</h6>
            <ul class="social-list">
                <li class="d-flex justify-content-between align-items-center fb">
                    <div class="icons d-flex flex-row align-items-center">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <p>983 Likes</p>
                    </div>
                    <a href="#">Like our page</a>
                </li>
                <li class="d-flex justify-content-between align-items-center tw">
                    <div class="icons d-flex flex-row align-items-center">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <p>983 Followers</p>
                    </div>
                    <a href="#">Follow Us</a>
                </li>
                <li class="d-flex justify-content-between align-items-center yt">
                    <div class="icons d-flex flex-row align-items-center">
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        <p>983 Subscriber</p>
                    </div>
                    <a href="#">Subscribe</a>
                </li>
                <li class="d-flex justify-content-between align-items-center rs">
                    <div class="icons d-flex flex-row align-items-center">
                        <i class="fa fa-rss" aria-hidden="true"></i>
                        <p>983 Subscribe</p>
                    </div>
                    <a href="#">Subscribe</a>
                </li>
            </ul>
        </div>
    </div>
</div>
