@extends('layouts.auth')

@section('content')
<div class="card border-0 shadow" style="width: 570px; height: 430px">
    <div class="card-body px-0 pt-4">
        <div class="row ml-0 mr-0 justify-content-center">
            <div class="col-md-9 mb-3">
                <h5 class="text-center mb-2">Forgot Password?</h5>
            </div>

            <div class="col-md-7 mb-3">
                <img alt="forgot-password-image" class="image-center" src="{{ asset('img/icons/key_label.png') }}" width="auto" height="80px">
            </div>

            <div class="col-md-7 mb-2">
                <h6 class="font-small text-secondary text-center mb-4">
                    To recover your password, kindly enter your registered e-mail address and we'll send a password reset link to your email.
                </h6>
            </div>

            <div class="col-md-8">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group row justify-content-center mb-4">
                        <div class="col-md-9">
                            <input class="form-control input100" id="email" value="{{ old('email') }}" name="email" type="email" autocomplete="email" placeholder="E-mail Address" required>

                            <span class="focus-input100"></span>
                            <span class="symbol-input100" id="icon-email">
                                <i class="fal fa-envelope-open icon-email" aria-hidden="true"></i>
                            </span>

                            @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <span class="font-bold">{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3 justify-content-center">
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <div class="col-md-12">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                 {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
