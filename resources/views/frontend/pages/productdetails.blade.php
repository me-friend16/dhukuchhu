@extends('frontend.layouts.app')
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image: url({{ asset('frontend/assets/images/background/bg.jpg') }});">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Title -->
            <div class="title-column col-md-6 col-sm-12 col-xs-12">
                <h1>Product Detail</h1>
            </div>
            <!--Bread Crumb -->
            <div class="breadcrumb-column col-md-6 col-sm-12 col-xs-12">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Product Detail</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--Shop Section-->
<section class="shop-single">
    <div class="auto-container">
        <div class="row clearfix">
            <!--content column-->
            <div class="content-column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-details">
            
                    <!--Basic Details-->
                    <div class="basic-details">
                        <div class="row clearfix">
                            <div class="image-column col-md-5 col-sm-12 col-xs-12">
                                <figure class="image-box"><a href="{!! url('storage/'.$product->image)?? ' ' !!}" class="lightbox-image" title="{{ $product->name}}"><img src="{!! url('storage/'.$product->image)?? ' ' !!}" alt="{{ $product->name}}"></a></figure>
                            </div>
                            <div class="info-column col-md-7 col-sm-12 col-xs-12">
                                <div class="details-header">
                                    <h4>{{ $product->name }}</h4>
                                </div>
                                <div class="text">{{ $product->description }}</div>
                                <div class="item-categories">Categories:&ensp; {{ $product->category->name }}</div>
                                
                            </div>
                        </div>
                    </div>
                    <!--Basic Details-->
                    
                    <!--Related Post-->
                    <div class="related-posts">
                        <h2>More images of {{ $product->name }}</h2>
                        <div class="row clearfix">
                            @foreach($product->images as $photo)
                            <!--Shop Item-->
                            <div class="gallery-item masonry-item col-lg-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <img 
                                src="{{ $photo->image ? url('storage/'.$photo->image) : asset('frontend/assets/images/default.jpg') }}" 
                                alt="{{ $product->name }}" 
                                class="img-fluid"
                            />
                            <!-- Overlay Box -->
                            <div class="overlay-box">
                                    <div class="event-name text-white text-center w-100" style="font-weight: bold;">
                                        {{ $product->name ?? 'No Product' }}
                                    </div>
                                <div class="inner">
                                    <div class="content">
                                        <div class="options-box">
                                            <a 
                                                class="lightbox-image" 
                                                href="{{ $photo->image ? url('storage/'.$photo->image) : asset('frontend/assets/images/default.jpg') }}" 
                                                title="{{ $product->name }}" 
                                                data-fancybox="gallery"
                                            >
                                                <span class="fa fa-expand"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End Related Post-->
                    
                </div>
            </div>
            <!--End content Side-->
            
        </div>
    </div>
</section>
<!--End Shop Section-->

@endsection