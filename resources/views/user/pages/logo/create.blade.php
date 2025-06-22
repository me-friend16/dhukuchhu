@extends('user.layouts.app')
@section('backendtopcss')

    <!-- form Uploads -->
    <link href="{{ asset('backend') }}/assets/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />

@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Company Details</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Add Company Details</h2>
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
                    <form method="POST" action="{{ route('logo.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Enter Organization Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Company Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control @error('phone1') is-invalid state-invalid @enderror" name="phone1" placeholder="Enter Phone/Mobile number" value="{{ old('phone1') }}" required>
                                    @error('phone1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Alternative Phone number</label>
                                    <input type="text" class="form-control @error('phone2') is-invalid state-invalid @enderror" name="phone2" placeholder="Enter Phone/Mobile number" value="{{ old('phone2') }}" required>
                                    @error('phone2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid state-invalid @enderror" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid state-invalid @enderror" name="address" placeholder="Enter Address" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Map(Google Embeded Link)</label>
                                    <input type="text" class="form-control @error('map') is-invalid state-invalid @enderror" name="map" placeholder="Enter Embeded google map link" value="{{ old('map') }}" required>
                                    @error('map')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="form-label">Slogan</label>
                                    <textarea class="form-control @error('slogan') is-invalid state-invalid @enderror" id="slogan" name="slogan" rows="4" placeholder="Enter Slogan here.."></textarea>
                                </div>
                                @error('slogan')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="form-label">Vision</label>
                                    <textarea class="form-control @error('vision') is-invalid state-invalid @enderror" id="vision" name="vision" rows="4" placeholder="Enter Vision here.."></textarea>
                                </div>
                                @error('vision')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="form-label">Mission</label>
                                    <textarea class="form-control @error('mission') is-invalid state-invalid @enderror" id="mission" name="mission" rows="4" placeholder="Enter Mission here.."></textarea>
                                </div>
                                @error('mission')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Logo</label>
                                    <input type="file" name="image" class="form-control dropify @error('images') is-invalid @enderror @error('image') is-invalid @enderror" data-height="100" required/>
                                </div>
                                @error('image')
                                    <span class="text-danger d-block">Logo image is required</span>
                                @enderror
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