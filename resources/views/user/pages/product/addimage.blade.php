@extends('user.layouts.app')
@section('backendtopcss')
<link href="{{ asset('backend') }}/assets/css/filepond.min.css" rel="stylesheet">
<link href="{{ asset('backend') }}/assets/css/filepond-plugin-image-preview.min.css" rel="stylesheet">
<style>
        .filepond--item {
            width: 120px !important; /* Small preview size */
            margin-right: 10px;
        }

        .filepond--list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filepond--root {
            max-width: 100%;
        }
    </style>
    
    <link rel="stylesheet" href="https://sonill.github.io/Nepali-Multi-Date-Picker/nepali-date-picker.css">

@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product Image</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Add image to Product, {{$product->name}}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.saveimage', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <input type="file" name="images[]" multiple id="imageUpload" class="@error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" required>

                                    @error('images')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror

                                    @foreach ($errors->get('images.*') as $imageErrors)
                                        @foreach ($imageErrors as $error)
                                            <span class="text-danger d-block">{{ $error }}</span>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="btn btn-primary float-right" type="submit" value="Submit">
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
    <!-- FilePond JS -->
    <script src="{{ asset('backend') }}/assets/js/filepond.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/filepond-plugin-image-preview.min.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        FilePond.create(document.getElementById('imageUpload'), {
            acceptedFileTypes: ['image/*'],
            allowMultiple: true,
            storeAsFile: true // <-- IMPORTANT!
        });
    </script>
    @endsection