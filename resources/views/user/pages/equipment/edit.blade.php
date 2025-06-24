@extends('user.layouts.app')
@section('backendtopcss')
    <!-- form Uploads -->
    <link href="{{ asset('backend') }}/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Equipment Details</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Edit Equipment Details</h2>
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
                    <form method="POST" action="{{ route('equipment.update', $equipment->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Category -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Equipment Category</label>
                                    <select name="equipment_category_id" class="form-control @error('equipment_category_id') is-invalid @enderror" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('equipment_category_id', $equipment->equipment_category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('equipment_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Equipment Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Company Name" value="{{ $equipment->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Notes -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Notes</label>
                                    <textarea name="notes" rows="3" class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $equipment->notes) }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Equipment Image(Only if want to change)</label>
                                    <input type="file" name="image" class="form-control dropify @error('images') is-invalid @enderror @error('image') is-invalid @enderror" data-height="300"/>
                                </div>
                                @error('image')
                                    <span class="text-danger d-block">Error in Equipment image upload</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="btn btn-primary float-right" type="submit" value="Change Image">
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
    <!-- file uploads js -->
    <script src="{{ asset('backend') }}/assets/plugins/fileuploads/js/dropify.min.js"></script>
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