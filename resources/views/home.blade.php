@extends('layouts.app')

@section('title')
    <title>{{ config('app.name') }} Home</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="w-100 pl-3 py-1">
        <div class="w-100 pb-3">
            <h5 class="text-secondary">Dashboard</h4>
        </div>

        <div class="row ml-0 mr-0 form-group">
            <div class="col-md-4 pl-0">
                <h5 class="text-dark"><span class="fal fa-poll mr-2 text-success"></span> SLA Status</h5>

                <div class="w-100">
                    <div class="card border-0">
                        <div class="card-body py-2">
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

                <h5 class="text-dark mt-4"><span class="fal fa-file-alt text-success mr-2"></span> My Notes</h5>

                <div class="w-100">
                    <div class="card border-0" style="height: 430px">
                        <div class="card-body py-0 px-0">
                            <div class="w-100 p-2 pt-3">
                                <ul class="list-style-none px-3 font-small" id="note-list">
                                    <li class="note-item  mb-1">
                                        <div class="w-100 note-content" data-note="1">
                                            <span class="">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
                                        </div>
                                        <div class="w-100 d-flex py-1 text-right text-muted">
                                            <div class="flex-fill mr-2 w-75 note-action" id="note_action_1">
                                                <a href="" class="mark_as_done">
                                                    <span class="fal fa-check-square text-success mr-3" data-toggle="tooltip" data-placement="left" title="Mark as done"></span>
                                                </a>

                                                <a href="" class="delete_note">
                                                    <span class="fal fa-trash-alt text-danger" data-toggle="tooltip" data-placement="right" title="Delete Note"></span>
                                                </a>
                                            </div>
                                            <div class="flex-fill w-25 note-time">
                                                1 minute ago
                                            </div>
                                        </div>
                                    </li>

                                    <li class="note-item  mb-1">
                                        <div class="w-100 note-content" data-note="2">
                                            <span>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</span>
                                        </div>
                                        <div class="w-100 d-flex py-1 text-right text-muted">
                                            <div class="flex-fill mr-2 w-75 note-action" id="note_action_2">
                                                <a href="" class="mark_as_done">
                                                    <span class="fal fa-check-square text-success mr-3" data-toggle="tooltip" data-placement="left" title="Mark as done"></span>
                                                </a>

                                                <a href="" class="delete_note">
                                                    <span class="fal fa-trash-alt text-danger" data-toggle="tooltip" data-placement="right" title="Delete Note"></span>
                                                </a>
                                            </div>
                                            <div class="flex-fill w-25">
                                                7 hours ago
                                            </div>
                                        </div>
                                    </li>

                                    <li class="note-item  mb-1">
                                        <div class="w-100 note-content" data-note="3">
                                            <span>Sed ut perspiciatis unde omnis iste natus error sit.</span>
                                        </div>
                                        <div class="w-100 d-flex py-1 text-right text-muted">
                                            <div class="flex-fill mr-2 w-75 note-action" id="note_action_3">
                                                <a href="" class="mark_as_done">
                                                    <span class="fal fa-check-square text-success mr-3" data-toggle="tooltip" data-placement="left" title="Mark as done"></span>
                                                </a>

                                                <a href="" class="delete_note">
                                                    <span class="fal fa-trash-alt text-danger" data-toggle="tooltip" data-placement="right" title="Delete Note"></span>
                                                </a>
                                            </div>
                                            <div class="flex-fill w-25">
                                                2 weeks ago
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="d-flex w-100 mb-0" style="bottom:0; position: absolute">
                                {{-- <div class="flex-fill p-2 pl-4 text-left">
                                    Saturday 4th Jan (Today)
                                </div> --}}
                                <div class="flex-fill p-2 pr-3 py-3">
                                    <button id="add_note" class="btn btn-sm btn-outline-success float-right" role="button">
                                        <span class="fal fa-plus fa-lg mr-1"></span> Add Note
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <h5 class="text-dark"><span class="fal fa-analytics text-success mr-2"></span> Current Statistics</h5>

                <div class="w-100 big-disp py-3 rounded align-items-center" style="height:235px">
                    <div class="row ml-0 mr-0">
                        <div class="col-md-4 pr-0 align-items-center" style="display: flex">
                            <table class="table table-borderless w-100 mb-1 text-white statistics">
                                <tbody>
                                    <tr class="border-bottom">
                                        <td>
                                            <div class="w-100 form-group">
                                                <span class="text-white">In Progress</span>
                                                <span class="font-large">23</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="w-100 form-group">
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

                <h5 class="text-dark mt-4"><span class="fal fa-ticket-alt ticket-rotate text-success mr-2"></span> Tickets Due</h5>

                <div class="w-100 py-1 rounded">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <ul id="nav-tabs" class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a href="#overdue-tickets" id="overdue-tab" class="nav-link active" data-toggle="tab" aria-selected="true">Overdue Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#today-tickets" id="today-tab" class="nav-link" data-toggle="tab" aria-selected="true">Due Today</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tomorrow-tickets" id="tomorrow-tab" class="nav-link" data-toggle="tab" aria-selected="true">Due Tomorrow</a>
                                </li>
                            </ul>

                            <div id="nav-tab-content" class="tab-content w-100 mb-4 px-0">
                                <div id="overdue-tickets" class="tab-pane form-group fade active show">
                                    <div class="w-100 py-3 px-3">
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

                                    <div class="w-100 py-2 px-3">
                                        <table id="overdue-table" class="table table-hover table-border-0 font-small overdue-table w-100">
                                            <thead class="th-theme">
                                                <tr>
                                                    <th>Agent</th>
                                                    <th>Type</th>
                                                    <th>Region</th>
                                                    <th>Priority</th>
                                                    <th>Status</th>
                                                    <th>Created</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div id="today-tickets" class="tab-pane form-group fade show">
                                    <div class="w-100 py-3 px-3">
                                        <div class="row ml-0 mr-0">
                                            <div class="col-6 px-0">
                                                <h5 class="text-secondary">Due Today</h5>
                                                <p class="font-small">Here's what you have planned for the day.</p>
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
                                        <table id="today-table" class="table table-hover table-border-0 font-small overdue-table w-100">
                                            <thead class="th-theme">
                                                <tr>
                                                    <th>Agent</th>
                                                    <th>Type</th>
                                                    <th>Region</th>
                                                    <th>Priority</th>
                                                    <th>Status</th>
                                                    <th>Created</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                                <div id="tomorrow-tickets" class="tab-pane form-group fade show">
                                    <div class="w-100 py-3 px-3">
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
                                        <table id="tomorrow-table" class="table table-hover table-border-0 font-small overdue-table w-100">
                                            <thead class="th-theme">
                                                <tr>
                                                    <th>Agent</th>
                                                    <th>Type</th>
                                                    <th>Region</th>
                                                    <th>Priority</th>
                                                    <th>Status</th>
                                                    <th>Scheduled</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
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
})
</script>
@endpush