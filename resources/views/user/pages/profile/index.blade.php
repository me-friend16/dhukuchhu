@extends('user.layouts.app')
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">profile</li>
        </ol>
        <div class="btn-group mb-0">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-plus mr-2"></i>Edit details</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('profile.changepassword') }}"><i class="fas fa-cog mr-2"></i>Change Password</a>
            </div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-profile  overflow-hidden">
                <div class="card-body text-center cover-image" data-image-src="{{ asset('backend') }}/assets/img/profile-bg.jpg">
                    <div class=" card-profile">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="">
                                    <a href="{{url('storage/'. Auth::user()->image)}}" _blank>
                                        <img 
                                            src="{{ Auth::user()->image ? url('storage/'. Auth::user()->image) : asset('backend/assets/img/faces/female/32.jpg') }}" 
                                            class="rounded-circle" 
                                            alt="profile" style="width:72%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3 text-white">{{ Auth::user()->name }}</h3>
                    <p class="mb-4 text-white">{{ Auth::user()->role }}</p>
                    <a href="{{ route('profile.editprofilepicture') }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit profile pic</a>
                </div>
            </div>
            <div class="card shadow ">
                <div class="card-body pb-0">
                    <div class="" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <h2>About Me</h2>
                        <div class="table-responsive border ">
                            <table class="table row table-borderless w-100 m-0 ">
                                <tbody class="col-lg-6 p-0">
                                    <tr>
                                        <td><strong>Full Name :</strong> {{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>User Role :</strong> {{ Auth::user()->role }}</td>
                                    </tr>
                                </tbody>
                                <tbody class="col-lg-6 p-0">
                                    <tr>
                                        <td><strong>Email :</strong> {{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone :</strong> {{ Auth::user()->phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection