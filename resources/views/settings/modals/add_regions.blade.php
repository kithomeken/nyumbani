<div class="modal fade" id="region_modal" tabindex="-1" role="dialog" aria-labelledby="regionModal" aria-hidden="true">    
    <div class="modal-dialog modal-sm" role="document" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success">Add FTTH Region</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.addRegion') }}" method="post" class="w-100">
                <div class="modal-body border-0 pt-1">
                    @csrf

                    <div class="w-100 px-2">
                        <p class="text-secondary">Add a region to base your operations</p>
                        <hr>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-8">
                            <label for="region_code">Region ID</label>
                            <input type="text" name="region_code" id="region_code" class="form-control  @error('region_code') is-invalid @enderror form-control-sm" @error('region_code') value="{{ old('region_code') }}" @else value="{{ $region_code }}" @enderror readonly>

                            @error('region_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row ml-0 mr-0">
                        <div class="col-md-12">
                            <label for="region_name" class="col-form-label text-md-right">{{ __('Region Name') }}  <sup class="text-danger">*</sup></label>
                            <input id="region_name" type="text" class="form-control @error('region_name') is-invalid @enderror form-control-sm" name="region_name" value="{{ old('region_name') }}" required autocomplete="off" autofocus>

                            @error('region_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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