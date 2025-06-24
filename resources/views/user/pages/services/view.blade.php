{{-- resources/views/user/services/show.blade.php --}}

@extends('user.layouts.app')

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Service</li>
        </ol>
        <div class="ml-auto">
            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info btn-sm">Edit Service</a>
            <a href="{{ route('services.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Service Details: {{ $service->name }}</h2>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $service->name }}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">
                            @if($service->status == 'active')
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </dd>
                        
                        <dt class="col-sm-3">Icon</dt>
                        <dd class="col-sm-9">
                            @if($service->icon)
                                <img src="{{ asset('storage/' . $service->icon) }}" alt="Icon" height="50">
                            @else
                                No icon uploaded.
                            @endif
                        </dd>

                        <dt class="col-sm-3">Image</dt>
                        <dd class="col-sm-9">
                            @if($service->image)
                                <img src="{{ url('storage/'.$service->image) }}" alt="Image" class="img-fluid" style="max-width: 300px;">
                            @else
                                No image uploaded.
                            @endif
                        </dd>

                        <dt class="col-sm-3">Short Description</dt>
                        <dd class="col-sm-9">{{ $service->short_description ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Full Description</dt>
                        <dd class="col-sm-9">{!! nl2br(e($service->description)) ?? 'N/A' !!}</dd>
                        
                        <dt class="col-sm-3">Created At</dt>
                        <dd class="col-sm-9">{{ $service->created_at->format('M d, Y h:i A') }}</dd>

                        <dt class="col-sm-3">Last Updated</dt>
                        <dd class="col-sm-9">{{ $service->updated_at->format('M d, Y h:i A') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection