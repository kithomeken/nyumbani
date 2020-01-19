@extends('settings.index')

@section('title')
    <title>{{ config('app.name') }} Ticket Settings</title>
@endsection

@section('module')
<div class="card border-0">
    <div class="card-body px-0 py-0">
        <div class="w-100 px-0">
            <ul class="nav nav-tabs py-0">
                <li class="nav-item">
                    <a class="nav-link active" id="parameters-tab" data-toggle="tab" href="#parameters" role="tab" aria-controls="parameters" aria-selected="true">Ticket Parameters</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="workflow-tab" data-toggle="tab" href="#workflow" role="tab" aria-controls="workflow" aria-selected="true">Ticket Workflow</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="escalation-tab" data-toggle="tab" href="#escalation" role="tab" aria-controls="escalation" aria-selected="true">Escalation Matrix</a>
                </li>
            </ul>

            <div class="tab-content" id="ticketTabContent">
                <div class="tab-pane fade show active px-4 py-3" id="parameters" role="tabpanel" aria-labelledby="parameters">
                    <div class="form-group w-100">
                        <h5 class="text-secondary">Ticket Type</h5>

                        <div class="row ml-0 mr-0">
                            <div class="col-md-9 px-0">
                                <span class="font-small text-secondary">Configure ticket types (CRQ, INC etc)</span>
                            </div>

                            <div class="col-md-3">
                                <button id="add_ticket_type" class="btn w-100 btn-primary btn-sm">Add Ticket Type</button>
                            </div>
                        </div>

                        <div class="w-100 form-group bg-light pt-1 pb-3" id="type_form">
                            <form action="{{ route('settings.addType') }}" method="post" class="w-100">
                                @csrf
                                <input type="hidden" name="system_defined" value="Y">

                                <div class="row ml-0 mr-0 mt-2">
                                    <div class="col-md-9">
                                        <span class="text-secondary">Add a ticket type</span>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="button" class="close float-right" id="type_close">
                                            <span aria-hidden="true" class="font-small">Close</span>
                                        </button>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="t_description" class="col-form-label text-md-right">{{ __('Description') }}  <sup class="text-danger">*</sup></label>
                                        <input id="t_description" type="text" class="form-control @error('t_description') is-invalid @enderror form-control-sm" name="t_description" value="{{ old('t_description') }}" required autocomplete="off" autofocus>

                                        @error('t_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="short_code" class="col-form-label text-md-right">{{ __('Short Code') }}  <sup class="text-danger">*</sup></label>
                                        <input id="short_code" type="text" class="form-control @error('short_code') is-invalid @enderror form-control-sm" name="short_code" value="{{ old('short_code') }}" required autocomplete="off" autofocus>

                                        @error('short_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2 pt-3">
                                        <button id="submit_type" type="submit" class="btn mt-3 w-100 btn-primary btn-sm">Add Ticket Type</button>
                                    </div>
                                </div>
                            </form>  
                        </div>                      

                        <div class="w-100 mt-2">
                            <table class="table w-100 table-striped table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Description</th>
                                        <th style="width: 20%">Short Code</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($ticketTypes as $type)
                                        <tr>
                                            <td>{{ $type->description }}</td>
                                            <td>{{ $type->short_code }}</td>

                                            @if ($type->system_defined == 'Y')
                                                <td>System Defined</td>
                                            @else
                                                <td>
                                                    <span id="edit_type" class="fal fa-edit edit-type text-primary"></span>

                                                    <span id="delete_type" class="fal fa-trash-alt delete-type ml-3 text-danger"></span>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr class="mt-5">

                    <div class="w-100 form-group">
                        <h5 class="text-secondary">FTTH Regions</h5>

                        <div class="row ml-0 mr-0 form-group">
                            <div class="col-md-9 px-0">
                                <span class="font-small text-secondary">Your allocated FTTH Regions (sites). Helps give a better view of your current workload</span>
                            </div>

                            <div class="col-md-3">
                                <button id="add_region" class="btn w-100 btn-primary btn-sm">Add New Region</button>
                            </div>
                        </div>

                        <div class="w-100 form-group bg-light pt-1 pb-3" id="region_form">
                            <form action="{{ route('settings.addRegion') }}" method="post" class="w-100">
                                @csrf

                                <div class="row ml-0 mr-0 mt-2">
                                    <div class="col-md-9">
                                        <span class="text-secondary">Add New FTTH Region</span>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="button" class="close float-right" id="region_close">
                                            <span aria-hidden="true" class="font-small">Close</span>
                                        </button>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="region_name" class="col-form-label text-md-right">{{ __('Region Name') }}  <sup class="text-danger">*</sup></label>
                                        <input id="region_name" type="text" class="form-control @error('region_name') is-invalid @enderror form-control-sm" name="region_name" value="{{ old('region_name') }}" required autocomplete="off" autofocus>

                                        @error('region_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="region_short" class="col-form-label text-md-right">{{ __('Region Short Name') }}  <sup class="text-danger">*</sup></label>
                                        <input id="region_short" type="text" class="form-control @error('region_short') is-invalid @enderror form-control-sm" name="region_short" value="{{ old('region_short') }}" required autocomplete="off" autofocus>

                                        @error('region_short')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2 pt-3">
                                        <button id="submit_region" type="submit" class="btn mt-3 w-100 btn-primary btn-sm">Add Region</button>
                                    </div>
                                </div>
                            </form>  
                        </div>

                        <div class="w-100 mt-2">
                            <table class="table w-100 table-striped table-sm table-borderless" id="region_datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 40%">Region Name</th>
                                        <th style="width: 20%">Short Code</th>
                                        <th style="width: 20%">Completed</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>
                            </table>
                        </div>



                    </div>

                    <hr class="mt-5">

                    <div class="w-100 form-group">
                        <h5 class="text-secondary">Ticket Progress Status</h5>

                        <div class="row ml-0 mr-0 form-group">
                            <div class="col-md-9 px-0">
                                <span class="font-small text-secondary">Define progress status for your tickets</span>
                            </div>

                            <div class="col-md-3">
                                <button id="add_status" class="btn w-100 btn-primary btn-sm">Add New Status</button>
                            </div>
                        </div>

                        <div class="w-100 form-group bg-light pt-1 pb-3" id="status_form">
                            <form action="{{ route('settings.addStatus') }}" method="post" class="w-100">
                                @csrf

                                <div class="row ml-0 mr-0 mt-2">
                                    <div class="col-md-9">
                                        <span class="text-secondary">Add New Ticket Status</span>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="button" class="close float-right" id="status_close">
                                            <span aria-hidden="true" class="font-small">Close</span>
                                        </button>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status_description" class="col-form-label text-md-right">{{ __('Status Description') }}  <sup class="text-danger">*</sup></label>
                                        <input id="status_description" type="text" class="form-control @error('status_description') is-invalid @enderror form-control-sm" name="status_description" value="{{ old('status_description') }}" required autocomplete="off" autofocus>

                                        @error('status_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="status_code" class="col-form-label text-md-right">{{ __('Status Code') }}  <sup class="text-danger">*</sup></label>
                                        <input id="status_code" type="text" class="form-control @error('status_code') is-invalid @enderror form-control-sm" name="status_code" value="{{ old('status_code') }}" required autocomplete="off" autofocus>

                                        @error('status_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-2 pt-3">
                                        <button id="submit_status" type="submit" class="btn mt-3 w-100 btn-primary btn-sm">Add Status</button>
                                    </div>
                                </div>
                            </form>  
                        </div>

                        <div class="w-100 mt-2">
                            <table class="table w-100 table-striped table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Status Description</th>
                                        <th style="width: 20%">Status Code</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($ticketStatus as $status)
                                        <tr>
                                            <td>{{ $status->description }}</td>
                                            <td>{{ $status->status_code }}</td>

                                            @if ($status->system_defined == 'Y')
                                                <td>System Defined</td>
                                            @else
                                                <td>
                                                    <span id="edit_status" class="fal fa-edit edit-status text-primary"></span>

                                                    <span id="delete_status" class="fal fa-trash-alt delete-statu ml-3 text-danger"></span>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>




                    </div>



                </div>

                <div class="tab-pane fade px-3 py-3" id="workflow" role="tabpanel" aria-labelledby="workflow">
                    <h5 class="text-secondary">Workflow Configurations</h5>
                    <span class="text-secondary font-small">Configurations on how to handle tickets and their priority</span>

                    <div class="w-100">

                    </div>
                </div>

                <div class="tab-pane fade px-4 py-3" id="escalation" role="tabpanel" aria-labelledby="escalation">
                    <h5 class="text-secondary">Escalation Matrix</h5>
                    <span class="text-secondary font-small">Configuration on how to escalate tickets</span>

                    <div class="w-100">
                        <span class="mb-3 mt-4 text-secondary d-block">Tickets to Escalate</span>

                        <div class="row ml-0 mr-0">
                            @foreach ($ticketTypes as $type)
                                <div class="col-md-3 mb-3">
                                    <div class="custom-control custom-checkbox mr-sm-2 form-group">
                                        <input type="checkbox" class="custom-control-input" id="ticket_type_{{ $type->id }}">
                                        <label class="custom-control-label" for="ticket_type_{{ $type->id }}">{{ $type->description }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr>

                    <div class="w-100 mt-3 form-group">
                        <div class="row ml-0 mr-0">
                            <div class="col-md-9">
                                <span class="text-secondary">Escalation Team</span>
                            </div>

                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary btn-sm w-100" data-toggle="modal" data-target="#escalate_modal">Add to Escalation Team</button>
                            </div>
                        </div>
                    </div>

                    <div class="w-100">
                        <table class="table w-100 table-striped table-sm table-borderless">
                            <thead>
                                <tr>
                                    <td style="width: 30%">Name</td>
                                    <td style="width: 30%">Email</td>
                                    <td style="width: 20%">Designation</td>
                                    <td style="width: 20%">Action</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('settings.modals.escalation')

@endsection

@push('script')
<script>
/*
=======Pre-Document Ready======
*/
$('#type_form').hide()
$('#region_form').hide()
$('#status_form').hide()

$('#region_datatable').DataTable({
    processing: true,
    serverSide: true,
    type: 'GET',
    ajax: "{{ route('settings.getRegion') }}",
    columns: [
        { data: 'name', name: 'name' },
        { data: 'region_short', name: 'region_short' },
        { data: 'completed', name: 'completed' },
        { data: 'action', name: 'action' },
    ]
});

$(document).ready(function() {
    var active = document.getElementById('ticket_settings')
    active.classList.add('active')

    st_icon = $(active).find('.st-icon')
    st_icon.remove('text-dark')
    st_icon.addClass('text-success')

    $('#add_ticket_type').click(function() {
        $('#type_form').show()
        $(this).hide()
    })

    $('#type_close').click(function() {
        $('#type_form').hide()
        $('#add_ticket_type').show()
    })

    $('#add_region').click(function() {
        $('#region_form').show()
        $(this).hide()
    })

    $('#region_close').click(function() {
        $('#region_form').hide()
        $('#add_region').show()
    })

    $('#add_status').click(function() {
        $('#status_form').show()
        $(this).hide()
    })

    $('#status_close').click(function() {
        $('#status_form').hide()
        $('#add_status').show()
    })
})
</script>
@endpush