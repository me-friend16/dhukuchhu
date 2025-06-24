@extends('user.layouts.app')

@section('backendtopcss')
<!-- gallery css-->
<link href="{{ asset('backend') }}/assets/plugins/gallery/dist/simplelightbox.min.css" rel="stylesheet" />
@endsection

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('equipment-categories.index') }}">Equipment Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
        <div class="btn-group mb-0">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('equipment-categories.edit', $category->id) }}"><i class="fas fa-cog mr-2"></i>Edit Category</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('equipment.create', $category->id) }}"><i class="fas fa-plus mr-2"></i>Add Equipment</a>
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

    <div class="gallery row justify-content-md-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body pb-0">
                    <div class="card-header">
                        <h2 class="text-center">Category Name: {{ $category->name }}</h2>
                    </div>

                    @if($category->description)
                        <div class="card-header">
                            <p class="text-center">Description:</p>
                            <p class="description text-center">{{ $category->description }}</p>
                        </div>
                    @endif

                    <div class="card-header">
                        <p class="text-center">Equipment in this Category:</p>
                    </div>

                    <div class="card-body">
                        @if($category->equipment->count())
                            <div class="table-responsive">
                                <table id="equipment-table" class="table table-striped table-bordered w-100 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p">S.No.</th>
                                            <th class="wd-20p">Equipment Name</th>
                                            <th class="wd-15p">Description</th>
                                            <th class="wd-15p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category->equipment as $equipment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $equipment->name }}</td>
                                                <td>{{ Str::limit($equipment->notes, 30) }}</td>
                                                <td>
                                                    <a href="{{ route('equipment.show', $equipment->id) }}" class="btn btn-sm btn-primary mb-1">View</a>
                                                    <a href="{{ route('equipment.edit', $equipment->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                                    <form action="{{ route('equipment.destroy', $equipment->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this equipment?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm mb-1">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted text-center">No equipment found in this category.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('backendbottomscript')
<!-- gallery Js-->
<script src="{{ asset('backend') }}/assets/plugins/gallery/dist/simple-lightbox.js"></script>
<script src="{{ asset('backend') }}/assets/js/gallery.js"></script>
@endsection
