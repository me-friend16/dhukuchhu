@extends('user.layouts.app')

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Client</li>
        </ol>
        <div class="ml-auto">
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">Edit Client</a>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header"><h2 class="mb-0">Client Details</h2></div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Client Name</dt>
                        <dd class="col-sm-9">{{ $client->name }}</dd>

                        <dt class="col-sm-3">Client Type</dt>
                        <dd class="col-sm-9"><span class="badge badge-info">{{ ucfirst($client->type) }}</span></dd>
                        
                        @if($client->type == 'company')
                        <dt class="col-sm-3">Contact Person</dt>
                        <dd class="col-sm-9">{{ $client->contact_person ?? 'N/A' }}</dd>
                        @endif

                        <dt class="col-sm-3">Email Address</dt>
                        <dd class="col-sm-9">{{ $client->email ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Primary Phone</dt>
                        <dd class="col-sm-9">{{ $client->phone }}</dd>

                        <dt class="col-sm-3">Alternate Phone</dt>
                        <dd class="col-sm-9">{{ $client->alt_phone ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Address</dt>
                        <dd class="col-sm-9">{{ $client->address ?? 'N/A' }}</dd>
                        
                        <dt class="col-sm-3">Notes</dt>
                        <dd class="col-sm-9">{!! nl2br(e($client->notes)) ?? 'No notes provided.' !!}</dd>

                        <dt class="col-sm-3 text-muted">Created At</dt>
                        <dd class="col-sm-9 text-muted">{{ $client->created_at->format('M d, Y h:i A') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection