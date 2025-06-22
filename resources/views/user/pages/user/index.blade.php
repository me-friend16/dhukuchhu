@extends('user.layouts.app')
@section('backendtopcss')
    <!-- DataTables CSS -->
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection

@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User List</li>
        </ol>
        <div class="ml-auto">
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New User</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">All Users</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="userTable" class="table table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure to delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                @if($users->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">No users found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col -->
    </div> <!-- row -->
@endsection

@section('backendbottomscript')
    <!-- DataTables JS -->
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                pageLength: 10,
                ordering: true
            });
        });
    </script>
@endsection
