{{-- resources/views/user/clients/create.blade.php --}}
@extends('user.layouts.app')

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Client</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header"><h2 class="mb-0">Add New Client</h2></div>
                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf
                        @include('user.pages.clients._form')
                        <button type="submit" class="btn btn-primary mt-3 float-right">Save Client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection