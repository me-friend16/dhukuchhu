@extends('user.layouts.app')
@section('backendtopcss')
<!-- gallery css-->
<link href="{{ asset('backend') }}/assets/plugins/gallery/dist/simplelightbox.min.css" rel="stylesheet" />
@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
     
        <div class="btn-group mb-0">
            <a href="{{ route('event.addimage', $event->id) }}" class="btn btn-primary  mb-0"><i class="fas fa-cog mr-2"></i>Add more images</a>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="gallery row">
        <div class="col-md-12">
            <div class="card shadow ">
                <div class="card-body pb-0">
                    <div class="" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <div class="card-header">
                            <h2 class="mb-0">Event: {{$event->name}}</h2>
                        </div>
                        <div class="card-header">
                            <p class="description">Date: {{ $event->nepali_event_date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($galleries as $gallery)
        <div class="col-lg-4 hover15">
            <div class="card shadow overflow-hidden">
                <a href="{{ url('storage/'.$gallery->image) }}" class="big"><img src="{{ url('storage/'.$gallery->image) }}" alt="{{$event->name}}" title="{{$event->name}}" /></a>
            </div>
            <div>
                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" style="position:absolute; top:5px; right:5px;">
                @csrf
                @method('DELETE')
                    <div class="btn-group mb-0">
                        <button type="submit" onclick="return confirm('Delete this image?')" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-2"></i>Delete</button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
@section('backendbottomscript')
<!-- gallery Js-->
<script src="{{ asset('backend') }}/assets/plugins/gallery/dist/simple-lightbox.js"></script>
<script src="{{ asset('backend') }}/assets/js/gallery.js"></script>
@endsection