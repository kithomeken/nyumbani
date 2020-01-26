<div class="modal fade" id="edit_region_modal" tabindex="-1" role="dialog" aria-labelledby="regionModal" aria-hidden="true">    
    <div class="modal-dialog modal-sm" role="document" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success">Edit FTTH Region</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.editRegion') }}" method="post" class="w-100">
                <div class="modal-body border-0 pt-1">
                    @csrf

                    <div class="row ml-0 mr-0">
                        <div class="col-md-8">
                            <label for="eregion_code">Region ID</label>
                            <input type="text" name="eregion_code" id="eregion_code" class="form-control  @error('eregion_code') is-invalid @enderror form-control-sm" @error('eregion_code') value="{{ old('eregion_code') }}" @enderror readonly>

                            @error('eregion_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0 form-group">
                        <div class="col-md-12">
                            <label for="eregion_name" class="col-form-label text-md-right">{{ __('Region Name') }}  <sup class="text-danger">*</sup></label>
                            <input id="eregion_name" type="text" class="form-control @error('eregion_name') is-invalid @enderror form-control-sm" name="eregion_name" value="{{ old('eregion_name') }}" required autocomplete="off" autofocus>

                            @error('eregion_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0 form-group">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="completed" id="completed">
                                <label class="custom-control-label" for="completed">Mark region as complete</label>
                            </div>
                        </div>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="delete_region" id="delete_region">
                                <label class="custom-control-label" for="delete_region">Delete region</label>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success">Add Region</button>
                </div>
            </form>
        </div>
    </div>
</div>