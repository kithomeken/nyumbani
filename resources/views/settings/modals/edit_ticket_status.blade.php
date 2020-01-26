<div class="modal fade" id="edit_status_modal" tabindex="-1" role="dialog" aria-labelledby="editTicketStatusModal" aria-hidden="true">    
    <div class="modal-dialog modal-sm" role="document" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success">Edit Ticket Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.editStatus') }}" method="post" class="w-100">
                <div class="modal-body border-0 pt-1">
                    @csrf

                    <div class="row ml-0 mr-0">
                        <div class="col-md-8">
                            <label for="estatus_code">Status ID</label>
                            <input type="text" name="estatus_code" id="estatus_code" class="form-control  @error('estatus_code') is-invalid @enderror form-control-sm" @error('estatus_code') value="{{ old('estatus_code') }}" @enderror readonly>

                            @error('estatus_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0 form-group">
                        <div class="col-md-12">
                            <label for="estatus_description" class="col-form-label text-md-right">{{ __('Status Description') }}  <sup class="text-danger">*</sup></label>
                            <input id="estatus_description" type="text" class="form-control @error('estatus_description') is-invalid @enderror form-control-sm" name="estatus_description" value="{{ old('estatus_description') }}" required autocomplete="off" autofocus>

                            @error('estatus_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="delete_status" id="delete_status">
                                <label class="custom-control-label" for="delete_status">Delete ticket status</label>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>