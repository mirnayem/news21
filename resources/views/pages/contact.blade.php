@extends('layouts.main')

@section('title' ,'| Contact Us')

@section('main-content')
<!-- Start top-post Area -->
<section class="top-post-area pt-10">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-nav-area">
                    <h1 class="text-white">Contact Us</h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span
                            class="lnr lnr-arrow-right"></span><a href="contact.html">Contact Us </a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End top-post Area -->
<!-- Start contact-page Area -->
<section class="contact-page-area pt-50 pb-120">
    <div class="container">
        <div class="row contact-wrap">
            <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>

            <script>
                function initMap() {
            var uluru = {lat: 23.8136, lng: 90.4243};
            var grayStyles = [
              {
                featureType: "all",
                stylers: [
                  { saturation: -90 },
                  { lightness: 50 }
                ]
              },
              {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat:23.8136, lng: 90.4243},
              zoom: 9,
              styles: grayStyles,
              scrollwheel:  false
            });
          }

            </script>
            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
            </script>
            <div class="col-lg-3 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-home"></span>
                    </div>
                    <div class="contact-details">
                        <h5> Hasnahena , L3 H4</h5>
                        <p>
                            56/8, Inner-Circular Road, Motijheel
                        </p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>
                    <div class="contact-details">
                        <h5>00 (440) 9865 562</h5>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                    <div class="contact-details">
                        <h5>support@news21.com</h5>
                        <p>Send us your query</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
















                <form action="{{url('/contact')}}" class="form-contact contact_form" method="post" id="contactForm">
                    @csrf

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input class="common-input mb-20 form-control" name="name" id="name" type="text"
                                    placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <input class="common-input mb-20 form-control" name="email" id="email" type="email"
                                    placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <input class="common-input mb-20 form-control" name="subject" id="subject" type="text"
                                    placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <textarea class="common-textarea form-control different-control w-100" name="message"
                                    id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="primary-btn primary">Send Message</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->
@endsection
