<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/chosen.min.js')}}"></script>
    <script src="{{asset('js/validate.min.js')}}"></script>

    <!-- Fontawesome Icons -->
    <script src="{{asset('fontawesome_pro/js/all.js')}}"></script>
    <link href="{{ asset('fontawesome_pro/css/all.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600&display=swap" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-base.css') }}" rel="stylesheet">

    <!-- Chosen -->
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosen-bootstrap.css')}}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- CKEditor -->
    {{-- <script src="{{ asset('js/ckeditor.min.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>

    <style>
        .dropdown-toggle:after{
            content: none
        }
        .chosen-container {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            font-size: 13px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 100% !important;
        }
    </style>
</head>
<body>
    <div id="app">
        
        @include('layouts.navigation')

        <div id="main-content">

            @include('layouts.top-navigation')
            
            <main class="py-3 mt-56 pl-3">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>
    </div>

    @include('tickets.modals.new_ticket')

    @stack('script')

<script>
$(document).ready(function() {
    successMessage = "{{ session('success') }}"
    errorMessage = "{{ session('error') }}"

    if (successMessage != '') {
        toastr.success("{{ session('success') }}", 'Success!', {timeOut: 5000})
    }

    if (errorMessage != '') {
        toastr.error("{{ session('error') }}", 'Error!', {timeOut: 5000})
    }

    $('.selection').chosen();
    $('.selection').trigger("chosen:updated");

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
})
</script>
</body>
</html>
