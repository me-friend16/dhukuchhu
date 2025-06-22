@extends('user.layouts.app')
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product Category details</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Edit a Product Category: {{$category->name}}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Product Name" value="{{ $category->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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