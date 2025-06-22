@extends('user.layouts.app')
@section('backendtopcss')
    <!-- Dropify CSS -->
    <link href="{{ asset('backend/assets/plugins/fileuploads/css/dropify.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Edit User</h2>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $user->name) }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', $user->email) }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', $user->phone) }}" required>
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Password (optional) -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password <small>(Leave blank to keep current password)</small></label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                           placeholder="New Password">
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="confirm_password" class="form-control"
                                           placeholder="Confirm Password">
                                    <div class="invalid-feedback d-none" id="confirm-password-error">Passwords do not match</div>
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="image" class="form-control dropify @error('image') is-invalid @enderror"
                                           data-height="100"
                                           data-default-file="{{ $user->image ? asset('storage/'. $user->image) : '' }}">
                                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" id="submitBtn" class="btn btn-primary float-right">Update User</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col -->
    </div> <!-- row -->
@endsection

@section('backendbottomscript')
    <!-- Dropify JS -->
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/dropify.min.js') }}"></script>

    <script>
        $('.dropify').dropify();

        $('#submitBtn').click(function (e) {
            let password = $('input[name="password"]').val();
            let confirmPassword = $('#confirm_password').val();

            if (password && password !== confirmPassword) {
                e.preventDefault();
                $('#confirm-password-error').removeClass('d-none');
                $('#confirm_password').addClass('is-invalid');
            } else {
                $('#confirm-password-error').addClass('d-none');
                $('#confirm_password').removeClass('is-invalid');
            }
        });
    </script>
@endsection
