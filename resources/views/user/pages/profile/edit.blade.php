@extends('user.layouts.app')
@section('backendcontent')    
    <div class="row">
        <!-- BASIC WIZARD -->
        <div class="col-xl-12">
            <div class="card m-b-20">
                <div class="card-header">
                    <h2 class="mb-0">Change Your Details</h2>
                </div>
                <div class="card-body">
                        <div id="basicwizard" class="border pt-0">
                            <div class="tab-content card-body  b-0 mb-0">
                                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group clearfix">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Full Name</label>
                                                            <input type="text" class="form-control @error('name') is-invalid state-invalid @enderror" name="name" placeholder="Enter Full Name" value="{{ Auth::user()->name }}" required>
                                                            @error('name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control @error('email') is-invalid state-invalid @enderror" name="email" placeholder="Enter Email" value="{{ Auth::user()->email }}" required>
                                                            @error('email')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Mobile number</label>
                                                            <input type="number" class="form-control @error('phone') is-invalid state-invalid @enderror" name="phone" placeholder="Enter Mobile Number" value="{{ Auth::user()->phone }}" required>
                                                            @error('phone')
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
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection