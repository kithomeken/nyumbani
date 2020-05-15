@extends('layouts.app')

@section('title')
    <title>{{ config('app.name') }} Create Ticket</title>
@endsection

@push('pre_load')
<script>
    $("#ticket_icon").addClass("active");
</script>
@endpush

@section('content')
<div class="container-fluid  network-art right-cover-image">
    <div class="w-100 pl-0 py-1">
        <div class="w-100 pb-3">
            <h6 class="text-secondary mb-0">
                <span class="fal fa-ticket-alt ticket-rotate mr-1"></span> Tickets
                <span class="font-small">
                    <span class="fal fa-chevron-right mx-2"></span>
                </span>
                Create New Ticket
            </h5>
        </div>

        <div class="row mx-0">
            <div class="col-7 pl-0">
                <div class="card border-0 shadow-wd mb-4">
                    <div class="card-header background-white border-0">
                        <p class="text-secondary mb-0 font-large py-2"><span class="fal fa-poll mr-1 text-secondary"></span> Create New Ticket</p>
                    </div>

                    <div class="card-body pt-0">
                        <form action="{{ route('ticket.createTicket') }}" method="post">
                            @csrf

                            <div class="mb-2">
                                <label for="ticket_summary" class="col-form-label text-md-left">Ticket Summary <sup class="text-danger">*</sup></label>
                                <input id="ticket_summary" type="text" class="form-control form-control-sm" name="ticket_summary" autofocus="" value="" required=""> 
                            </div>

                            <div class="mb-2">
                                <div class="row ml-0 mr-0">
                                    <div class="col-6 pl-0">
                                        <label for="ticket_type" class="col-form-label text-md-left">Ticket Type <sup class="text-danger">*</sup></label>
                                        <select class="form-control form-control-sm selection" value="" id="ticket_type" name="ticket_type" required="">
                                            <option selected="" value="" default="">Choose...</option>

                                            @foreach ($ticketTypes as $type)
                                                <option value="{{ $type->ticket_code }}">{{ $type->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="col-6 pr-0">
                                        <label for="region" class="col-form-label text-md-left">Region <sup class="text-danger">*</sup></label>
                                        <select class="form-control form-control-sm selection" value="" id="region" name="region" required="">
                                            <option selected="" value="" default="">Choose...</option>

                                            @foreach ($regions as $region)
                                                <option value="{{ $region->region_code }}">{{ $region->region_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="row ml-0 mr-0">
                                    <div class="col-6 pl-0">
                                        <label for="agent" class="col-md-12 px-0 col-form-label text-md-left">Agent <sup class="text-danger">*</sup></label>
                                        <select class="form-control form-control-sm selection" id="agent" name="agent" required="">
                                            <option selected="" value="" default="">Choose...</option>

                                            @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->first_name }} {{ $agent->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                    <div class="col-6 pr-0">
                                        <label for="priority" class="col-md-12 px-0 col-form-label text-md-left">Priority <sup class="text-danger">*</sup></label>
                                        <select class="form-control form-control-sm selection" id="priority" name="priority" required="">
                                            <option selected="" value="0">Low Priority</option>
                                            <option value="1">Medium Priority</option>
                                            <option value="2">High Priority</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="description" class="col-form-label text-md-left">Ticket Content <sup class="text-danger">*</sup></label>
                                <textarea class="form-control form-control-sm" id="description" rows="15" name="description" value=""></textarea>
                            </div>
            
                            <div class="col-auto mt-3">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" name="create-another" id="another_ticket" value="Y">
                                    <label class="custom-control-label" for="another_ticket">Create Another</label>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <div class="row ml-0 mr-0">
                                    <div class="col-4 px-0">
                                        <button type="submit" id="create_btn" class="btn btn-success btn-sm w-100">Create Ticket</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-5 px-0">
                
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    CKEDITOR.replace( 'description', {
        uiColor: '#75D19C'
    });

    CKEDITOR.config.toolbar = [
        [
            'Bold','Italic', 'Paste',
        ],
    ];
</script>
@endpush