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
                    {{-- TICKET TYPE --}}
                    <div class="form-group w-100">
                        <h5 class="text-secondary">Ticket Type</h5>

                        <div class="row ml-0 mr-0">
                            <div class="col-md-9 px-0">
                                <span class="font-small text-secondary">Configure ticket types (CRQ, INC etc)</span>
                            </div>

                            <div class="col-md-3">
                                <button id="add_ticket_type" class="btn w-100 btn-primary btn-sm" data-toggle="modal" data-target="#ticket_type_modal">Add Ticket Type</button>
                            </div>
                        </div>                     

                        <div class="w-100 mt-2">
                            <table id="type_table" class="table w-100 table-striped table-sm table-borderless">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Description</th>
                                        <th style="width: 20%">Ticket Code</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($ticketTypes as $type)
                                        <tr>
                                            <td>{{ $type->description }}</td>
                                            <td>{{ $type->ticket_code }}</td>

                                            @if ($type->system_defined == 'Y')
                                                <td>System Defined</td>
                                            @else
                                                <td>
                                                    <button class="btn btn-sm py-0 edit-type">
                                                        <span id="edit_type" class="fal fa-edit text-primary"></span>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr class="mt-5">

                    {{-- TICKET STATUS --}}
                    <div class="w-100 form-group">
                        <h5 class="text-secondary">Ticket Progress Status</h5>

                        <div class="row ml-0 mr-0 form-group">
                            <div class="col-md-9 px-0">
                                <span class="font-small text-secondary">Define progress status for your tickets</span>
                            </div>

                            <div class="col-md-3">
                                <button id="add_status" class="btn w-100 btn-primary btn-sm" data-toggle="modal" data-target="#status_modal">Add New Status</button>
                            </div>
                        </div>

                        <div class="w-100 mt-2">
                            <table id="status_table" class="table w-100 table-striped table-sm table-borderless">
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
                                                    <button class="btn btn-sm py-0 edit-status">
                                                        <span id="edit_status" class="fal fa-edit text-primary"></span>
                                                    </button>
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
                                <button id="add_region" class="btn w-100 btn-primary btn-sm" data-toggle="modal" data-target="#region_modal">Add New Region</button>
                            </div>
                        </div>

                        <div class="w-100 mt-2">
                            <table class="table w-100 table-striped table-sm table-borderless" id="region_datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 40%">Region Name</th>
                                        <th style="width: 20%">Region Code</th>
                                        <th style="width: 20%">Completed</th>
                                        <th style="width: 20%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
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
                                        <input type="checkbox" class="custom-control-input esclate_ticket" data-ticket="{{ $type->ticket_code }}" 
                                            @foreach ($escalationTickets as $escaTick) 
                                                @if ($type->ticket_code == $escaTick->ticket_code) 
                                                    checked 
                                                @endif
                                            @endforeach 
                                        id="ticket_type_{{ $type->id }}">
                                        <label class="custom-control-label ticket-desc" for="ticket_type_{{ $type->id }}">{{ $type->description }}</label>
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
                        <table id="escalation_datatable" class="table w-100 table-striped table-sm table-borderless">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Designation</td>
                                    <td>Action</td>
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
@include('settings.modals.add_regions')
@include('settings.modals.add_ticket_type')
@include('settings.modals.add_ticket_status')
@include('settings.modals.edit_ticket_type')
@include('settings.modals.edit_ticket_status')
@include('settings.modals.edit_region')
@include('settings.modals.edit_escalation')

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
    autoWidth: false,
    type: 'GET',
    ajax: "{{ route('settings.getRegion') }}",
    columns: [
        { data: 'region_name', name: 'region_name' },
        { data: 'region_code', name: 'region_code' },
        { data: 'completed', name: 'completed' },
        { data: 'action', name: 'action' },
    ]
});

$('#escalation_datatable').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    type: 'GET',
    ajax: "{{ route('settings.getEscalationTeam') }}",
    columns: [
        { data: 'name', name: 'name' },
        { data: 'email', name: 'email' },
        { data: 'designation', name: 'designation' },
        { data: 'action', name: 'action' },
    ]
});

$(document).ready(function() {
    var active = document.getElementById('ticket_settings')
    active.classList.add('active')

    st_icon = $(active).find('.st-icon')
    st_icon.remove('text-dark')
    st_icon.addClass('text-success')

    $('#type_table').on('click', 'tr td .edit-type', function() {
        ticket_desc = $(this).closest('tr').find('td:eq(0)').text();
        ticket_code = $(this).closest('tr').find('td:eq(1)').text();

        $('#eticket_code').val(ticket_code)
        $('#eticket_description').val(ticket_desc)

        $('#edit_type_modal').modal({backdrop: 'static'});
        $('#edit_type_modal').modal('show');
    })

    $('#status_table').on('click', 'tr td .edit-status', function() {
        status_desc = $(this).closest('tr').find('td:eq(0)').text();
        status_code = $(this).closest('tr').find('td:eq(1)').text();

        $('#estatus_code').val(status_code)
        $('#estatus_description').val(status_desc)

        $('#edit_status_modal').modal({backdrop: 'static'});
        $('#edit_status_modal').modal('show');
    })

    $('#escalation_datatable').on('click', 'tr td .edit-escteam', function() {
        name = $(this).closest('tr').find('td:eq(0)').text();
        email = $(this).closest('tr').find('td:eq(1)').text();
        designation = $(this).closest('tr').find('td:eq(2)').text();

        $('#escalation_user').val(name)
        $('#edit_email').val(email)
        $('#edit_designation').val(designation)

        $('#edit_escalation_modal').modal({backdrop: 'static'});
        $('#edit_escalation_modal').modal('show');
    })

    $('#region_datatable').on('click', 'tr td .edit-region', function() {
        region_desc = $(this).closest('tr').find('td:eq(0)').text();
        region_code = $(this).closest('tr').find('td:eq(1)').text();

        $('#eregion_code').val(region_code)
        $('#eregion_name').val(region_desc)

        $('#edit_region_modal').modal({backdrop: 'static'});
        $('#edit_region_modal').modal('show');
    })

    $('.esclate_ticket').click(function() {
        ticket_code = $(this).attr('data-ticket')
        ticket_desc = $(this).closest('div').find('.ticket-desc').text();

        if ($(this).prop("checked") == true) {
            addToEscalationType(ticket_code, ticket_desc)
        } else {
            removeFromEscalationType(ticket_code, ticket_desc)
        }
    })

    function addToEscalationType(ticket_code) {
        $.ajax({
            type: 'GET',
            data: {'ticket_code': ticket_code},
            url: "{{ route('settings.addToEscalationType') }}",
            success:function(resp) {
                console.log(resp)

                if (resp == '200') {
                    toastr.success(ticket_desc + ' added to esclation list', 'Success', {timeOut: 5000});
                } else {
                    toastr.error('Something went wrong. Ticket Type not added to escalation list', 'Error', {timeOut: 5000});
                }
            }
        })
    }

    function removeFromEscalationType(ticket_code) {
        $.ajax({
            type: 'GET',
            data: {'ticket_code': ticket_code},
            url: "{{ route('settings.removeFromEscalationType') }}",
            success:function(resp) {
                console.log(resp)

                if (resp == '200') {
                    toastr.success(ticket_desc + ' removed from esclation list', 'Success', {timeOut: 5000});
                } else {
                    toastr.error('Something went wrong. Ticket Type not removed from escalation list', 'Error', {timeOut: 5000});
                }
            }
        })
    }
})
</script>
@endpush