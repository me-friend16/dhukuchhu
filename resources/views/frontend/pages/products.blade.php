@extends('frontend.layouts.app')
@section('content')

 	<!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('frontend') }}/assets/images/background/bg.jpg);">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Title -->
            	<div class="title-column col-md-6 col-sm-12 col-xs-12">
                	<h1>Our Products</h1>
                </div>
                <!--Bread Crumb -->
                <div class="breadcrumb-column col-md-6 col-sm-12 col-xs-12">
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Our Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

	<!--Shop Section-->
    <section class="shop-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	@foreach($products as $product)
                <!--Shop Item-->
                <div class="shop-item col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box"><img src="{!! url('storage/'.$product->image)?? ' ' !!}" alt="">
                            <div class="overlay-box">
                                <div class="option-box">
                                    <a href="" class="eye-btn"><span class="">View</span></a>
                                </div>
                                <!--lower box-->
                                <div class="lower-box">
                                    <h3><a href="{{ route('product.detail',[$product->id]) }}">{{ $product->name }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            
            
            <!-- Styled Pagination -->
            <div class="pagination-wrapper text-center mt-4">
                {{ $products->links() }}
            </div>

            
        </div>
    </section>
    <!--End Shop Section-->

@endsection