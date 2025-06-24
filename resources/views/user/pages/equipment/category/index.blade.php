@extends('user.layouts.app')

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Equipment Categories</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Equipment Categories</h2>
                    <a href="{{ route('equipment-categories.create') }}" class="btn btn-primary btn-sm">Add New</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>No. of Equipments</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ Str::limit($category->description, 30) }}</td>
                                        <td>{{ $category->equipment->count() }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('equipment-categories.show', $category->id) }}" class="btn btn-sm btn-secondary">View</a>
                                            <a href="{{ route('equipment-categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('equipment-categories.destroy', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No categories found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination (if needed) --}}
                    <div class="d-flex justify-content-end">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
