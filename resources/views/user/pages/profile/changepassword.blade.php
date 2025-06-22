@extends('user.layouts.app')
@section('backendcontent')    
    <div class="row">
        <!-- BASIC WIZARD -->
        <div class="col-xl-12">
            <div class="card m-b-20">
                <div class="card-header">
                    <h2 class="mb-0">Change Your Password</h2>
                </div>
                <div class="card-body">
                        <div id="basicwizard" class="border pt-0">
                            <div class="tab-content card-body  b-0 mb-0">
                                <form method="POST" action="{{ route('password.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group clearfix">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Current Password</label>
                                                            <input type="password" class="form-control @error('current_password') is-invalid state-invalid @enderror" name="current_password" placeholder="Enter your current password" required>
                                                            @error('current_password')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">New Password</label>
                                                            <input type="password" class="form-control @error('password') is-invalid state-invalid @enderror" name="password" placeholder="Enter your current password" required>
                                                            @error('password')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label form-label" for="password_confirmation">Confirm Password</label>
                                                            <input id="password_confirmation" name="password_confirmation" type="password" class="required form-control @error('password_confirmation') is-invalid state-invalid @enderror" placeholder="Repeate new password" required>
                                                            @error('password_confirmation')
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