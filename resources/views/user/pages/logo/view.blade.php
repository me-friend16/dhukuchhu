@extends('user.layouts.app')
@section('backendtopcss')
<!-- gallery css-->
<link href="{{ asset('backend') }}/assets/plugins/gallery/dist/simplelightbox.min.css" rel="stylesheet" />
@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Company Details</li>
        </ol>
        <div class="btn-group mb-0">
            <a href="{{ route('logo.edit', $logo->id) }}" class="btn btn-primary  mb-0"><i class="fas fa-cog mr-2"></i>Edit Company Details</a>
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
    <div class="gallery row justify-content-md-center">
        <div class="col-md-12">
            <div class="card shadow ">
                <div class="card-body pb-0">
                    <div class="" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <div class="card-header">
                            <h2 class="text-center">Comapany Name: {{$logo->name}}</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Phone: {{$logo->phone1}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Phone: {{$logo->phone2}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Email: {{$logo->email}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>Address: {{$logo->address}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <p class="text-center">Slogan:</p>
                            <p class="description">{{ $logo->slogan }}</p>
                        </div>
                        <div class="card-header">
                            <p class="text-center">Vision:</p>
                            <p class="description">{{ $logo->vision }}</p>
                        </div>
                        <div class="card-header">
                            <p class="text-center">Mission:</p>
                            <p class="description">{{ $logo->mission }}</p>
                        </div>
                        <div class="card-header">
                            <p class="text-center">Logo Image:</p>
                            <div class="row justify-content-md-center">
                                <div class="col-lg-3 hover15">
                                    <div class="card shadow overflow-hidden">
                                        <a href="{{ url('storage/'.$logo->image) }}" class="big"><img src="{{ url('storage/'.$logo->image) }}" alt="{{$logo->name}}" title="{{$logo->name}}" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <p class="text-center">Google Map:</p>
                            <div class="row justify-content-md-center">
                                <div class=" hover15">
                                    <div class="card shadow overflow-hidden">
                                        {!! $logo->map !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('backendbottomscript')
<!-- gallery Js-->
<script src="{{ asset('backend') }}/assets/plugins/gallery/dist/simple-lightbox.js"></script>
<script src="{{ asset('backend') }}/assets/js/gallery.js"></script>
@endsection