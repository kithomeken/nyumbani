@extends('layouts.app')

@section('title')
    <title>{{ config('app.name') }}: Dashboard</title>
@endsection

@push('selective_scripts')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('dataTable/datatables.min.css') }}">
<script src="{{ asset('dataTable/datatables.min.js') }}"></script>
@endpush

@push('pre_load')
<script>
    $("#home_icon").addClass("active");
</script>
@endpush

@section('content')
<style>
    table.dataTable tbody tr td{
        cursor: pointer;
    }
</style>

<div class="container-fluid">
    <div class="w-100 pl-0 py-1">
        <div class="w-100 pb-3">
            <h6 class="text-secondary">
                <span class="fal fa-home mr-2"></span> Dashboard
                <span class="font-small">
                    <span class="fal fa-chevron-right mx-2"></span>
                </span>
            </h5>
        </div>

        <div class="row ml-0 mr-0 form-group">
            <div class="col-md-4 pl-0">

                {{-- SLA STATUS --}}
                <div class="w-100 mb-4">
                    <div class="card border-0 shadow-wd">
                        <div class="card-header border-0 background-white">
                            <div class="row mx-0">
                                <div class="col-md-8 px-0">
                                    <h6 class="text-success mb-0"><span class="fal fa-poll mr-1 text-success"></span> SLA Status</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pb-2 pt-0">
                            <span class="text-dark">SLA Performance for the last 7 days</span>

                            <div class="d-flex py-2">
                                <div class="w-50 py-2">
                                    <div class="w-100">
                                        <img class="image-center" src="{{ asset('img/icons/progress-bar-type.jpg') }}" alt="" srcset="" width="120">
                                    </div>
                                </div>

                                <div class="w-50 py-2 d-flex align-items-center">
                                    <div class="w-100">
                                        <div class="d-flex">
                                            <div class="w-50">
                                                <span class="d-block mb-2">Total Tickets:</span>
                                                <span class="d-block mb-2">Within SLA:</span>
                                                <span class="d-block mb-2">Out of SLA:</span>
                                            </div>

                                            <div class="w-50 pl-4">
                                                <span class="d-block mb-2">351</span>
                                                <span class="d-block mb-2">31</span>
                                                <span class="d-block mb-2">1</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TO DO LIST --}}
                <div class="w-100">
                    <div class="card border-0 shadow-wd" style="height: 430px">
                        <div class="card-header border-0 background-white">
                            <div class="row mx-0">
                                <div class="col-md-8 px-0">
                                    <h6 class="text-success"><span class="fal fa-list-alt text-success mr-1"></span> My Notes</h5>
                                </div>

                                <div class="col-4 px-0">
                                    <a class="dropdown-toggle float-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <div class="align-items-center mr-2">
                                            <span class="fal fa-ellipsis-h float-right fa-lg text-dark"></span>
                                        </div>
                                    </a>
            
                                    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdown">
                                        <div class="w-100 px-0 border-radius">
                                            <a class="dropdown-item" href="#">Add New Note</a>
                                            <a class="dropdown-item" href="#">View All Notes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-0 px-0">
                            <div class="w-100 px-2 pb-2 pt-0">
                                <ul class="list-style-none px-2 font-small" id="note-list">

                                    <li class="note-item mb-2">
                                        <div class="w-100 note-content" data-note="1">
                                            <span class="">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                                        </div>

                                        <div class="w-100 d-flex py-1 text-right text-muted border-bottom">
                                            <div class="flex-fill mr-2 w-75 note-action" id="note_action_1">
                                                <a href="" class="mark_as_done">
                                                    <span class="fal fa-check-square text-success mr-3" data-toggle="tooltip" data-placement="left" title="Mark as done"></span>
                                                </a>

                                                <a href="" class="delete_note">
                                                    <span class="fal fa-trash-alt text-danger" data-toggle="tooltip" data-placement="right" title="Delete Note"></span>
                                                </a>
                                            </div>
                                            <div class="flex-fill w-25 note-time">
                                                <span class="font-xsmall">1 minute ago</span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="note-item mb-2">
                                        <div class="w-100 note-content" data-note="2">
                                            <span>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</span>
                                        </div>

                                        <div class="w-100 d-flex py-1 text-right text-muted border-bottom">
                                            <div class="flex-fill mr-2 w-75 note-action" id="note_action_2">
                                                <a href="" class="mark_as_done">
                                                    <span class="fal fa-check-square text-success mr-3" data-toggle="tooltip" data-placement="left" title="Mark as done"></span>
                                                </a>

                                                <a href="" class="delete_note">
                                                    <span class="fal fa-trash-alt text-danger" data-toggle="tooltip" data-placement="right" title="Delete Note"></span>
                                                </a>
                                            </div>
                                            <div class="flex-fill w-25 note-time">
                                                <span class="font-xsmall">7 hours ago</span>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="note-item mb-2">
                                        <div class="w-100 note-content" data-note="3">
                                            <span>Sed ut perspiciatis unde omnis iste natus error sit.</span>
                                        </div>

                                        <div class="w-100 d-flex py-1 text-right text-muted border-bottom">
                                            <div class="flex-fill mr-2 w-75 note-action" id="note_action_3">
                                                <a href="" class="mark_as_done">
                                                    <span class="fal fa-check-square text-success mr-3" data-toggle="tooltip" data-placement="left" title="Mark as done"></span>
                                                </a>

                                                <a href="" class="delete_note">
                                                    <span class="fal fa-trash-alt text-danger" data-toggle="tooltip" data-placement="right" title="Delete Note"></span>
                                                </a>
                                            </div>
                                            <div class="flex-fill w-25 note-time">
                                                <span class="font-xsmall">2 weekss ago</span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COLUMN TWO --}}
            <div class="col-md-8">

                {{-- STATISTICS CARD --}}
                <div class="w-100 rounded align-items-center mb-4">
                    <div class="card border-0 shadow-wd big-disp">
                        <div class="card-header border-0">
                            <div class="row mx-0">
                                <div class="col-md-8 px-0">
                                    <h6 class="text-white mb-0"><span class="fal fa-analytics text-white mr-1"></span> Current Statistics</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-0 py-1">
                            <div class="row ml-0 mr-0">
                                <div class="col-md-4 pr-0 align-items-center" style="display: flex">
                                    <table class="table table-borderless w-100 mb-1 text-white statistics">
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="w-100">
                                                        <span class="text-white">In Progress</span>
                                                        <span class="font-large">23</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="w-100">
                                                        <span class="text-white">Scheduled</span>
                                                        <span class="font-large">14</span>
                                                    </div>
                                                </td>
                                            </tr>
        
                                            <tr>
                                                <td>
                                                    <div class="w-100 form-group">
                                                        <span class="text-white">Awaiting Client</span>
                                                        <span class="font-large">7</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="w-100 form-group">
                                                        <span class="text-white">Overdue</span>
                                                        <span class="font-large">12</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
        
                                <div class="col-md-4 py-2">
                                    <img class="image-center" src="{{ asset('img/icons/pie-chart.png') }}" alt="" srcset="" width="80%">
                                </div>
        
                                <div class="col-md-4">
                                    <div class="w-100 border-bottom py-2">
                                        <span class="d-block text-white"><b>Description:</b></span>
                                    </div>
        
                                    <div class="w-100 py-2 text-white">
                                        <span class="d-block">Description One</span>
                                        <span class="d-block">Description Two</span>
                                        <span class="d-block">Description Three</span>
                                        <span class="d-block">Description Four</span>
                                        <span class="d-block">Description Five</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- TICKETS DUE --}}
                <div class="w-100 mt-4 rounded">
                    <div class="card border-0">
                        <div class="card-header border-0 invisible-background">
                            <div class="row mx-0">
                                <div class="col-md-8 px-0">
                                    <h6 class="text-dark mb-0"><span class="fal fa-ticket-alt ticket-rotate text-dark mr-2"></span> Tickets Due</h6>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0 shadow-wd rounder-border">
                            <ul id="nav-tabs" class="nav nav-tabs" role="tablist">
                                @if ($overdueCount > 0)                                    
                                    <li class="nav-item">
                                        <a href="#overdue-tickets" id="overdue-tab" class="nav-link active" data-toggle="tab" aria-selected="true">Overdue Tickets</a>
                                    </li>
                                @endif

                                @if ($dueCount > 0)
                                    <li class="nav-item">
                                        <a href="#today-tickets" id="today-tab" class="nav-link" data-toggle="tab" aria-selected="true">Due Today</a>
                                    </li>
                                @endif
                                
                                @if ($scheduledCount > 0)
                                    <li class="nav-item">
                                        <a href="#scheduled-tickets" id="scheduled-tab" class="nav-link" data-toggle="tab" aria-selected="true">Due Tomorrow</a>
                                    </li>
                                @endif
                            </ul>

                            <div id="nav-tab-content" class="tab-content w-100 mb-4 px-0">
                                @if ($overdueCount > 0)
                                    <div id="overdue-tickets" class="tab-pane form-group fade active show">
                                        <div class="w-100 pt-3 px-3">
                                            <div class="row ml-0 mr-0">
                                                <div class="col-6 px-0">
                                                    <h5 class="text-secondary">Overdue Workload</h5>
                                                    <p class="font-small">Before embarking on today's workload, take a look at what was left undone on the previous day(s).</p>
                                                </div>

                                                <div class="col-md-6 py-3 text-center px-0 pl-3">
                                                    <div class="row ml-0 mr-0">
                                                        <div class="col-4 px-0 border-right">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Connections</span>
                                                        </div>

                                                        <div class="col-4 px-0 border-right">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Incidence</span>
                                                        </div>

                                                        <div class="col-4 px-0 border-light">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Others</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-100 pb-2 px-3 table-responsive">
                                            <table id="overdue_table" class="table table-hover table-border-0 w-100 font-small overdue-table">
                                                <thead>
                                                    <tr>
                                                        <th>Agent</th>
                                                        <th>Type</th>
                                                        <th>Region</th>
                                                        <th>Priority</th>
                                                        <th>Created On</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if ($dueCount > 0)
                                    <div id="today-tickets" class="tab-pane form-group fade show">
                                        <div class="w-100 pt-3 px-3">
                                            <div class="row ml-0 mr-0">
                                                <div class="col-6 px-0">
                                                    <h5 class="text-secondary">Due Today</h5>
                                                    <p class="font-small">Here's what you have planned for the day.</p>
                                                </div>

                                                <div class="col-md-6 pb-3 text-center px-0 pl-3">
                                                    <div class="row ml-0 mr-0">
                                                        <div class="col-4 px-0 border-right">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Connections</span>
                                                        </div>

                                                        <div class="col-4 px-0 border-right">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Incidence</span>
                                                        </div>

                                                        <div class="col-4 px-0 border-light">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Others</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-100 py-2 px-3">
                                            <table id="today_table" class="table table-hover table-border-0 w-100 font-small today-table">
                                                <thead>
                                                    <tr>
                                                        <th>Agent</th>
                                                        <th>Type</th>
                                                        <th>Region</th>
                                                        <th>Priority</th>
                                                        <th>Created On</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if ($scheduledCount > 0)
                                    <div id="scheduled-tickets" class="tab-pane form-group fade show">
                                        <div class="w-100 pt-3 px-3">
                                            <div class="row ml-0 mr-0">
                                                <div class="col-6 px-0">
                                                    <h5 class="text-secondary">Due Tomorrow</h5>
                                                    <p class="font-small">Here's what we picked up from your schedule.</p>
                                                </div>

                                                <div class="col-md-6 py-3 text-center px-0 pl-3">
                                                    <div class="row ml-0 mr-0">
                                                        <div class="col-4 px-0 border-right">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Connections</span>
                                                        </div>

                                                        <div class="col-4 px-0 border-right">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Incidence</span>
                                                        </div>

                                                        <div class="col-4 px-0 border-light">
                                                            <h4 class="mb-0 font-medium">0</h4>
                                                            <span class="text-muted font-small">Others</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-100 py-2 px-3">
                                            <table id="scheduled_table" class="table table-hover table-border-0 w-100 font-small scheduled-table">
                                                <thead>
                                                    <tr>
                                                        <th>Agent</th>
                                                        <th>Type</th>
                                                        <th>Region</th>
                                                        <th>Priority</th>
                                                        <th>Scheduled To</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                @endif
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
    $('.note-action').hide()

    $("#note-list").on( "mouseenter", "li.note-item", function() {
        note_item = $(this).closest('li').find('.note-content').attr('data-note');
        console.log(note_item)

        // $('#note_action_' + note_item).show()
        $('#note_action_' + note_item).fadeIn( 400 );
    });

    $("#note-list").on( "mouseleave", "li.note-item", function() {
        note_item = $(this).closest('li').find('.note-content').attr('data-note');
        console.log(note_item)

        // $('#note_action_' + note_item).hide()
        $('#note_action_' + note_item).fadeOut( 400 );
    });

    $('#overdue_table').DataTable({
        processing: true,
        serverSide: true,
        "bPaginate": false,
        "searching": false,
        ajax: '{!! route('datatables.overdueTable') !!}',
        columns: [
            { data: 'agent' },
            { data: 'type' },
            { data: 'region' },
            { data: 'priority' },
            { data: 'created_at' },
        ],
        createdRow: function( row, data, dataIndex ) {
            $(row).find('td:eq(0)')
            .attr('data-ticket', data.id)
        }
    });

    $('#overdue_table').on('click', 'tr', function() {
        ticket_id = $(this).closest('tr').find('td:eq(0)').attr('data-ticket')

        if (ticket_id != null) {
            url = "{{ url('u/default/tickets/view') }}"
            url = url + "/" + ticket_id
            window.location.href = url;
        }
    })

    $('#today_table').DataTable({
        processing: true,
        serverSide: true,
        "bPaginate": false,
        "searching": false,
        ajax: '{!! route('datatables.todayTable') !!}',
        columns: [
            { data: 'agent' },
            { data: 'type' },
            { data: 'region' },
            { data: 'priority' },
            { data: 'created_at' },
        ],
        createdRow: function( row, data, dataIndex ) {
            $(row).find('td:eq(0)')
            .attr('data-ticket', data.id)
        }
    });

    $('#today_table').on('click', 'tr', function() {
        ticket_id = $(this).closest('tr').find('td:eq(0)').attr('data-ticket')

        if (ticket_id != null) {
            url = "{{ url('u/default/tickets/view') }}"
            url = url + "/" + ticket_id
            window.location.href = url;
        }
    })

    $('#scheduled_table').DataTable({
        processing: true,
        serverSide: true,
        "bPaginate": false,
        "searching": false,
        ajax: '{!! route('datatables.scheduledTable') !!}',
        columns: [
            { data: 'agent' },
            { data: 'type' },
            { data: 'region' },
            { data: 'priority' },
            { data: 'created_at' },
        ],
        createdRow: function( row, data, dataIndex ) {
            $(row).find('td:eq(0)')
            .attr('data-ticket', data.id)
        }
    });

    $('#scheduled_table').on('click', 'tr', function() {
        ticket_id = $(this).closest('tr').find('td:eq(0)').attr('data-ticket')

        if (ticket_id != null) {
            url = "{{ url('u/default/tickets/view') }}"
            url = url + "/" + ticket_id
            window.location.href = url;
        }
    })

    overdueCount = '{{ $overdueCount }}'
    dueCount = '{{ $dueCount }}'
    scheduledCount = '{{ $scheduledCount }}'

    if (overdueCount == 0) {
        $('#today-tab').addClass('active')
        $('#today-tickets').addClass('active')
    }

    if (dueCount == 0) {
        $('#scheduled-tab').addClass('active')
        $('#scheduled-tickets').addClass('active')
    }
})
</script>
@endpush