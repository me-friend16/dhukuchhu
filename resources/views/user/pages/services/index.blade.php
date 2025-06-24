{{-- resources/views/user/services/index.blade.php --}}

@extends('user.layouts.app')

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Services List</h2>
                    <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">Add New Service</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Short Description</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($services as $index => $service)
                                    <tr>
                                        <td>{{ $services->firstItem() + $index }}</td>
                                        <td>
                                            @if($service->image)
                                                <img src="{{ url('storage/'.$service->image) }}" alt="{{ $service->name }}" width="60">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ Str::limit($service->short_description, 50) }}</td>
                                        <td>
                                            @if($service->status == 'active')
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-secondary">View</a>
                                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this service?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No services found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection