@extends('layouts.app')

@section('title')
    <title>{{ config('app.name') }} Create Ticket</title>
@endsection

@section('content')
<div class="container-fluid">
    <div class="w-100 pl-3 py-1">
        <div class="w-100 pb-3">
            <h5 class="text-secondary">Create New Ticket</h5>
        </div>

        <div class="row ml-0 mr-0">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="ticket_summary" class="col-form-label text-md-left">Ticket Summary <sup class="text-danger">*</sup></label>
                    <input id="ticket_summary" type="text" class="form-control form-control-sm" name="ticket_summary" autofocus="" value="" required=""> 
                </div>

                <div class="form-group">
                    <div class="row ml-0 mr-0">
                        <div class="col-6 pl-0">
                            <label for="ticket_type" class="col-form-label text-md-left">Ticket Type <sup class="text-danger">*</sup></label>
                            <select class="form-control form-control-sm selection" value="" id="ticket_type" name="ticket_type" required="">
                                <option selected="" value="" default="">Choose...</option>
                                <option value="CRQ">Change Request</option>
                                <option value="INC">Incidence</option>
                                <option value="OTH">Other(s)</option>
                            </select>
                        </div>

                        <div class="col-6 pr-0">
                            <label for="region" class="col-form-label text-md-left">Region <sup class="text-danger">*</sup></label>
                            <select class="form-control form-control-sm selection" value="" id="region" name="region" required="">
                                <option selected="" value="" default="">Choose...</option>
                                <option value="2">Haryana</option>
                                <option value="1">Maniour</option>
                                <option value="3">Nagalnad</option>
                                <option value="4">Tripura</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row ml-0 mr-0">
                        <div class="col-6 pl-0">
                            <label for="agent" class="col-md-12 col-form-label text-md-left">Agent <sup class="text-danger">*</sup></label>
                            <select class="form-control form-control-sm selection" id="agent" name="agent" required="">
                                <option selected="" value="" default="">Choose...</option>                                        
                                <option value="2">Hunter Solomon</option>
                                <option value="3">Muneera Jud Issa</option>
                                <option value="4">Shuang Yin</option>
                                <option value="5">Chibuzo Nnamutaezinwa</option>
                            </select>
                        </div>

                        <div class="col-6 pr-0">
                            <label for="priority" class="col-md-12 col-form-label text-md-left">Priority <sup class="text-danger">*</sup></label>
                            <select class="form-control form-control-sm selection" id="priority" name="priority" required="">
                                <option selected="" value="0">Low Priority</option>
                                <option value="1">Medium Priority</option>
                                <option value="2">High Priority</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label text-md-left">Ticket Content <sup class="text-danger">*</sup></label>
                    <textarea class="form-control form-control-sm" id="description" rows="15" name="description" value=""></textarea>
                </div>

                <div class="col-auto mt-4">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="another_ticket">
                        <label class="custom-control-label" for="another_ticket">Create Another Ticket</label>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <div class="row ml-0 mr-0">
                        <div class="col-4 px-0">
                            <button type="submit" id="create_btn" class="btn btn-success btn-sm w-100">Create Ticket</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-5"></div>
        </div>
    </div>
</div>
@endsection