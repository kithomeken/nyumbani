<div class="modal fade" id="edit_account_modal" tabindex="-1" role="dialog" aria-labelledby="editAccountModal" aria-hidden="true">    
    <div class="modal-dialog modal-dialog-slideout modal-md" role="document" style="width: 350px;">
        <div class="modal-content vh-100">
            <div class="modal-header">
                <h5 class="modal-title text-success mb-0">Change Account Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Update your account personal information.</p>

                <div class="w-100 px-3">
                    <div class="pb-2">
                        <label for="name" class="col-form-label text-md-right">{{ __('First Name') }}</label>

                        <input id="name" type="text" class="form-control single-line-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ Auth::user()->first_name }}" required autocomplete="name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pb-2">
                        <label for="name" class="col-form-label text-md-right">{{ __('Middle Name') }}</label>

                        <input id="name" type="text" class="form-control single-line-control @error('other_name') is-invalid @enderror" name="other_name" value="{{ Auth::user()->other_name }}" autocomplete="name">

                        @error('other_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pb-2">
                        <label for="name" class="col-form-label text-md-right">{{ __('Last Name') }}</label>

                        <input id="name" type="text" class="form-control single-line-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ Auth::user()->last_name }}" required autocomplete="name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pb-2">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control single-line-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="pb-2">
                        <label for="name" class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <input id="name" type="text" class="form-control single-line-control @error('msisdn') is-invalid @enderror" name="msisdn" value="{{ Auth::user()->msisdn }}" required autocomplete="msisdn">

                        @error('msisdn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-success ml-2" id="create_type">Update Details</button>
            </div>
        </div>
    </div>
</div>