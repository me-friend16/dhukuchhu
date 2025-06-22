@extends('user.layouts.app')
@section('backendtopcss')
    
    <link rel="stylesheet" href="https://sonill.github.io/Nepali-Multi-Date-Picker/nepali-date-picker.css">

@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event Product details</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Edit a Product: {{$product->name}}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Product Name" value="{{ $product->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid state-invalid @enderror" id="description" name="description" rows="4" placeholder="Product description here.." required>{{ $product->description }}</textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="btn btn-primary float-right" type="submit" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('backendbottomscript')
    <script src="https://sonill.github.io/Nepali-Multi-Date-Picker/nepali-date-picker.js"></script>
    <script>
        $(document).ready(function () {
        $('.event_date').nepaliDatePicker();
        });
    </script>
    @endsection