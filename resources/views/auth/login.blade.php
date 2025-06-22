@extends('user.layouts.app')

@section('backendcontent')

<form class="login100-form validate-form"method="POST" action="{{ route('login') }}">
        @csrf
    <span class="login100-form-title">
        Member Login
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input class="input100" type="text" name="email" placeholder="Email">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input class="input100" type="password" name="password" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>

    <div class="container-login100-form-btn">
        <input class="btn btn-primary float-right" type="submit" value="Login">
    </div>

</form>

@endsection

