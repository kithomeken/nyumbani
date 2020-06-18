<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/chosen.min.js')}}"></script>
    <script src="{{asset('js/validate.min.js')}}"></script>

    <!-- Fontawesome Icons -->
    <script src="{{asset('fontawesome_pro/js/all.js')}}"></script>
    <link href="{{ asset('fontawesome_pro/css/all.css') }}" rel="stylesheet">

    <!-- Nago Theme Styles -->
    <link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/nago_main.css') }}" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-base.css') }}" rel="stylesheet">

    <!-- Chosen -->
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosen-bootstrap.css')}}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset('dataTable/datatables.min.css') }}">
    <script src="{{ asset('dataTable/datatables.min.js') }}"></script>

    <!-- CKEditor -->
    {{-- <script src="{{ asset('js/ckeditor.min.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>

    @stack('selective_scripts')

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

        .swal-title:not(:last-child) {
            margin-bottom: 5px;
        }
        .swal-title:first-child {
            margin-top: 13px;
        }
        .swal-title {
            color: rgba(0,0,0,.65);
            font-weight: 600;
            text-transform: none;
            position: relative;
            display: block;
            padding: 13px 16px;
            font-size: 20px;
            line-height: normal;
            text-align: center;
            margin-bottom: 0;
        }
        .swal-text {
            font-size: 16px;
            position: relative;
            float: none;
            line-height: normal;
            vertical-align: top;
            text-align: center;
            display: inline-block;
            margin: 0;
            padding: 0 10px;
            font-weight: 400;
            color: rgba(0,0,0,.64);
            max-width: calc(100% - 20px);
            overflow-wrap: break-word;
            box-sizing: border-box;
        }
        .swal-button {
            padding: 7px 20px;
        }
        .swal-modal {
            width: 450px;
            opacity: 0;
            pointer-events: none;
            background-color: #fff;
            text-align: center;
            border-radius: 5px;
            position: static;
            margin: 20px auto;
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            z-index: 10001;
            transition: opacity .2s,-webkit-transform .3s;
            transition: transform .3s,opacity .2s;
            transition: transform .3s,opacity .2s,-webkit-transform .3s;
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

    {{-- @include('tickets.modals.new_ticket') --}}

    @stack('pre_load')

<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    successMessage = "{{ session('success') }}"
    errorMessage = "{{ session('error') }}"

    toastr.options = {
        timeOut: 8000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };

    if (successMessage != '') {
        toastr.success("{{ session('success') }}", {timeOut: 5000})
    }

    if (errorMessage != '') {
        toastr.error("{{ session('error') }}", {timeOut: 5000})
    }

    $('.selection').chosen();
    $('.selection').trigger("chosen:updated");

    // ToolTip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Popover
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
})
</script>

{{-- LOAD STACK SCRIPTS --}}
@stack('script')
</body>
</html>
