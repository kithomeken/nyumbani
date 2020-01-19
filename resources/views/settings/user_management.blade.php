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
                    <a class="nav-link " id="all_users_tab" data-toggle="tab" href="#all_users" role="tab" aria-controls="all_users" aria-selected="true">All Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="create_users_tab" data-toggle="tab" href="#create_users" role="tab" aria-controls="create_users" aria-selected="true">Create User</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all_users" role="tabpanel" aria-labelledby="all_users_tab">
                     <table id="all_users_table" class="table w-100 table-hover table-striped">

                     </table>
                </div>

                <form method="POST" action="{{ route('account.create') }}">
                    @csrf
                    <input type="hidden" name="account_verification" value="N">

                    <div class="tab-pane fade" id="create_users" role="tabpanel" aria-labelledby="create_users_tab">
                        <div class="w-100 px-3">
                            <div class="row ml-0 mr-0 mb-1">
                                <div class="col-md-4">
                                    <h5 class="text-secondary fonnt-small">Create New User</h5>
                                    <span class="text-secondary">Personal and Contact Information</span>
                                </div>

                                <div class="col-md-8">
                                    <div class="alert alert-success mb-0">
                                        Account has successfully been created. Activation link sent to user's e-mail.
                                    </div>
                                </div>
                            </div>

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
                                    <input id="other_name" type="text" class="form-control @error('other_name') is-invalid @enderror" name="other_name" value="{{ old('other_name') }}" required autocomplete="off">

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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="msisdn" class="col-form-label text-md-right">{{ __('Phone Number') }}  <sup class="text-danger">*</sup> <sub>(MSISDN)</sub></label>
                                    <input id="msisdn" type="text" class="form-control @error('msisdn') is-invalid @enderror" name="msisdn" value="{{ old('msisdn') }}" required autocomplete="msisdn">

                                    @error('msisdn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="w-100 px-3">
                            <div class="row ml-0 mr-0">
                                <div class="col-md-12 mb-1">
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
                                        <option value="CRQ">Change Request</option>
                                        <option value="INC">Incidence</option>
                                        <option value="OTH">Other(s)</option>
                                        <option value="ALL">All of The Above</option>
                                    </select>

                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <span class="text-secondary">Options</span>

                                    <div class="custom-control custom-checkbox mr-sm-2 form-group mt-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="admin_access">
                                        <label class="custom-control-label" for="admin_access">Issue Admin Access</label>
                                    </div>

                                    <div class="custom-control custom-checkbox mr-sm-2 form-group">
                                        <input type="checkbox" class="custom-control-input" id="create_user">
                                        <label class="custom-control-label" for="create_user">Can Create User</label>
                                    </div>

                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="add_region">
                                        <label class="custom-control-label" for="add_region">Can Add Region</label>
                                    </div>

                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="esclate_to">
                                        <label class="custom-control-label" for="esclate_to">Add to Escalation Matrix</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
$(document).ready(function() {
    var active = document.getElementById('user_settings')
    active.classList.add('active')

    st_icon = $(active).find('.st-icon')
    st_icon.remove('text-dark')
    st_icon.addClass('text-success')
})
</script>
@endpush