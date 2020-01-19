@extends('layouts.app')

@section('content')
<div class="container-fluid" style="min-height: calc(100vh-56px)">
    <div class="w-100 pl-3 py-1">
        <div class="w-100 pb-3">
            <h5 class="text-secondary font-small">
                <span class="fal fa-cogs mr-2"></span> Settings
                <span class="font-small">
                    <span class="fal fa-chevron-right mx-2"></span> {{ $descr }}
                </span>
            </h5>
        </div>

        <div class="row ml-0 mr-0 form-group">
            <div class="col-md-3 text-dark px-0">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <ul class="list-style-none text-left px-0 w-100 setting-list">
                            <li class="border-bottom py-1 pr-2 pl-2" id="account_settings">
                                <a href="{{ route('settings.account') }}" class="text-dark">
                                    <div class="d-flex">
                                        <div class="flex-fill p-2 st-icon" style="width: 50px">
                                            <span class="fal fa-user-hard-hat font-large"></span>
                                        </div>

                                        <div class="flex-fill py-2 ">
                                            <span class="text-dark d-block st-icon">Account Details</span>
                                            <span class="text-muted d-block font-small">Details about your personal information</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="border-bottom py-1 pr-2 pl-2" id="ticket_settings">
                                <a href="{{ route('settings.tickets') }}" class="text-dark">
                                    <div class="d-flex">
                                        <div class="flex-fill p-2 st-icon" style="max-width: 50px">
                                            <span class="fal fa-ticket-alt ticket-rotate font-large"></span>
                                        </div>

                                        <div class="flex-fill py-2">
                                            <span class="text-dark d-block st-icon">Ticket Settings</span>
                                            <span class="text-muted d-block font-small">Setup your ticket work-flow</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="border-bottom py-1 pr-2 pl-2" id="user_settings">
                                <a href="{{ route('settings.users') }}" class="text-dark">
                                    <div class="d-flex">
                                        <div class="flex-fill p-2 st-icon" style="max-width: 50px">
                                            <span class="fal fa-user-tag font-large "></span>
                                        </div>

                                        <div class="flex-fill py-2">
                                            <span class="text-dark d-block st-icon">User Management</span>
                                            <span class="text-muted d-block font-small">Add and control users' access</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="border-bottom py-1 pr-2 pl-2" id="notification_settings">
                                <a href="" class="text-dark">
                                    <div class="d-flex">
                                        <div class="flex-fill p-2" style="max-width: 50px">
                                            <span class="fal fa-flag-alt font-large st-icon"></span>
                                        </div>

                                        <div class="flex-fill py-2">
                                            <span class="text-dark d-block st-icon">Notification Settings</span>
                                            <span class="text-muted d-block font-small">Customize your notifications</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="border-bottom py-1 pr-2 pl-2" id="mail_settings">
                                <a href="" class="text-dark">
                                    <div class="d-flex">
                                        <div class="flex-fill p-2" style="max-width: 50px">
                                            <span class="fal fa-mailbox font-large st-icon"></span>
                                        </div>

                                        <div class="flex-fill py-2">
                                            <span class="text-dark d-block st-icon">Mail Configuration</span>
                                            <span class="text-muted d-block font-small">Configure your company mailbox</span>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="border-bottom py-1 pr-2 pl-2" id="system_settings">
                                <a href="" class="text-dark">
                                    <div class="d-flex">
                                        <div class="flex-fill p-2" style="max-width: 50px">
                                            <span class="fal fa-computer-classic font-large st-icon"></span>
                                        </div>

                                        <div class="flex-fill py-2">
                                            <span class="text-dark d-block st-icon">System Configuration</span>
                                            <span class="text-muted d-block font-small">Configure the system</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                
                @yield('module')
                
            </div>
        </div>

    </div>
</div>
@endsection