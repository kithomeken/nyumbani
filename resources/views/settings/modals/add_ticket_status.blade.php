<div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="ticketStatusModal" aria-hidden="true">    
    <div class="modal-dialog modal-sm" role="document" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success">Add Ticket Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.addStatus') }}" method="post" class="w-100">
                <div class="modal-body border-0 pt-1">
                    @csrf

                    <div class="w-100 px-2">
                        <p class="text-secondary">Define progress statuses for your tickets</p>
                        <hr>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-8">
                            <label for="status_code">Status ID</label>
                            <input type="text" name="status_code" id="status_code" class="form-control  @error('status_code') is-invalid @enderror form-control-sm" @error('status_code') value="{{ old('status_code') }}" @else value="{{ $status_code }}" @enderror readonly>

                            @error('status_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-12">
                            <label for="status_description" class="col-form-label text-md-right">{{ __('Status Description') }}  <sup class="text-danger">*</sup></label>
                            <input id="status_description" type="text" class="form-control @error('status_description') is-invalid @enderror form-control-sm" name="status_description" value="{{ old('status_description') }}" required autocomplete="off" autofocus>

                            @error('status_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success">Add Status</button>
                </div>
            </form>
        </div>
    </div>
</div>