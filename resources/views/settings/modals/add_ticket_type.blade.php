<div class="modal fade" id="ticket_type_modal" tabindex="-1" role="dialog" aria-labelledby="ticketTypeModal" aria-hidden="true">    
    <div class="modal-dialog modal-sm" role="document" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success"> Add Ticket Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.addType') }}" method="post" class="w-100">
                <div class="modal-body border-0 pt-1">
                    @csrf
                    <input type="hidden" name="system_defined" value="N">

                    <div class="w-100 px-2">
                        <p class="text-secondary">Create a new ticket type for your FTTH Operations</p>
                        <hr>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-8">
                            <label for="ticket_code">Ticket Type ID</label>
                            <input type="text" name="ticket_code" id="ticket_code" class="form-control  @error('ticket_code') is-invalid @enderror form-control-sm" @error('ticket_code') value="{{ old('ticket_code') }}" @else value="{{ $ticket_code }}" @enderror readonly>

                            @error('ticket_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-12">
                            <label for="ticket_description" class="col-form-label text-md-right">{{ __('Description') }}  <sup class="text-danger">*</sup></label>
                            <input id="ticket_description" type="text" class="form-control @error('ticket_description') is-invalid @enderror form-control-sm" name="ticket_description" value="{{ old('ticket_description') }}" required autocomplete="off" autofocus>

                            @error('ticket_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success">Add Type</button>
                </div>
            </form>
        </div>
    </div>
</div>