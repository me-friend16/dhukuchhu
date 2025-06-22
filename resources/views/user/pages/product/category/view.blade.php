@extends('user.layouts.app')
@section('backendtopcss')
<!-- gallery css-->
<link href="{{ asset('backend') }}/assets/plugins/gallery/dist/simplelightbox.min.css" rel="stylesheet" />
@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Category Detail</li>
        </ol>
        <div class="btn-group mb-0">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('category.edit', $category->id) }}"><i class="fas fa-cog mr-2"></i>Edit details</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('product.create', $category->id) }}"><i class="fas fa-plus mr-2"></i>Add Product</a>
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
            <div class="card shadow ">
                <div class="card-body pb-0">
                    <div class="" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                        <div class="card-header">
                            <h2 class="text-center">Category Name: {{$category->name}}</h2>
                        </div>
                        @if($category->description)
                        <div class="card-header">
                            <p class="text-center">Description:</p>
                            <p class="description">{{ $category->description }}</p>
                        </div>
                        @endif
                        @if($category->image)
                        <div class="card-header">
                            <p class="text-center">Display Pic:</p>
                            <div class="row justify-content-md-center">
                                <div class="col-lg-3 hover15">
                                    <div class="card shadow overflow-hidden">
                                        <a href="{{ url('storage/'.$category->image) }}" class="big"><img src="{{ url('storage/'.$category->image) }}" alt="{{$category->name}}" title="{{$category->name}}" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="card-header">
                            <p class="text-center">Products in this category:</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="event" class="table table-striped table-bordered w-100 text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">S.No.</th>
                                            <th class="wd-15p">Product Name</th>
                                            <th class="wd-15p">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <div class="">
                                                    <div class="">    
                                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                                                    </div>
                                                    <div class=""> 
                                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    </div>
                                                    <div class=""> 
                                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Delete this product?')" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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