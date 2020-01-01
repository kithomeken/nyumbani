<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Account Password Reset @error('email') Failed @enderror</title>

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/chosen.jquery.js')}}"></script>
    <script src="{{asset('js/validate.jquery.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/font.nunito.css')}}">

    <!-- Fontawesome Icons -->
    <script src="{{asset('fontawesome_pro/js/all.js')}}"></script>
    <link href="{{ asset('fontawesome_pro/css/all.css') }}" rel="stylesheet">

    <!-- Complementary Styles -->
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosen-bootstrap.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

    <script>
        window.addEventListener( "pageshow", function ( event ) {
            var historyTraversal = event.persisted || 
                ( typeof window.performance != "undefined" && 
                    window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        });

        $(document).ready(function() {
            $('#reset_password_error').hide()
        })
    </script>
</head>
<body>
    @error('email')
        <script>
            $(document).ready(function() {
                $('#reset_password').hide()
                $('#email_data').hide()
                $('#reset_password_error').show()
            })
        </script>
    @enderror

    <div id="app" class="fill">
        <div class="w-100">
            <main class="row ml-0 mr-0 justify-content-center password-reset-art cover-image">
                <div class="col-lg-5 py-5 cont" style="background: transparent" id="valid_signature">
                    <div class="card border-0 w-100">
                        <div class="card-body">
                            <div class="px-3">
                                <h3 class="">Account Password Reset @error('email') Failed @enderror</h3>
                            </div>

                            <div class="row ml-0 mr-0 justify-content-center" id="email_data">
                                <div class="col-md-9 m-1">
                                    <span class="text-"><b>{{ $email ?? old('email') }}</b></span>
                                </div>
                            </div>

                            <div class="py-0" id="reset_password">
                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf

                                    <input type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required>

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="row ml-0 mr-0 mb-3 justify-content-center">
                                        <label for="password" class="col-md-9 col-form-label">{{ __('Password') }}</label>

                                        <div class="col-md-9">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row ml-0 mr-0 justify-content-center mb-4">
                                        <label for="password-confirm" class="col-md-9 col-form-label">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-9">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row ml-0 mr-0 justify-content-center pt-1">
                                        <div class="col-md-5">
                                            <button type="submit" class="btn btn-success w-100">{{ __('Reset Password') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="reset_password_error">
                                <div class="w-100">
                                    <div class="py-2">
                                        <img src="{{ asset('img/error/da75ebd829e15e01efc01ca936aac39b.png') }}" class="image-center" alt="401" srcset="" height="140px" width="auto">
                                    </div>
        
                                    <h3 class="mb-0 text-danger text-center">Oops..! Error 401</h3>
                                    <h4 class="text-center">Unauthorised Request</h4>
        
                                    <div class="py-1 px-3">
                                        <p class="text-center">Your password reset token is invalid or expired. Kindly request for a new password reset link.</p>
                                    </div>

                                    <div class="py-1 px-3">
                                        <div class="row ml-0 mr-0 justify-content-center">
                                            <div class="col-md-6">
                                                <a href="{{ route('password.request') }}" class="btn btn-danger w-100" role="button">
                                                    {{ __('Forgot Password') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
