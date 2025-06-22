@extends('frontend.layouts.app')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{ asset('frontend') }}/assets/images/background/bg.jpg);">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Title -->
            <div class="title-column col-md-6 col-sm-12 col-xs-12">
                <h1>About</h1>
            </div>
            <!--Bread Crumb -->
            <div class="breadcrumb-column col-md-6 col-sm-12 col-xs-12">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="welcome-section">
    <div class="auto-container">
        <div class="clearfix">
            <!--Content Column-->
            <div class="content-column">
                <div class="inner-box">
                    <!--Sec Title-->
                    <div class="sec-title">
                        <h2>Welcome to Poshan Foods</h2>
                        <div class="title-text">{{ $logo->slogan }}</div>
                    </div>
                    <div class="sec-title">
                        <div class="title-text">Our Vision:</div>
                        <div class="text">{{ $logo->vision }}</div>
                    </div>
                    <div class="sec-title">
                        <div class="title-text">Our Mission:</div>
                        <div class="text">{{ $logo->mission }}</div>
                    </div>
                </div>
            </div>
            
        </div>
        <!--image box-->
        <div class="floated-img-up">
            <img src="{{ asset('frontend') }}/assets/images/resource/welcome-up-img.png" alt="" />
        </div>
        <div class="floated-img-down">
            <img src="{{ asset('frontend') }}/assets/images/resource/welcome-down-img.png" alt="" />
        </div>
    </div>
</section>
@endsection