@extends('frontend.layouts.app')
@section('content')

<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('frontend') }}/assets/images/background/bg.jpg);">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Title -->
            	<div class="title-column col-md-6 col-sm-12 col-xs-12">
                	<h1>Our Team</h1>
                </div>
                <!--Bread Crumb -->
                <div class="breadcrumb-column col-md-6 col-sm-12 col-xs-12">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Our Team</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

	<!--Team Section-->
	<section class="team-section">
    	<div class="auto-container">
        	<div class="row clearfix">
                @foreach($teams as $team)
            	<!--Farmer Box-->
            	<div class="farmer-box col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-box">
                    	<div class="row clearfix">
                        	<!--Image Column-->
                        	<div class="image-column col-md-4 col-sm-4 col-xs-12">
                            	<div class="image">
                                	<img src="{!! url('storage/'.$team->image)?? ' ' !!}" alt="" />
                                </div>
                            </div>
                            <!--Content Column-->
                            <div class="content-column col-md-8 col-sm-8 col-xs-12">
                            	<div class="title">{{ $team->designation }}</div>
                                <h3>{{ $team->name }}</h3>
                                <div class="text">{{ $team->testimonial }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            
            </div>
        </div>
    </section>

@endsection