@extends('layouts.main')


@section('title', '| About Us')

@section('main-content')
<div class="site-main-container">
    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-nav-area">
                        <h1 class="text-white">About Us</h1>
                        <p class="text-white link-nav"><a href="index.html">Home </a> <span
                                class="lnr lnr-arrow-right"></span><a href="about.html">About Us </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->
</div>
<!-- Start service Area -->
<section class="service-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-service d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-sun"></span>
                    </div>
                    <div class="details">
                        <a href="#">
                            <h4>Stunning Visuals</h4>
                        </a>
                        <p>
                            Here, I focus on a range of items and features that we use in life without giving them a
                            second thought such as Coca Cola.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-code"></span>
                    </div>
                    <div class="details">
                        <a href="#">
                            <h4>Clean Code</h4>
                        </a>
                        <p>
                            Over 92% of computers are infected with Adware and spyware. Such software is rarely
                            accompanied by uninstall utility.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-service d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-clock"></span>
                    </div>
                    <div class="details">
                        <a href="#">
                            <h4>Punctuality</h4>
                        </a>
                        <p>
                            If you own an Iphone, you’ve probably already worked out how much fun it is to use it to
                            watch movies-it has that nice big screen.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End service Area -->
@endsection
