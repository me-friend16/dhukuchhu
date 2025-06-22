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
    <!-- form Uploads -->
    <link href="{{ asset('backend') }}/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Creation</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Create a Product</h2>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('product.store', $category) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Enter Product Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Product Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid state-invalid @enderror" id="description" name="description" rows="4" placeholder="Product description here.." required></textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Dispaly Image</label>
                                    <input type="file" name="image" class="form-control dropify @error('images') is-invalid @enderror @error('image') is-invalid @enderror" data-height="100" required/>
                                </div>
                                @error('image')
                                    <span class="text-danger d-block">Dispaly image is required</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">More Images</label>
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
    <!-- file uploads js -->
    <script src="{{ asset('backend') }}/assets/plugins/fileuploads/js/dropify.min.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        FilePond.create(document.getElementById('imageUpload'), {
            acceptedFileTypes: ['image/*'],
            allowMultiple: true,
            storeAsFile: true // <-- IMPORTANT!
        });
    </script>
    <script>
		$('.dropify').dropify({
			messages: {
				'default': 'Drag and drop a image here or click',
				'replace': 'Drag and drop or click to replace',
				'remove': 'Remove',
				'error': 'Ooops, something wrong appended.'
			},
			error: {
				'fileSize': 'The image size is too big (2M max).'
			}
		});
	</script>
    @endsection