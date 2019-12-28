@extends('layouts.auth')

@section('content')
<div class="card border-0 shadow" style="width: 700px; height: 400px">
    <div class="card-body px-0 py-0">
        <div class="row ml-0 mr-0">
            <div class="col-md-5 py-0 text-center cover-image login-art px-0" style="height: 400px">
                <div class="w-100 fallback">

                </div>
            </div>

            <div class="col-md-7 px-0 text-left py-3">
                <div class="w-100 mb-2">
                    <div class="d-flex bd-highlight">
                        <div style="max-width: 60px;" class="pl-3 py-2 pr-0 flex-fill bd-highlight">
                            <img alt="user-login-image" class="rounded-circle center" src="{{ asset('img/icons/lock.png') }}" width="auto" height="40px">
                        </div>
                        <div class="p-2 flex-fill bd-highlight">
                            <h5 class="text-left mb-2">Welcome Back</h5>
                            <h6 class="font-small text-secondary text-left mb-4">
                                Sign in using your Nyumbani Account
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="w-100 text-left pl-4 pr-4">
                    <form action="" method="post">
                        @csrf

                        <div class="row ml-0 mr-0 px-1">
                            <div class="col-md-12 mb-4">
                                <input class="form-control input100 @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" type="email" autocomplete="email" placeholder="E-mail Address" required>

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

                            <div class="offset-md-5 col-md-7 text-right">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link font-small forgot-link text-secondary" href="{{ route('password.request') }}">
                                        <span>{{ __('Forgot Password?') }}</b></span>
                                    </a>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <button type="submit" id="butn" class="btn px-3 w-100 btn-primary shadow">
                                    {{ __('Sign In') }}
                                </button>
                            </div>

                            <div class="col-md-12 pt-3 px-0" id="company_logo">
                                <div class="w-75 float-right">
                                    <img alt="company_logo" class="float-right" src="{{ asset('img/icons/5511031TOqFD1502285018.jpg') }}" width="auto" height="45px">
                                </div>
                            </div>
                        </div>
                    </form>
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


