@extends('user.layouts.app')
@section('backendtopcss')
    
    <link rel="stylesheet" href="https://sonill.github.io/Nepali-Multi-Date-Picker/nepali-date-picker.css">

@endsection
@section('backendcontent')
    <div class="page-header mt-0 shadow p-3">
        <ol class="breadcrumb mb-sm-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event Edit</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Edit an Event: {{$event->name}}</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Event Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Event Name" value="{{ $event->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Event Date</label>
                                    <input type="text" class="form-control event_date @error('event_date') is-invalid state-invalid @enderror" data-single="true" id="event_date" name="event_date" placeholder="Select Nepali Date"  value="{{ $event->event_date }}" required>
                                    @error('event_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="btn btn-primary float-right" type="submit" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('backendbottomscript')
    <script src="https://sonill.github.io/Nepali-Multi-Date-Picker/nepali-date-picker.js"></script>
    <script>
        $(document).ready(function () {
        $('.event_date').nepaliDatePicker();
        });
    </script>
    @endsection