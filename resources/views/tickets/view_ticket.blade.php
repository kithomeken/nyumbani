@extends('layouts.app')

@section('title')
    <title>Ticket #{{ $ticket->id }} - {{ $ticket->summary }}</title>
@endsection

@push('selective_scripts')
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>

<!-- Sweet Alerts -->
<script src="{{asset('js/sweet_alerts.min.js')}}"></script>
@endpush

@push('pre_load')
<script>
    $("#ticket_icon").addClass("active");
</script>
@endpush

@section('content')
<style>
    #cke_1_contents {
        height: 120px!important
    }
    #reassign_ticket {
        cursor: pointer;
    }
    select.form-control-sm + .chosen-container.chosen-container-single .chosen-single {
        display: block;
        width: 100%;
        height: 30px;
        padding: 3.5px 12px;
        font-size: 14px;
        line-height: 1.428571429;
        color: #555;
        vertical-align: middle;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
        -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        background-image: none;
    }
</style>

<div class="container-fluid">
    <div class="w-100 py-1">
        <div class="w-100 pb-3">
            <h6 class="text-secondary mb-0">
                <span class="fal fa-ticket-alt ticket-rotate mr-1"></span> Tickets
                <span class="font-small">
                    <span class="fal fa-chevron-right mx-2"></span>
                </span>
                {{ $ticket->summary }}
            </h5>
        </div>

        <div class="row mx-0">
            {{-- CONTENT SECTION --}}
            <div class="col-md-8 pl-0">
                <div class="card border-0 shadow-wd mb-4">
                    <div class="card-header background-white border-0 pb-0">
                        <div class="row mx-0">
                            <div class="col-md-12 px-0 pb-2">
                                <span class="font-bold d-block font-xlarge">{{ $ticket->summary }}</span>

                                <span class="text-dark font-small d-block pb-1">
                                    <span class="text-success fad fa-calendar-week fa-lg mr-1"></span>
                                    {{ $isoFormat }}
                                </span>

                                <span class="text-dark font-small d-block">
                                    <span class="text-success fad fa-user-circle fa-lg mr-1"></span>
                                    {{ $creator->first_name }} {{ $creator->last_name }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        {{-- TICKET DETAILS --}}
                        <div class="w-100">
                            <div class="text-secondary form-group">
                                {!! $ticket->content !!}
                            </div>
                        </div>

                        <div class="w-100">
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="m-auto pr-2">
                                        <span class="font-normal">Comments</span>
                                    </div>
    
                                    <div class="flex-fill">
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <div class="px-2">
                                @if ($comments->count() == 0)
                                    <div class="w-100 mb-2" style="height: 170px">
                                        <img class="image-center" src="{{ asset('img/screen-art/no_results_found.png') }}" alt="" srcset="" width="auto" height="170px">
                                    </div>

                                    <div class="w-100 pt-2">
                                        <p class="text-dark text-center font-large">
                                            No Comments Found
                                        </p>
                                    </div>
                                @else
                                    @foreach ($comments as $comment)
                                        <div class="w-100 mb-2" id="comment_{{ $comment->id }}">
                                            <div class="d-flex">
                                                <div class="px-0">
                                                    <img src="{{ asset('img/avatars/'.$comment->owner->avatar.'.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
                                                </div>

                                                <div class="px-2 flex-fill">
                                                    <div class="px-0">
                                                        <div class="d-flex">
                                                            <div class="flex-fill">
                                                                <span class="text-dark">
                                                                    <span class="mr-2 text-dark">{{ $comment->owner->first_name }} {{ $comment->owner->last_name }}</span>
                                                                    <span class=" font-small pr-3 text-muted">{{ $comment->created_at->diffForhumans() }}</span>
                                                                </span>
                                                            </div>

                                                            <div class="px-0">
                                                                <a class="dropdown-toggle float-right pl-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                    <div class="align-items-center mr-2">
                                                                        <span class="fal fa-ellipsis-v float-right fa-lg text-dark"></span>
                                                                    </div>
                                                                </a>

                                                                @if ($comment->user_id == Auth::user()->id)
                                                                    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdown">
                                                                        <div class="w-100 px-0 border-radius">
                                                                            <button class="dropdown-item delete-comment" data-comment="{{ $comment->id }}">Delete Comment</button>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="px-0 text-secondary">
                                                        {!! $comment->comment !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <form action="{{ route('ticket.addComment') }}" method="post" class="px-2" id="add_comment_form">
                                @csrf
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                                <div class="w-100 form-group">
                                    <div class="mb-2">
                                        <label for="comment" class="col-form-label text-md-left">Add Comment <sup class="text-danger">*</sup></label>
                                        <textarea class="form-control form-control-sm" id="comment" rows="2" name="comment" value=""></textarea>
                                    </div>
                                </div>

                                <div class="w-100 pt-2 px-2">
                                    <div class="mb-2 col-3 px-0">
                                        <button type="submit" id="post_comment" class="btn btn-success btn-sm w-100">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- ACTIVITIES --}}
                <div class="card border-0 shadow-wd">
                    <div class="card-header background-white border-0">
                        <div class="row mx-0">
                            <div class="col-8 px-0">
                                <span class="font-bold">Activities</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="w-100">
                            <div class="d-flex form-group">
                                <div class="px-0">
                                    <figure class="avatar avatar-sm bring-forward mr-2">
                                        <span class="avatar-title bg-info-bright text-info rounded-circle">
                                            <i class="fal fa-file-alt"></i>
                                        </span>
                                    </figure>
                                </div>

                                <div class="px-2 flex-fill">
                                    <span class="text-dark d-block mb-2"><span class="text-info">Elnore McCrillis</span> attached file <span class="float-right text-muted font-small">Sun 10:16 AM</span></span>
                                    
                                    <div class="border rounded">
                                        <div class="px-3 py-2">
                                            <span class="text-secondary">
                                                <span class="fal fa-file-excel mr-2"></span>
                                                <span>filename12334.pdf</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach ($activities as $activity)
                                @if ($activity->action_type == "Create")
                                    <div class="d-flex form-group">
                                        <div class="px-0">
                                            <figure class="avatar avatar-sm bring-forward mr-2">
                                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                    <i class="fal fa-check"></i>
                                                </span>
                                            </figure>
                                        </div>

                                        <div class="px-2 flex-fill">
                                            <span class="text-dark d-block mb-2">
                                                <span class="text-info">{{ $activity->actionBy->first_name }} {{ $activity->actionBy->last_name }}</span>
                                                <span class="text-dark"> created ticket</span>
                                                <span class="float-right text-muted font-small">{{ $activity->created_at->diffForhumans() }}</span>
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- UTILITY ITEMS --}}
            <div class="col-md-4 pr-0">
                {{-- TICKET ATTRIBUTES --}}
                <div class="w-100 pb-4">
                    <div class="card border-0 shadow-wd pb-4">
                        <div class="card-header background-white border-0">
                            <span class="font-normal">Properties</span>
                        </div>

                        <div class="card-body pt-0 pb-0">
                            <div class="row mx-0 form-group">
                                <div class="col-md-4 px-0">
                                    <div id="activeBorder" class="active-border">
                                        <div id="circle" class="sla-circle">
                                            <span class="prec 170" id="prec">0%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 px-0 form-group">
                                    <div class="w-100 form-group">
                                        <span class="font-large text-success font-bold pb-1 d-block">Within SLA</span>
                                        <span class="text-secondary font-bold pb-1 d-block">Time to resolution</span>
                                        <span class="text-dark d-block font-bold">+ 6.2 Hours</span>
                                    </div>


                                    <div class="row mx-0 form-group">
                                        <div class="col-md-6 px-0">
                                            <span class="text-secondary d-block font-bold pb-2">Type:</span>
                                            <span class="text-inc fad fa-album fa-lg mr-1"></span>
                                            <span class="text-secondary">{{ $ticketType->description }}</span>
                                        </div>

                                        <div class="col-md-6 px-0">
                                            <span class="text-secondary d-block font-bold pb-2">Priority:</span>
                                            @if ($ticket->priority == 1)
                                                <span class="text-success far fa-arrow-circle-up fa-lg mr-1"></span>
                                                <span class="text-secondary">Low</span>
                                            @elseif ($ticket->priority == 2)
                                                <span class="text-warning far fa-arrow-circle-up fa-lg mr-1"></span>
                                                <span class="text-secondary">Medium</span>
                                            @else
                                                <span class="text-danger far fa-arrow-circle-up fa-lg mr-1"></span>
                                                <span class="text-secondary">High</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row mx-0">
                                        <div class="col-md-6 px-0">
                                            <span class="text-secondary d-block font-bold pb-2">Status:</span>
                                            <h6 class="mb-0"><span class="badge badge-success">{{ $status->description }}</span></h5>
                                        </div>

                                        <div class="col-md-6 px-0">
                                            <span class="text-secondary d-block font-bold pb-2">Resolution:</span>
                                            <span class="text-warning fad fa-compact-disc fa-lg mr-1"></span>
                                            <span class="text-secondary">Unresolved</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 offset-md-4 px-0">
                                    <span class="text-secondary d-block font-bold pb-2">Region:</span>
                                    <span class="text-info fad fa-globe-africa fa-lg mr-1"></span>
                                    <span class="text-secondary">{{ $region->region_name }}</span>
                                </div>
                            </div>

                            <div class="row mx-0 form-group">
                                <div class="col-4 px-0 pb-1">
                                    <span class="text-secondary font-bold">Created by:</span>
                                </div>

                                <div class="col-8 px-0 pb-1">
                                    <span class="text-secondary d-block pb-2">
                                        {{ $creator->first_name }} {{ $creator->last_name }}
                                    </span>

                                    <span class="text-secondary d-block pb-2">
                                        Phone: {{ $creator->msisdn }}
                                    </span>

                                    <span class="text-secondary d-block">
                                        {{ $ticket->created_at->diffForhumans() }}
                                    </span>
                                </div>
                            </div>

                            <div class="row mx-0 form-group">
                                <div class="col-4 px-0 pb-1">
                                    <span class="text-secondary font-bold">Assigned To:</span>
                                </div>

                                <div class="col-8 px-0 pb-1">
                                    <span class="text-secondary d-block pb-2">
                                        {{ $assigned_to->first_name }} {{ $assigned_to->last_name }}
                                    </span>

                                    <span class="text-secondary d-block pb-2">
                                        Phone: {{ $assigned_to->msisdn }}
                                    </span>

                                    <div class="w-100" id="reassign_btn">
                                        <span class="text-info d-block font-bold pb-2" id="reassign_ticket">
                                            Reassign Ticket
                                        </span>
                                    </div>

                                    <div class="w-100 py-2 px-3" id="reassign_div" style="background: #F4F5F6!important">
                                        <div class="w-100">
                                            <span class="font-dark d-block pb-1 text-left">
                                                Select preferred agent to reassign ticket to
                                            </span>
                                        </div>
                                    
                                        <div class="w-100 pb-4">
                                            <label for="agent" class="col-md-12 px-0 col-form-label text-md-left">Agent <sup class="text-danger">*</sup></label>
                                            <select class="form-control form-control-sm selection" id="agent" name="agent" required="">
                                                <option selected="" value="" default="">Choose...</option>
                                    
                                                @foreach ($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->first_name }} {{ $agent->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="d-flex w-100 pb-2">
                                            <div class="w-50 pr-3">
                                                <button type="submit" id="cancel_reassign" class="btn btn-secondary btn-sm w-100">Cancel</button>
                                            </div>
                                    
                                            <div class="w-50 pl-3">
                                                <button type="submit" id="cancel_reassign" class="btn btn-success btn-sm w-100">Reassign</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-header pt-0 background-white border-0">
                            <div class="d-flex">
                                <div class="m-auto pr-2">
                                    <span class="font-normal">Task List</span>
                                </div>

                                <div class="flex-fill">
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0 pb-0">
                            <div class="card-scroll px-1">
                                <div class="custom-control custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck1">Talk
                                        to new customers
                                    </label>
                                </div>

                                <div class="custom-control custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck2">Older
                                        users will be deleted from
                                        the system
                                    </label>
                                </div>

                                <div class="custom-control custom-checkbox todo-item">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label d-flex justify-content-between"
                                           for="customCheck3">Assignment
                                        will be
                                        completed
                                    </label>
                                </div>
                            </div>

                            <form class="mt-3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-control-sm"
                                           aria-label="Example text with button addon"
                                           placeholder="Add New task" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-success" type="button" id="button-addon1">Add Task
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-100">
                    <div class="card border-0 shadow-wd pb-4">
                        <div class="card-header background-white border-0">
                            <span class="font-normal">Attachments</span>
                        </div>

                        <div class="card-body pt-0 pb-0 px-3">
                            <div class="card-scroll px-0">
                                <div class="w-100 border-bottom form-group">
                                    <div class="d-flex px-0">
                                        <div class="px-0">
                                            <figure class="avatar avatar-sm bring-forward mr-2 px-0">
                                                <span class="avatar-title bg-info-bright text-info rounded">
                                                    <i class="fal fa-file-alt"></i>
                                                </span>
                                            </figure>
                                        </div>

                                        <div class="px-2 flex-fill py-0">
                                            <span class="text-dark d-block mb-2">
                                                <span class="text-dark d-block">Mockup.zip</span>
                                                <span class="text-secondary d-block font-small">4.3 MB</span>
                                            </span>
                                        </div>

                                        <div class="px-0 pr-2">
                                            <span class="d-block mb-2">
                                                <span class="fal text-secondary fa-arrow-to-bottom mr-2"></span>
                                                <span class="fal text-danger fa-trash-alt"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 border-bottom form-group">
                                    <div class="d-flex px-0">
                                        <div class="px-0">
                                            <figure class="avatar avatar-sm bring-forward mr-2 px-0">
                                                <span class="avatar-title bg-info-bright text-info rounded">
                                                    <i class="fal fa-file-word"></i>
                                                </span>
                                            </figure>
                                        </div>

                                        <div class="px-2 flex-fill py-0">
                                            <span class="text-dark d-block mb-2">
                                                <span class="text-dark d-block">to_do_list.docx</span>
                                                <span class="text-secondary d-block font-small">1.1 MB</span>
                                            </span>
                                        </div>

                                        <div class="px-0 pr-2">
                                            <span class="d-block mb-2">
                                                <span class="fal text-secondary fa-arrow-to-bottom mr-2"></span>
                                                <span class="fal text-danger fa-trash-alt"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 border-bottom form-group">
                                    <div class="d-flex px-0">
                                        <div class="px-0">
                                            <figure class="avatar avatar-sm bring-forward mr-2 px-0">
                                                <span class="avatar-title bg-info-bright text-info rounded">
                                                    <i class="fal fa-file-pdf"></i>
                                                </span>
                                            </figure>
                                        </div>

                                        <div class="px-2 flex-fill py-0">
                                            <span class="text-dark d-block mb-2">
                                                <span class="text-dark d-block">project_list.pdf</span>
                                                <span class="text-secondary d-block font-small">9 MB</span>
                                            </span>
                                        </div>

                                        <div class="px-0 pr-2">
                                            <span class="d-block mb-2">
                                                <span class="fal text-secondary fa-arrow-to-bottom mr-2"></span>
                                                <span class="fal text-danger fa-trash-alt"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 border-bottom form-group">
                                    <div class="d-flex px-0">
                                        <div class="px-0">
                                            <figure class="avatar avatar-sm bring-forward mr-2 px-0">
                                                <span class="avatar-title bg-info-bright text-info rounded">
                                                    <i class="fal fa-file-image"></i>
                                                </span>
                                            </figure>
                                        </div>

                                        <div class="px-2 flex-fill py-0">
                                            <span class="text-dark d-block mb-2">
                                                <span class="text-dark d-block">serial_no.png</span>
                                                <span class="text-secondary d-block font-small">0.8 MB</span>
                                            </span>
                                        </div>

                                        <div class="px-0 pr-2">
                                            <span class="d-block mb-2">
                                                <span class="fal text-secondary fa-arrow-to-bottom mr-2"></span>
                                                <span class="fal text-danger fa-trash-alt"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-100 pt-2">
                                <div class="row mx-0">
                                    <div class="offset-md-7 col-md-5 px-0">
                                        <button type="submit" id="create_btn" class="btn btn-primary btn-sm w-100">Upload File</button>
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
CKEDITOR.replace( 'comment', {
    uiColor: '#ABBEB9'
});

CKEDITOR.config.toolbar = [
    [
        'Bold','Italic', 'Paste',
    ],
];

$(document).ready(function() {
    $('#reassign_btn').show()
    $('#reassign_div').hide()

    $('.delete-comment').click(function() {
        commentID = $(this).attr('data-comment')

        swal({
            title: "Delete Comment",
            text: "Are you sure you want to delete this comment?",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $('#comment_' + commentID).remove()

                // Delete Comment
                $.ajax({
                    type: 'POST',
                    data: {'comment_id': commentID},
                    url: "{{ route('ticket.deleteComment') }}",
                    success: function(data) {
                        if (data == 1) {
                            toastr.success("Comment was delete successfully", {timeOut: 5000})
                        } else {
                            toastr.error("Could not delete comment", {timeOut: 5000})
                        }
                    },
                    error: function(data) {
                        toastr.error("Something went wrong. Could not delete comment...", {timeOut: 5000})
                    }
                })
            }
        })
    })

    $('#reassign_ticket').click(function() {
        $('#reassign_btn').hide()
        $('#reassign_div').show()
    })

    $('#cancel_reassign').click(function() {
        $('#reassign_div').hide()
        $('#reassign_btn').show()
    })














    setTimeout(function(){
        loopit(1);
    },1);

    var i = 0 , prec;
    // var degs = $("#prec").attr("class").split(' ')[1];
    var degs = Math.round(Math.random() * 360)
    var activeBorder = $("#activeBorder");

    function loopit(loop){
        if (loop == 1) {
            i++
        }

        if (i < 0) {
            i = 0
        }

        if (i > degs) {
            i = degs;
            loop = 0
        }

        prec = (100 * i)/360;   
        $(".prec").html(Math.round(prec)+"%");

        if (i <= 180) {
            activeBorder.css('background-image','linear-gradient(' + (parseInt(90) + parseInt(i)) + 'deg, transparent 50%, #A9DFBF 50%), linear-gradient(90deg, #A9DFBF 50%, transparent 50%)');
        } else {
            activeBorder.css('background-image','linear-gradient(' + (parseInt(i) - parseInt(90)) + 'deg, transparent 50%, #0BC619 50%),linear-gradient(90deg, #A9DFBF 50%, transparent 50%)');
        }
        
        if (loop == 1) {
            setTimeout(function(){
                loopit(loop);
            }, 1);
        }
    }


})
</script>
@endpush