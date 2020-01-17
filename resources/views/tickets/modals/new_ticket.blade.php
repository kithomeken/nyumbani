<div class="modal fade" id="newTicketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width: 800px">
        <div class="modal-content">
            <div class="modal-header py-2" style="background:  #abebc6 ">
                <h5 class="modal-title" id="exampleModalLabel">
                    <span class="fad fa-layer-plus mr-2"></span>
                    Create Ticket
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="get">
                <div class="modal-body px-3 py-2">
                    <div class="w-100 py-1 px-3">
                        @csrf

                        <div class="row ml-0 mr-0">
                            <div class="col-md-6">
                                <div class="mb-2 row">
                                    <label for="summary" class="col-md-12 col-form-label text-md-left">Ticket Summary <sup class="text-danger">*</sup></label>
                                    <div class="col-md-12">
                                        <input id="summary" type="text" class="form-control form-control-sm" name="summary" autofocus="" value="" required="">    
                                    </div>
                                </div>
            
                                <div class="mb-2 row justify-content-center px-3">
                                    <div class="col-md-6 px-0">
                                        <label for="type" class="col-form-label text-md-left">Ticket Type <sup class="text-danger">*</sup></label>
                                        <select class="form-control form-control-sm selection" value="" id="type" name="type" required="">
                                            <option selected="" value="" default="">Choose...</option>
                                            <option value="CRQ">Change Request</option>
                                            <option value="INC">Incidence</option>
                                            <option value="OTH">Other(s)</option>
                                        </select>
                                    </div>
            
                                    <div class="col-md-6 pr-0">
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

                                <div class="mb-2 row">
                                    <label for="agent" class="col-md-12 col-form-label text-md-left">Agent <sup class="text-danger">*</sup></label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-sm selection" id="agent" name="agent" required="">
                                            <option selected="" value="" default="">Choose...</option>                                        
                                            <option value="2">Hunter Solomon</option>
                                            <option value="3">Muneera Jud Issa</option>
                                            <option value="4">Shuang Yin</option>
                                            <option value="5">Chibuzo Nnamutaezinwa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-2 row">
                                    <label for="priority" class="col-md-12 col-form-label text-md-left">Priority <sup class="text-danger">*</sup></label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-sm selection" id="priority" name="priority" required="">
                                            <option selected="" value="0">Low Priority</option>
                                            <option value="1">Medium Priority</option>
                                            <option value="2">High Priority</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-2 row justify-content-center">
                                    <div class="col-md-12">
                                        <label for="description" class="col-form-label text-md-left">Ticket Content <sup class="text-danger">*</sup></label>
                                        <textarea class="form-control form-control-sm" id="description" rows="8" name="description" value=""></textarea>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-9">
                                        <div class="col-auto my-1">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                <label class="custom-control-label" for="customControlAutosizing">Create Another Ticket</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" id="create_btn" class="btn btn-success btn-sm">Create Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>


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