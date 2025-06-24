{{-- resources/views/user/services/create.blade.php --}}

@extends('user.layouts.app')

@section('backendtopcss')
    <!-- Dropify CSS -->
    <link href="{{ asset('backend') }}/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
@endsection

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Service</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Add New Service</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('user.pages.services._form')
                        <button type="submit" class="btn btn-primary mt-3 float-right">Add Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('backendbottomscript')
    <!-- Dropify JS -->
    <script src="{{ asset('backend') }}/assets/plugins/fileuploads/js/dropify.min.js"></script>

    <script>
		$('.dropify').dropify({
			messages: {
				'default': 'Drag and drop a file here or click',
				'replace': 'Drag and drop or click to replace',
				'remove': 'Remove',
				'error': 'Ooops, something wrong happened.'
			},
			error: {
				'fileSize': 'The file size is too big (2M max).'
			}
		});
	</script>
@endsection