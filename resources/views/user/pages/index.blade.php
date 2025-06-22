@extends('user.layouts.app')
@section('backendcontent')
<div class="page-header mt-0 shadow p-3">
    <ol class="breadcrumb mb-sm-0">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>
<div class="card shadow overflow-hidden">
    <div class="">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 stats">
                <div class="text-center">
                    <p class="text-light">
                        <i class="fas fa-chart-line mr-2"></i>
                        Total Products
                    </p>
                    <h2 class="text-primary text-xxl">{{ $products->count() }}</h2>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 stats">
                <div class="text-center">
                    <p class="text-light">
                        <i class="fas fa-users mr-2"></i>
                        Total Users
                    </p>
                    <h2 class="text-yellow text-xxl">{{ $users->count() }}</h2>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 stats">
                <div class="text-center">
                    <p class="text-light">
                        <i class="fas fa-cart-arrow-down mr-2"></i>
                        Images in Gallery
                    </p>
                    <h2 class="text-warning text-xxl">{{ $galleries->count() }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-transparent border-0">
                <h2 class=" mb-0">Product Tables</h2>
            </div>
            <div class="">
                <div class="grid-margin">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
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