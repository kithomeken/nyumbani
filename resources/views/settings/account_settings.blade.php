@extends('settings.index')

@section('title')
    <title>{{ config('app.name') }} Account Settings</title>
@endsection

@section('module')
<div class="card border-0">
    <div class="card-body">
        <div class="w-100 px-2">
            <h5 class="text-secondary">Account Setting</h5>
        </div>

        <div class="w-100">
            <div class="row ml-0 mr-0">
                <div class="col-md-5 py-3">
                    <div class="w-100 mb-2">
                        <img src="{{ asset('img/avatars/'.Auth::user()->avatar.'.png') }}" class="rounded-circle image-center" alt="" srcset="" width="100px">
                    </div>

                    <div class="w-100 mt-3 text-center">
                        <p class="font-small text-primary" id="change_avatar">
                            <span class="fal fa-edit"></span> Change Avatar
                        </p>
                    </div>

                    <div class="w-100 mt-3 text-center">
                        <h5 class="text-dark">{{ Auth::user()->first_name }} {{ Auth::user()->other_name }} {{ Auth::user()->last_name }}</h5>
                        <span class="font-small text-muted">{{ Auth::user()->email }}</span>
                    </div>

                    <div class="w-100 mt-3 text-left">
                        <hr class="mt-0">

                        <p class="font-small text-primary" id="change_password">
                            <span class="fal fa-edit"></span> Change Password
                        </p>
                    </div>
                </div>

                <div class="col-md-7 border-left">
                    <div class="w-100">
                        <div class="w-100">
                            <div class="row ml-0 mr-0">
                                <div class="col-12 mb-2">
                                    <span class="text-secondary">Official Information</span>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0">
                                <div class="col-md-4">
                                    <p class="text-dark font-bold">First Name: </p>
                                </div>

                                <div class="col-md-8">
                                    <p class="text-secondary">{{ Auth::user()->first_name }}</p>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0">
                                <div class="col-md-4">
                                    <p class="text-dark font-bold">Middle Name: </p>
                                </div>

                                <div class="col-md-8">
                                    <p class="text-secondary">{{ Auth::user()->other_name }}</p>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0">
                                <div class="col-md-4">
                                    <p class="text-dark font-bold">Last Name: </p>
                                </div>

                                <div class="col-md-8">
                                    <p class="text-secondary">{{ Auth::user()->last_name }}</p>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-0">

                        <div class="w-100">
                            <div class="row ml-0 mr-0">
                                <div class="col-12 mb-2">
                                    <span class="text-secondary">Contact Information</span>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0">
                                <div class="col-md-4">
                                    <p class="text-dark font-bold">Phone Number: </p>
                                </div>

                                <div class="col-md-8">
                                    <p class="text-secondary">
                                        <span class="float-left">
                                            {{ Auth::user()->msisdn }}
                                        </span>

                                        <span class="float-right text-primary" id="change_msisdn" data-toggle="tooltip" data-placement="left" title="Change Phone Number">
                                            <span class="fal fa-edit"></span>
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0">
                                <div class="col-md-4">
                                    <p class="text-dark font-bold">E-mail Address: </p>
                                </div>

                                <div class="col-md-8">
                                    <p class="text-secondary">
                                        <span class="float-left">
                                            {{ Auth::user()->email }}
                                        </span>

                                        <span class="float-right text-primary" id="change_email" data-toggle="tooltip" data-placement="left" title="Change E-mail Address">
                                            <span class="fal fa-edit"></span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-0">

                        <div class="w-100">
                            <div class="row ml-0 mr-0">
                                <div class="col-12 mb-2">
                                    <span class="text-secondary">Application Information</span>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0">
                                <div class="col-md-4">
                                    <p class="text-dark font-bold">Designation: </p>
                                </div>

                                <div class="col-md-8">
                                    <p class="text-secondary">
                                        <span class="float-left">
                                            
                                        </span>

                                        <span class="float-right text-primary" id="change_msisdn" data-toggle="tooltip" data-placement="left" title="Change Phone Number">
                                            <span class="fal fa-edit"></span>
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0">
                                <div class="col-md-4">
                                    <p class="text-dark font-bold">Admin Functions: </p>
                                </div>

                                <div class="col-md-8">
                                    <p class="text-secondary">
                                        <span class="float-left">
                                            
                                        </span>

                                        <span class="float-right text-primary" id="change_msisdn" data-toggle="tooltip" data-placement="left" title="Change Phone Number">
                                            <span class="fal fa-edit"></span>
                                        </span>
                                    </p>
                                </div>
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
<script>
$(document).ready(function() {
    var active = document.getElementById('account_settings')
    active.classList.add('active')

    st_icon = $(active).find('.st-icon')
    st_icon.remove('text-dark')
    st_icon.addClass('text-success')
})
</script>
@endpush