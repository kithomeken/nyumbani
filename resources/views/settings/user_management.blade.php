@extends('settings.index')

@section('title')
    <title>{{ config('app.name') }} User Management</title>
@endsection

@section('module')
<div class="card border-0">
    <div class="card-body px-0 py-0">
        <div class="w-100 px-0">
            <ul class="nav nav-tabs py-0">
                <li class="nav-item">
                    <a class="nav-link active" id="all_users_tab" data-toggle="tab" href="#all_users" role="tab" aria-controls="all_users" aria-selected="true">All Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="create_users_tab" data-toggle="tab" href="#create_users" role="tab" aria-controls="create_users" aria-selected="true">Create User</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="user_roles_tab" data-toggle="tab" href="#user_roles" role="tab" aria-controls="user_roles" aria-selected="true">Agent Designations</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                {{-- ALL USERS --}}
                <div class="tab-pane fade show active" id="all_users" role="tabpanel" aria-labelledby="all_users_tab">
                    <div class="w-100 px-4 py-3">
                        <h5 class="text-success fonnt-small">All Users</h5>
                        <span class="text-secondary">Manage your users' personal information and access rights</span>
                    </div>

                    <div class="w-100 px-4">
                        <table id="users_datatable" class="table table-hover table-border-0 w-100 font-small overdue-table">
                            <thead>
                                <tr>
                                    <th>Names</th>
                                    <th>E-mail</th>
                                    <th>Designation</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                {{-- CREATE USERS --}}
                <div class="tab-pane fade" id="create_users" role="tabpanel" aria-labelledby="create_users_tab">
                    <div class="w-100 px-4 py-3">
                        <div class="row ml-0 mr-0 mb-1">
                            <div class="col-md-4 px-0">
                                <h5 class="text-success fonnt-small">Create New User</h5>
                                <span class="text-secondary">Personal and Contact Information</span>
                            </div>

                            @if($errors->any())
                                <script>
                                    toastr.error("Could not create user. Kindly correct the errors displayed", 'Error!', {timeOut: 5000})
                                </script>
                            @endif
                        </div>

                        <div class="w-100">
                            <form method="POST" action="{{ route('account.create') }}">
                                @csrf
                                <input type="hidden" name="account_verification" value="N">

                                <div class="row ml-0 mr-0 px-0 form-group">
                                    <div class="col-md-4">
                                        <label for="first_name" class="col-form-label text-md-right">{{ __('First Name') }}  <sup class="text-danger">*</sup></label>
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="off" autofocus>
    
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="col-md-4">
                                        <label for="other_name" class="col-form-label text-md-right">{{ __('Middle Name') }}</label>
                                        <input id="other_name" type="text" class="form-control @error('other_name') is-invalid @enderror" name="other_name" value="{{ old('other_name') }}" autocomplete="off">
    
                                        @error('other_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="col-md-4">
                                        <label for="last_name" class="col-form-label text-md-right">{{ __('Last Name') }}  <sup class="text-danger">*</sup></label>
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="off" autofocus>
    
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row ml-0 mr-0 form-group">
                                    <div class="col-md-4">
                                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }} <sup class="text-danger">*</sup></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
    
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
    
                                    <div class="col-md-4">
                                        <label for="msisdn" class="col-form-label text-md-right">{{ __('Phone Number') }}  <sup class="text-danger">*</sup> <sub>(MSISDN)</sub></label>
                                        <input id="msisdn" type="text" class="form-control @error('msisdn') is-invalid @enderror" name="msisdn" value="{{ old('msisdn') }}" required autocomplete="off">
    
                                        @error('msisdn')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>The phone number is already in use</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="w-100 px-0">
                                    <div class="row ml-0 mr-0">
                                        <div class="col-md-12 px-0 mb-1">
                                            <hr>
                                            <span class="text-secondary">Workflow Configuration</span>
                                        </div>
                                    </div>
        
                                    <div class="row ml-0 mr-0 px-0 form-group">
                                        <div class="col-md-4">
                                            <label for="designation" class="col-form-label text-md-left">Agent Designation <sup class="text-danger">*</sup></label>
                                            <select class="form-control @error('designation') is-invalid @enderror form-control-sm selection" value="{{ old('designation') }}" id="designation" name="designation" required>
                                                <option selected value="" default="">Choose Category</option>
                                                <option value="DSP">Dispatch Agent</option>
                                                <option value="TCH">Technician</option>
                                                <option value="PRJ">Project Manager</option>
                                                <option value="OTH">Others</option>
                                            </select>
        
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="col-md-4">
                                            <label for="workflow_access" class="col-form-label text-md-left">Workflow Access <sup class="text-danger">*</sup></label>
                                            <select class="form-control @error('workflow_access') is-invalid @enderror form-control-sm selection" value="{{ old('workflow_access') }}" id="workflow_access" name="workflow_access" required>
                                                <option selected value="" default="">Choose Workflow Access</option>
                                                @foreach ($ticketTypes as $type)
                                                    <option value="{{ $type->ticket_code }}">{{ $type->description }}</option>
                                                @endforeach
                                                <option value="ALL">All of The Above</option>
                                            </select>
        
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
        
                                        <div class="col-md-4">
                                            
                                        </div>
                                    </div>

                                    <div class="row ml-0 mr-0 px-0 form-group">
                                        <div class="col-md-12 px-0 mb-2">
                                            <hr>
                                            <span class="text-secondary">Options</span>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="w-100">
                                                <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                                                    <input type="checkbox" name="admin_access" class="custom-control-input" id="admin_access">
                                                    <label class="custom-control-label" for="admin_access">Grant Full Admin Rights</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 px-0">
                                            <div class="w-100">
                                                <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                                                    <input type="checkbox" name="create_user" class="custom-control-input" id="create_user">
                                                    <label class="custom-control-label" for="create_user">Rights to Create Users</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 px-0">
                                            <div class="w-100 pl-2">
                                                <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                                                    <input type="checkbox" name="add_region" class="custom-control-input" id="add_region">
                                                    <label class="custom-control-label" for="add_region">Rights to Add Regions</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3 px-0">
                                            <div class="w-100 pl-2">
                                                <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                                                    <input type="checkbox" name="esclate_to" class="custom-control-input" id="esclate_to">
                                                    <label class="custom-control-label" for="esclate_to">Add to Escalation Team</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 py-3">
                                    <div class="row ml-0 mr-0">
                                        <div class="col-md-4 px-0">
                                            <button type="submit" class="btn w-100 py-1 btn-success">Create User</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100"></div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- AGENT DESIGNATIONS --}}
                <div class="tab-pane fade" id="user_roles" role="tabpanel" aria-labelledby="user_roles_tab">
                    <div class="w-100 px-4 py-3">
                        <h5 class="text-success fonnt-small">Agent Designations</h5>

                        <div class="row ml-0 mr-0">
                            <div class="col-md-8 px-0">
                                <span class="text-secondary">Define the types of agents(users) in your organization's workflow</span>
                            </div>

                            <div class="col-md-4">
                                <button id="add_ticket_type" class="btn px-3 float-right btn-primary btn-sm" data-toggle="modal" data-target="#ticket_type_modal">Add a Designation</button>
                            </div>
                        </div>
                    </div>

                    <div class="w-100">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
$('#users_datatable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    type: 'GET',
    ajax: "{{ route('settings.getAllUsers') }}",
    columns: [
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'designation', name: 'designation' },
        { data: 'is_active', name: 'is_active' },
        { data: 'action', name: 'action' },
    ]
});

$(document).ready(function() {
    var active = document.getElementById('user_settings')
    active.classList.add('active')

    st_icon = $(active).find('.st-icon')
    st_icon.remove('text-dark')
    st_icon.addClass('text-success')

    $('#admin_access').on('click', function() {
        if ($(this).prop("checked") == true) {
            // Disable Create Users and Regions Radio Buttons
            $('#create_user').prop('checked', true)
            $('#create_user').prop('disabled', true)

            $('#add_region').prop('checked', true)
            $('#add_region').prop('disabled', true)
        } else {
            $('#create_user').prop('checked', false)
            $('#create_user').prop('disabled', false)

            $('#add_region').prop('checked', false)
            $('#add_region').prop('disabled', false)
        }
    })
})
</script>
@endpush