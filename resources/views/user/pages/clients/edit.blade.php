{{-- resources/views/user/clients/edit.blade.php --}}
@extends('user.layouts.app')

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Client</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header"><h2 class="mb-0">Edit Client: {{ $client->name }}</h2></div>
                <div class="card-body">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('user.pages.clients._form', ['client' => $client])
                        <button type="submit" class="btn btn-primary mt-3 float-right">Update Client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection