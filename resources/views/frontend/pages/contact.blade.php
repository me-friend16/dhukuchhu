@extends('frontend.layouts.app')
@section('content')

	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('frontend') }}/assets/images/background/bg.jpg);">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Title -->
            	<div class="title-column col-md-6 col-sm-12 col-xs-12">
                	<h1>Contact</h1>
                </div>
                <!--Bread Crumb -->
                <div class="breadcrumb-column col-md-6 col-sm-12 col-xs-12">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

	<!--Contact Section-->
    <section class="contact-section">
    	<div class="auto-container">
            <div class="contact-info-section">
                <div class="row clearfix">
                	<!--Contact Info Box-->
                	<div class="contact-info-box col-md-4 col-sm-6 col-xs-12">
                    	<div class="inner-box">
                        	<div class="icon-box"><span class="icon flaticon-location-pin"></span></div>
                            <h3>Address</h3>
                            <div class="text">{{ $logo->address }}</div>
                            <div class="large-icon"><span class="icon flaticon-location-pin"></span></div>
                        </div>
                    </div>
                    <!--Contact Info Box-->
                    <div class="contact-info-box col-md-4 col-sm-6 col-xs-12">
                    	<div class="inner-box">
                        	<div class="icon-box"><span class="icon flaticon-headphones"></span></div>
                            <h3>Call Us</h3>
                            <div class="text">{{ $logo->phone1 }}, {{$logo->phone2}}</div>
                            <div class="large-icon"><span class="icon flaticon-headphones"></span></div>
                        </div>
                    </div>
                    <!--Contact Info Box-->
                    <div class="contact-info-box col-md-4 col-sm-6 col-xs-12">
                    	<div class="inner-box">
                        	<div class="icon-box"><span class="icon flaticon-business-2"></span></div>
                            <h3>Mail Us</h3>
                            <div class="text">{{ $logo->email }}</div>
                            <div class="large-icon"><span class="icon flaticon-business-2"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contact-form-section">
            	<div class="row clearfix">
                	<!--Map Column-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        {!! $logo->map !!}
                    </div>
                    <!--form column-->
                    <div class="form-column col-md-6 col-sm-12 col-xs-12">
                    	
                        <!-- Comment Form -->
                        <div class="contact-form">
                            <h2>SEND US MESSAGE</h2>

                             @if(session('success'))
                                <div class="alert alert-success alert-dismissible show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <!--Comment Form-->
                           <form method="post" action="{{ route('contact.store') }}" >
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Name *" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email *" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Phone *" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                                
                                <div class="form-group">
                                    <textarea name="message" placeholder="Message/Comment *" required></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Post Comment</button>
                                </div>
                            </form>

                                
                        </div>
                        <!--End Comment Form --> 
                        
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--End Contact Section-->

@endsection