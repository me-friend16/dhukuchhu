@extends('user.layouts.app')

@section('backendcontent')
<div class="page-header mt-0 shadow p-3">
    <ol class="breadcrumb mb-sm-0">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contacts</li>
    </ol>
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
                <h2 class="mb-0">Contact Messages</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="contact-table" class="table table-striped table-bordered w-100 text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->username }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>
                                        <span class="badge badge-{{ 
                                            $contact->status === 'pending' ? 'secondary' : 
                                            ($contact->status === 'processing' ? 'warning' : 'success') 
                                        }}">
                                            {{ ucfirst($contact->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button 
                                            class="btn btn-sm btn-info" 
                                            data-toggle="modal" 
                                            data-target="#statusModal"
                                            data-id="{{ $contact->id }}"
                                            data-name="{{ $contact->username }}"
                                            data-email="{{ $contact->email }}"
                                            data-phone="{{ $contact->phone }}"
                                            data-subject="{{ $contact->subject }}"
                                            data-message="{{ $contact->message }}"
                                            data-status="{{ $contact->status }}"
                                        >
                                            Change Status
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- You may add pagination here if needed --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="statusForm" method="POST" action="">
        @csrf
        @method('PUT')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Contact Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="contact_id" id="contact_id">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="contact_name" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" id="contact_email" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" id="contact_phone" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" id="contact_subject" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Message</label>
                    <textarea id="contact_message" class="form-control" rows="4" readonly></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Change Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="contacted">Contacted</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update Status</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endsection

@section('backendbottomscript')
<script>
    $('#statusModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const id      = button.data('id');
        const name    = button.data('name');
        const email   = button.data('email');
        const phone   = button.data('phone');
        const subject = button.data('subject');
        const message = button.data('message');
        const status  = button.data('status');

        const modal = $(this);
        modal.find('#contact_id').val(id);
        modal.find('#contact_name').val(name);
        modal.find('#contact_email').val(email);
        modal.find('#contact_phone').val(phone);
        modal.find('#contact_subject').val(subject);
        modal.find('#contact_message').val(message);
        modal.find('#status').val(status);
        modal.find('#statusForm').attr('action', '{{ route("contact.changestatus", ":id") }}'.replace(':id', id));
    });
</script>
@endsection
