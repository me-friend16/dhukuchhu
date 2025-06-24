@extends('user.layouts.app')

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Clients</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Clients List</h2>
                    <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">Add New Client</a>
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
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clients as $index => $client)
                                    <tr>
                                        <td>{{ $clients->firstItem() + $index }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td><span class="badge badge-info">{{ ucfirst($client->type) }}</span></td>
                                        <td>{{ $client->email ?? 'N/A' }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-secondary">View</a>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this client?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No clients found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection