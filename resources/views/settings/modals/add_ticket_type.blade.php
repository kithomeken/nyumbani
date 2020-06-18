<div class="modal fade" id="ticket_type_modal" tabindex="-1" role="dialog" aria-labelledby="ticketTypeModal" aria-hidden="true">    
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header border-0 pb-2">
                <h5 class="modal-title text-success px-3"> Add Ticket Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.addType') }}" method="post" class="w-100">
                <div class="modal-body border-0 pt-1">
                    @csrf
                    <input type="hidden" name="system_defined" value="N">

                    <div class="w-100 px-2">
                        <p class="text-dark mb-2 px-2">Create a new ticket type to help you manage your FTTH Operations</p>
                    </div>

                    <div class="row ml-0 mr-0 form-group">
                        <div class="col-md-4">
                            <label for="ticket_code">Ticket Type ID</label>
                            <input type="text" name="ticket_code" id="ticket_code" class="form-control  @error('ticket_code') is-invalid @enderror form-control-sm" @error('ticket_code') value="{{ old('ticket_code') }}" @else value="{{ $ticket_code }}" @enderror readonly>

                            @error('ticket_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-8 pl-0">
                            <label for="ticket_description">{{ __('Description') }}  <sup class="text-danger">*</sup></label>
                            <input id="ticket_description" type="text" class="form-control @error('ticket_description') is-invalid @enderror form-control-sm" name="ticket_description" value="{{ old('ticket_description') }}" required autocomplete="off" autofocus>

                            @error('ticket_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0 form-group">
                        <div class="col-md-5">
                            <label for="sla_label">{{ __('Time to Resolution') }}  <sup class="text-danger">*</sup></label>
                            <input id="sla_label" type="text" class="form-control @error('sla_label') is-invalid @enderror form-control-sm d-inline" name="sla_label" value="{{ old('sla_label') }}" required autocomplete="off" autofocus>
                            <label for="" class="text-dark ml-2 d-inline">Hours</label>

                            @error('sla_label')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mx-0 form-group">
                        <div class="col-8">
                            <div class="custom-control custom-checkbox pb-2">
                                <input type="checkbox" class="custom-control-input" id="non_compliance" value="1" name="non_compliance">
                                <label class="custom-control-label" for="non_compliance">
                                    Non Compliance Tickets
                                </label>
                                
                                <a data-toggle="tooltip" data-placement="right" title="Ticket that do not in any way affect existing clients. E.g. Fiber Rollouts">
                                    <div style="display: inline;">
                                        <span class="fas fa-question-circle text-info ml-1on"></span>
                                    </div>
                                </a>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="escalation_check" value="1" name="escalation_check">
                                <label class="custom-control-label" for="escalation_check">
                                    Add to Escalation Matrix
                                </label>
                                
                                <a data-toggle="tooltip" data-placement="right" title="When time to resolutions runs out and ticket is not closed/resolved, it will automatically be escalated for action">
                                    <div style="display: inline;">
                                        <span class="fas fa-question-circle text-info ml-1on"></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success ml-2" id="create_type">Create Ticket Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
$(document).ready(function() {
    $('#non_compliance').click(function() {
        if ($(this).prop("checked") == true) {
            $('#escalation_check').prop('disabled', true)
            $('#sla_label').attr('disabled', true)
        } else {
            $('#escalation_check').prop('disabled', false)
            $('#sla_label').attr('disabled', false)
        }
    })

    $('#sla_label').on('blur', function() {
        ttr = $(this).val()
        ttr = parseInt(ttr)

        if (!isNaN(ttr) && ttr.toString().indexOf('.') != -1) {
            toastr.warning("Accepted format is whole numbers only", {timeOut: 5000})
        } else {
            ttr = parseInt(ttr)

            if (ttr < 6) {
                toastr.warning("Time to resolution cannot be less than 6 Hours.", {timeOut: 5000})
                $(this).val('')
            } else if (ttr > 24) {
                toastr.warning("To maintain SLA Performance, time to resolution cannot be more than 24 Hours.", {timeOut: 5000})
                $(this).val('')
            }
        }
    })
})
</script>
@endpush