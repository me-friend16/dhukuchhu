@extends('frontend.layouts.app')

@section('content')
<!-- Page Title -->
<section class="page-title" style="background-image: url({{ asset('frontend/assets/images/background/bg.jpg') }});">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Title -->
            <div class="title-column col-md-6 col-sm-12">
                <h1>Gallery</h1>
            </div>
            <!-- Breadcrumb -->
            <div class="breadcrumb-column col-md-6 col-sm-12">
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Gallery</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<div class="gallery-section">
    <div class="auto-container">
        <div class="masonry-container row clearfix">
            @forelse($galleries as $gallery)
            
                <!-- Gallery Item -->
                <div class="gallery-item masonry-item col-lg-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <img 
                                src="{{ $gallery->image ? url('storage/'.$gallery->image) : asset('frontend/assets/images/default.jpg') }}" 
                                alt="{{ $gallery->name }}" 
                                class="img-fluid"
                            />
                            <!-- Overlay Box -->
                            <div class="overlay-box">
                                    <div class="event-name text-white text-center w-100" style="font-weight: bold;">
                                        {{ $gallery->event->name ?? 'No Event' }}
                                    </div>
                                <div class="inner">
                                    <div class="content">
                                        <div class="options-box">
                                            <a 
                                                class="lightbox-image" 
                                                href="{{ $gallery->image ? url('storage/'.$gallery->image) : asset('frontend/assets/images/default.jpg') }}" 
                                                title="{{ $gallery->name }}" 
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
            @empty
                <div class="col-12 text-center">
                    <p>No gallery items found.</p>
                </div>
            @endforelse
        </div>

        <!-- Load More Button -->
        <div class="pagination-wrapper text-center mt-4">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
<!-- End Gallery Section -->
@endsection
