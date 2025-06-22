@extends('user.layouts.app')
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Company List</li>
        </ol>
        <div class="btn-group mb-0">
            <a href="{{ route('logo.create') }}" class="btn btn-primary  mb-0"><i class="fas fa-cog mr-2"></i>Add New Company Details</a>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Company Details List</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="event" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">S.No.</th>
                                    <th class="wd-15p">Company Name</th>
                                    <th class="wd-15p">slogan</th>
                                    <th class="wd-15p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logos as $logo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $logo->company name }}</td>
                                    <td class="text-truncate">{{ $logo->slogan }}</td>
                                    <td>
                                        <div class="">
                                            <div class="">    
                                                <a href="{{ route('logo.show', $logo->id) }}" class="btn btn-sm btn-primary">View</a>
                                            </div>
                                            <div class=""> 
                                                <a href="{{ route('logo.edit', $logo->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
@endsection
