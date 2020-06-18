@extends('settings.index')

@section('title')
    <title>Account Details & Settings</title>
@endsection

@push('pre_load')
<script>
    $("#settings_icon").addClass("active");
</script>
@endpush

@section('module')
<div class="card border-0">
    <div class="card-body pt-0">
        <div class="w-100 px-2 py-3">
            <h5 class="text-success mb-0">Account Details & Settings</h5>
            <span class="text-secondary font-small">Details on your personal information</span>
        </div>

        <div class="w-100">
            <div class="row mx-0 form-group">
                <div class="col-md-3 py-5 pl-0">
                    <div class="w-100 mb-2">
                        <img src="{{ asset('img/avatars/'.Auth::user()->avatar.'.png') }}" class="rounded-circle image-center" alt="" srcset="" width="100px">
                    </div>

                    <div class="w-100 text-center pt-2 pb-5">
                        <h5 class="text-dark mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->other_name }} {{ Auth::user()->last_name }}</h5>
                        <span class="font-small text-dark">{{ Auth::user()->email }}</span>
                    </div>

                    <div class="w-100 mt-2 form-group text-left pl-3">
                        <span class="d-block text-primary pb-3 cursor-pointer" id="change_avatar">
                            <span class="fal fa-edit mr-2"></span>Change Account Avatar
                        </span>

                        <span class="d-block text-primary cursor-pointer" id="edit_account_details">
                            <span class="fal fa-edit mr-2"></span>Change Account Details
                        </span>
                    </div>
                </div>

                <div class="col-md-9 border-left">
                    <div class="w-100">
                        <div class="row mx-0 form-group">
                            <div class="col-12 px-0 mb-2">
                                <span class="text-secondary">Personal Information</span>
                            </div>

                            <div class="col-4">
                                <span class="d-block text-dark">First Name:</span>
                                <span class="d-block text-secondary">{{ Auth::user()->first_name }}</span>
                            </div>

                            <div class="col-4">
                                <span class="d-block text-dark">Middle Name:</span>
                                <span class="d-block text-secondary">
                                    @if (empty(Auth::user()->other_name))
                                        -
                                    @else
                                        {{ Auth::user()->other_name }}
                                    @endif
                                </span>
                            </div>

                            <div class="col-4">
                                <span class="d-block text-dark">Last Name:</span>
                                <span class="d-block text-secondary">{{ Auth::user()->last_name }}</span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Phone Number:</span>
                                <span class="d-block text-secondary">
                                    {{ Auth::user()->msisdn }}
                                </span>
                            </div>

                            <div class="col-4">
                                <span class="d-block text-dark">Email Address:</span>
                                <span class="d-block text-secondary">
                                    {{ Auth::user()->email }}
                                </span>
                            </div>
                        </div>

                        <div class="row mx-0 pt-4">
                            <div class="col-12 px-0 mb-2">
                                <span class="text-secondary">Account Grants & Access Rights</span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Account Type:</span>
                            </div>

                            <div class="col-4">
                                <h5 class="mb-0">
                                    <span class="badge badge-purple px-3">{{ Auth::user()->user_access }}</span>
                                </h5>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Designation:</span>
                            </div>

                            <div class="col-4">
                                <span class="d-block text-secondary">Technician</span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Workflow Access:</span>
                            </div>

                            <div class="col-4">
                                <span class="d-block text-secondary">All</span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Raise Tickets:</span>
                            </div>

                            <div class="col-4">
                                <span class="text-success far fa-check-circle"></span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Mark Tickets as Resolved:</span>
                            </div>

                            <div class="col-4">
                                <span class="text-success far fa-check-circle"></span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Add New Users:</span>
                            </div>

                            <div class="col-4">
                                <span class="text-success far fa-check-circle"></span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Add New FTTH Regions:</span>
                            </div>

                            <div class="col-4">
                                <span class="text-success far fa-check-circle"></span>
                            </div>
                        </div>

                        <div class="row mx-0 form-group">
                            <div class="col-4">
                                <span class="d-block text-dark">Handle Escalated Tickets:</span>
                            </div>

                            <div class="col-4">
                                <span class="text-success far fa-check-circle"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('settings.modals.edit_account_details')

@endsection


@push('script')
<script>
$(document).ready(function() {
    var active = document.getElementById('account_settings')
    active.classList.add('active')

    st_icon = $(active).find('.st-icon')
    // st_icon.remove('text-dark')
    // st_icon.addClass('text-success')

    $('#edit_account_details').click(function() {
        $('#edit_account_modal').modal({backdrop: 'static'});
        $('#edit_account_modal').modal('show');
    })
})
</script>
@endpush