@extends('layouts.app')

@section('title')
    <title>Ticket #{{ $ticket->id }} - {{ $ticket->summary }}</title>
@endsection

@push('selective_scripts')
<!-- CKEditor -->
{{-- <script src="{{ asset('js/ckeditor.min.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
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
                    <div class="card-header background-white border-0">
                        <div class="row mx-0">
                            <div class="col-md-8 px-0">
                                <div class="d-flex align-items-center pt-1">
                                    <img src="{{ asset('img/avatars/'.$creator->avatar.'.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
        
                                    <div class="ml-2">
                                        <span class="font-bold d-block font-large">{{ $ticket->summary }}</span>
                                        <span class="badge bg-info-bright text-info">{{ $status->description }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        {{-- TICKET DETAILS --}}
                        <div class="w-100">
                            <div class="text-secondary form-group">
                                {!! $ticket->content !!}
                            </div>

                            <div class="w-100 mini-attr-slot font-small text-secondary">
                                <div class="d-flex align-items-center">
                                    {{-- <span class="fal fa-clock mr-2"></span> --}}
                                    <span class="m-0">{{ $ticket->created_at->diffForhumans() }}</span>
                                </div>

                                <div class="d-flex align-items-center">
                                    {{-- <span class="fal fa-user mr-2"></span> --}}
                                    <span class="m-0">{{ $creator->first_name }} {{ $creator->last_name }}s</span>
                                </div>
                            </div>
                        </div>

                        <hr class="mb-3 mt-2">

                        <div class="w-100">
                            <div class="pt-0 pb-2">
                                <span class="font-bold">Comments:</span>
                            </div>

                            <div class="pb-1">
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
                                        <div class="w-100 mb-2">
                                            <div class="d-flex">
                                                <div class="px-0">
                                                    <img src="{{ asset('img/avatars/'.$comment->user()->avatar.'.png') }}" class="rounded-circle mr-2" alt="" srcset="" width="35px">
                                                </div>

                                                <div class="px-2 flex-fill">
                                                    <span class="text-dark d-block">{{ $comment->user()->first_name }} {{ $comment->user()->last_name }}</span>
                                                    <span class="text-secondary d-block">{!! $comment->comment !!}</span>
                                                    <span class="float-right d-block font-small pr-3 text-muted">{{ $comment->created_at->diffForhumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <form action="" method="post" class="px-2">
                                <div class="w-100 pt-2 form-group">
                                    <div class="mb-2">
                                        <label for="add_comment" class="col-form-label text-md-left">Add Comment <sup class="text-danger">*</sup></label>
                                        <textarea class="form-control form-control-sm" id="comment" rows="2" name="comment" value=""></textarea>
                                    </div>
                                </div>
                            </form>

                            <div class="w-100 pt-2 px-2">
                                <div class="mb-2 col-3 px-0">
                                    <button type="submit" id="post_comment" class="btn btn-success btn-sm w-100">Post Comment</button>
                                </div>
                            </div>
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
                            <div class="row mx-0">
                                <div class="col-4 px-0 pb-1">
                                    <span class="text-secondary font-bold">Type</span>
                                </div>
                                <div class="col-8 px-0 pb-1">
                                    <span class="text-secondary">{{ $ticketType->description }}</span>
                                </div>
                                <div class="col-8 offset-4 pb-1 px-0">
                                    <span class="text-info fas fa-bookmark mr-2"></span>
                                    <span class="text-secondary">{{ $status->description }}</span>
                                </div>

                                <div class="col-8 offset-4 pb-1 px-0">
                                    <span class="text-success fas fa-square mr-1"></span>
                                    @if ($ticket->priority == 1)
                                        <span class="text-secondary">Low Priority</span>
                                    @elseif ($ticket->priority == 2)
                                        <span class="text-secondary">Medium Priority</span>
                                    @else 
                                        <span class="text-secondary">High Priority</span>
                                    @endif
                                </div>

                                <div class="col-8 offset-4 pb-2 px-0">
                                    <span class="text-info fas fa-globe-africa mr-1"></span>
                                    <span class="text-secondary">{{ $region->region_name }} Region</span>
                                </div>

                                <div class="col-8 offset-4 pb-2 px-0">
                                    <div class="d-flex align-items-center">
                                        <div class="px-0 mr-3">
                                            <span class="fal fa-check-circle fa-3x text-success"></span>
                                        </div>
        
                                        <div class="flex-fill px-0">
                                            <span class="text-success d-block">{{ $slaStatus->status_description }}</span>
                                            <span class="text-success font-small d-block">12 Hours to SLA</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mx-0">
                                <div class="col-4 pb-1 px-0">
                                    <span class="text-secondary font-bold">Assigned:</span>
                                </div>
                                <div class="col-8 pb-2 px-0">
                                    <span class="text-secondary">{{ $assigned_to->first_name }} {{ $assigned_to->last_name }}</span>
                                    <span class="fad fa-question-square ml-2" data-toggle="tooltip" data-placement="bottom" title="Phone No: {{$assigned_to->msisdn }}"></span>
                                </div>

                                <div class="col-4 px-0 pb-1">
                                    <span class="text-secondary font-bold">Created by:</span>
                                </div>
                                <div class="col-8 px-0 pb-1">
                                    <span class="text-secondary">{{ $creator->first_name }} {{ $creator->last_name }}</span>
                                    <span class="fad fa-question-square ml-2" data-toggle="tooltip" data-placement="bottom" title="Phone No: {{ $creator->msisdn }}"></span>
                                </div>
                                <div class="col-8 px-0 offset-4 pb-1">
                                    
                                </div>
                            </div>

                            <hr>
                        </div>

                        <div class="card-header pt-0 background-white border-0">
                            <span class="font-normal">Task List</span>
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
    toastr.options = {
        timeOut: 30000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };

    $('#post_comment').click(function() {
        comment = $('#comment').val()

        if (comment == '' || comment == ' ') {
            toastr.error("Cannot post an empty comment", 'Success!', {timeOut: 5000})
        } else {

        }
    })
})
</script>
@endpush