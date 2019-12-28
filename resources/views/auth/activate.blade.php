<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

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
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"> --}}
    <script src="{{asset('fontawesome_pro/js/all.js')}}"></script>
    <link href="{{ asset('fontawesome_pro/css/all.css') }}" rel="stylesheet">

    <!-- Complementary Styles -->
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosen-bootstrap.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="fill">

        <main class="row ml-0 mr-0 justify-content-center">
            @if ($status == 200)
                <div class="col-md-5 py-5 cont" style="height: 100vh" id="valid_signature">
                    <div class="w-100 px-4">
                        <h3 class="mb-0 text-success">Hello {{ $user->first_name }},</h3>
                        <h4>Welcome to {{ env('APP_COMPANY') }}'s FTTH flock</h4>

                        <div class="py-1">
                            <p>Your account setup is almost complete. All that's left is adding your preferred password and you're good to go.</p>
                        </div>

                        <div class="py-0">
                            <form action="{{ route('register') }}" method="post">
                                @csrf

                                <div class="row ml-0 mr-0 justify-content-center">
                                    <div class="col-md-8 mb-1">
                                        <span>E-mail Address: </span>
                                        <span class="ml-4"><b>{{ $user->email }}</b></span>
                                        <input type="hidden" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="row ml-0 mr-0 mb-3 justify-content-center">
                                    <label for="password" class="col-md-8 col-form-label">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row ml-0 mr-0 justify-content-center mb-4">
                                    <label for="password-confirm" class="col-md-8 col-form-label">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row ml-0 mr-0 justify-content-center pt-1">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-success w-100">Complete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-5 py-5 cont" style="height: 100vh" id="invalid_signature">
                    <div class="w-100">
                        <div class="py-2">
                            <img src="{{ asset('img/error/401.jpg') }}" class="image-center" alt="401" srcset="" height="180px" width="auto">
                        </div>

                        <h3 class="mb-0 text-danger text-center">Oops..! <br> Error 401</h3>
                        <h4 class="text-center">Something went wrong here</h4>

                        <div class="py-1 px-3">
                            <p>The activation link you followed is probably broken or the page has been temporarily moved. If this error persists, kindly contact your administrator...</p>
                        </div>

                        <div class="w-50 m-auto pt-2">
                            <a href="{{ route('login') }}" class="btn btn-danger w-100">Back to Sign In</a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-7 crystal_clear">

            </div>
        </main>
    
    </div>

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
</script>
</body>
</html>
