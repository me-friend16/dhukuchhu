{{-- resources/views/user/logo/index.blade.php --}}
@extends('user.layouts.app')

@section('backendtopcss')
    <!-- Dropify CSS -->
    <link href="{{ asset('backend/assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Company Details</li>
        </ol>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('logo.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Manage Company Details</h2>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    <div class="card-body">
                        <div class="border p-4">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"><i class="fe fe-briefcase"></i> Basic Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"><i class="fe fe-phone"></i> Contact & Map</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab3" role="tab"><i class="fe fe-image"></i> Images</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"><i class="fe fe-globe"></i> About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab5" role="tab"><i class="fe fe-share-2"></i> Social & Footer</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                {{-- Basic Info Tab --}}
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                    <div class="form-group">
                                        <label>Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $logo->name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Slogan / Tagline</label>
                                        <input type="text" class="form-control" name="slogan" value="{{ old('slogan', $logo->slogan) }}">
                                    </div>
                                </div>

                                {{-- Contact & Map Tab --}}
                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Primary Phone</label>
                                                <input type="text" class="form-control" name="primary_phone" value="{{ old('primary_phone', $logo->primary_phone) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Secondary Phone</label>
                                                <input type="text" class="form-control" name="secondary_phone" value="{{ old('secondary_phone', $logo->secondary_phone) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email', $logo->email) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" rows="3">{{ old('address', $logo->address) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Google Map Embed URL</label>
                                        <input type="text" class="form-control" name="map_embed_url" value="{{ old('map_embed_url', $logo->map_embed_url) }}" placeholder="https://www.google.com/maps/embed?...">
                                    </div>
                                </div>

                                {{-- Images Tab --}}
                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Logo (PNG, SVG)</label>
                                                <input type="file" name="logo_image" class="dropify" data-height="150" data-allowed-file-extensions="png svg jpg jpeg" data-default-file="{{ $logo->logo_image ? asset('storage/' . $logo->logo_image) : '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Favicon (.ico or .png)</label>
                                                <input type="file" name="favicon" class="dropify" data-height="150" data-allowed-file-extensions="ico png" data-default-file="{{ $logo->favicon ? asset('storage/' . $logo->favicon) : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- About Us Tab --}}
                                <div class="tab-pane fade" id="tab4" role="tabpanel">
                                    <div class="form-group">
                                        <label>Our Vision</label>
                                        <textarea class="form-control" name="vision" rows="4">{{ old('vision', $logo->vision) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Our Mission</label>
                                        <textarea class="form-control" name="mission" rows="4">{{ old('mission', $logo->mission) }}</textarea>
                                    </div>
                                </div>

                                {{-- Social & Footer Tab --}}
                                <div class="tab-pane fade" id="tab5" role="tabpanel">
                                    <h5>Social Media Links</h5>
                                    @php
                                        $socials = ['facebook', 'twitter', 'instagram', 'linkedin', 'youtube'];
                                    @endphp
                                    @foreach($socials as $social)
                                        <div class="form-group">
                                            <label class="text-capitalize">{{ ucfirst($social) }} URL</label>
                                            <input type="url" class="form-control" name="social_links[{{ $social }}]" value="{{ old("social_links.$social", $logo->social_links[$social] ?? '') }}" placeholder="https://{{ $social }}.com/your-page">
                                        </div>
                                    @endforeach

                                    <hr>
                                    <div class="form-group">
                                        <label>Footer Copyright Text</label>
                                        <input type="text" class="form-control" name="copyright_text" value="{{ old('copyright_text', $logo->copyright_text) }}">
                                    </div>
                                </div>
                            </div>
                        </div> {{-- end border p-4 --}}
                    </div> {{-- end card-body --}}
                </div> {{-- end card --}}
            </div> {{-- end col --}}
        </div> {{-- end row --}}
    </form>
@endsection

@section('backendbottomscript')
    <!-- Dropify JS -->
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/dropify.min.js') }}"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                default: 'Drag & drop or click to upload',
                replace: 'Click or drag to replace',
                remove: 'Remove',
                error: 'Oops, something went wrong.'
            },
            error: {
                'fileSize': 'File size too large (max 2MB).'
            }
        });
    </script>
@endsection