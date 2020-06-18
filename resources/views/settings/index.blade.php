@extends('layouts.settings_base')

@section('content')
<div class="d-flex">
    
    @include('settings.settings_nav')

    <div class="flex-fill settings-content">

        @yield('module')

        @include('layouts.footer')
        
    </div>

</div>
@endsection