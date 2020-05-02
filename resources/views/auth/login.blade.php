@extends('layouts.auth')

@section('content')
<div class="card border-0 shadow" style="width: 800px; height: 500px">
    <div class="card-body px-0 py-0">
        <div class="row ml-0 mr-0">
            <div class="col-md-7 py-0 text-center px-0" style="height: 500px">
                <div class="w-100 blank" style="height: 50px">

                </div>

                <div class="w-100 px-4">
                    <div class="w-100 contain-image login-art" style="height: 400px">

                    </div>
                </div>

                <div class="w-100 blank" style="height: 50px">

                </div>
            </div>

            <div class="col-md-5 px-0 text-left align-items-center justify-content-center">
                <div class="w-100 pt-5" style="height: 430px">
                    <div class="w-100 mb-0">
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-fill bd-highlight">
                                <h3 class="text-left mb-2">Welcome Back</h3>
                                <h6 class="font-small text-secondary text-left mb-4">
                                    Sign in using your account to access the system
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 text-left pr-3">
                        <form action="" method="post">
                            @csrf

                            <div class="row ml-0 mr-0">
                                <div class="col-md-12 mb-4">
                                    <input class="form-control input100 @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" type="email" autocomplete="off" placeholder="E-mail Address" required>

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

                                <div class="col-md-12 mb-3">
                                    <input class="form-control input100" id="password" value="" name="password" type="password" placeholder="Password" required>

                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100" id="icon-pwd">
                                        <i class="fal fa-key icon-pwd" aria-hidden="true"></i>
                                    </span>
                                </div>

                                <div class="offset-md-5 col-md-7 text-right pt-1 pb-2">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link font-small forgot-link text-secondary" href="{{ route('password.request') }}">
                                            <span>{{ __('Forgot Password?') }}</b></span>
                                        </a>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" id="butn" class="btn px-3 w-100 btn-success shadow">
                                        {{ __('Sign In') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="w-100 logo-div px-2" style="height: 70px">
                    <div class="row mx-0">
                        <div class="col-md-12" id="company_logo">
                            <div class="w-75 float-right">
                                <img alt="company_logo" class="float-right" src="{{ asset('img/icons/5511031TOqFD1502285018.jpg') }}" width="auto" height="45px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('script')
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(document).ready(function() {
    $("input").focus(function(){
        id = $(this).attr('id')

        if (id == 'password') {
            $(".icon-pwd").css("color", "#28B463");
            $(".icon-email").css("color", "#666666");

            $('#icon-pwd').effect("bounce", { times:5 }, 300);
        } else if (id == 'email') {
            $(".icon-pwd").css("color", "#666666");
            $(".icon-email").css("color", "#28B463");

            $('#icon-email').effect("bounce", { times:5 }, 300);
        }
        console.log(id)
    }); 
})
</script>

@endpush


