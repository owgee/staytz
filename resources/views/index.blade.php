@extends('layouts/default')

{{-- Page title --}}
@section('title')
Home
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/jquery.circliful.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl.carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl.carousel/css/owl.theme.css') }}">
    <!--end of page level css-->
@stop

{{-- slider --}}
@section('top')
    <!--Carousel Start -->
    <div id="owl-demo" class="owl-carousel owl-theme" style="background-color: #303F9F;">
        <div class="item" align="center">
            <img src="{{ asset('assets/images/slide1.png') }}" style="height:auto;width:350px; margin-top: 10px;" alt="slider-image">
            <div class="carousel-caption">
                <h2 style="color: #333;"></h2>
            </div>
        </div>
        <div class="item" align="center"><img src="{{ asset('assets/images/slide2.png') }}" style="height:auto;width:350px; margin-top: 10px;" alt="slider-image">
        </div>
        <div class="item" align="center"><img src="{{ asset('assets/images/slide3.png') }}" style="height:auto;width:350px; margin-top: 10px;" alt="slider-image">
        </div>
        <div class="item" align="center"><img src="{{ asset('assets/images/slide4.png') }}" style="height:auto;width:350px; margin-top: 10px;" alt="slider-image">
        </div>
        <div class="item" align="center"><img src="{{ asset('assets/images/slide5.png') }}" style="height:auto;width:350px; margin-top: 10px;" alt="slider-image">
        </div>
    </div>
    <!-- //Carousel End -->
@stop

{{-- content --}}
@section('content')
       
    <!-- //Container End -->
@stop

{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/owl.carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/index.js') }}"></script>
    <!--page level js ends-->

@stop
