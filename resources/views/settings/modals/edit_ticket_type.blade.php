<div class="modal fade" id="edit_type_modal" tabindex="-1" role="dialog" aria-labelledby="ticketTypeModal" aria-hidden="true">    
    <div class="modal-dialog modal-sm" role="document" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success">Edit Ticket Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.editType') }}" method="post" class="w-100">
                <div class="modal-body border-0 pt-1">
                    @csrf

                    <div class="row ml-0 mr-0">
                        <div class="col-md-8">
                            <label for="eticket_code">Ticket Type ID</label>
                            <input type="text" name="eticket_code" id="eticket_code" class="form-control  @error('eticket_code') is-invalid @enderror form-control-sm" @error('eticket_code') value="{{ old('eticket_code') }}" @enderror readonly>

                            @error('eticket_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0 form-group">
                        <div class="col-md-12">
                            <label for="eticket_description" class="col-form-label text-md-right">{{ __('Description') }}  <sup class="text-danger">*</sup></label>
                            <input id="eticket_description" type="text" class="form-control @error('eticket_description') is-invalid @enderror form-control-sm" name="eticket_description" value="{{ old('eticket_description') }}" required autocomplete="off" autofocus>

                            @error('eticket_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="delete_type" id="delete_type">
                                <label class="custom-control-label" for="delete_type">Delete ticket type</label>
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