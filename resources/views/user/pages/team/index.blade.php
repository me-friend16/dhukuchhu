@extends('user.layouts.app')
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Team Members List</li>
        </ol>
        <div class="btn-group mb-0">
            <a href="{{ route('team.create') }}" class="btn btn-primary  mb-0"><i class="fas fa-cog mr-2"></i>Add New Member</a>
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
                    <h2 class="mb-0">Team Members List</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="event" class="table table-striped table-bordered w-100 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-15p">S.No.</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Designation</th>
                                    <th class="wd-15p">Phone</th>
                                    <th class="wd-15p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->designation }}</td>
                                    <td>{{ $team->phone }}</td>
                                    <td>
                                        <div class="">
                                            <div class="">    
                                                <a href="{{ route('team.show', $team->id) }}" class="btn btn-sm btn-primary">View</a>
                                            </div>
                                            <div class=""> 
                                                <a href="{{ route('team.edit', $team->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            </div>
                                            <div class=""> 
                                                <form action="{{ route('team.destroy', $team->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Delete this Member?')" class="btn btn-danger btn-sm">Delete</button>
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
@endsection
