<div class="modal fade" id="escalate_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success">Add Esclation Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.addToEscalation') }}" method="post" id="esclation_team_form" class="w-100">
                <div class="modal-body border-0 pt-0">
                    @csrf

                    <p>Add users to the esclation matrix team...</p>

                    <div class="w-100">
                        <label for="all_users">Select User</label>
                        <select name="all_users" id="all_users" class="form-control selection w-75" required>
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" data-email="{{ $user->email }}" data-msisdn="{{ $user->msisdn }}" data-designation="{{ $user->designation }}">
                                    {{ $user->first_name  }} {{ $user->other_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <hr>

                    <div class="w-100">
                        <div class="row ml-0 mr-0 form-group">
                            <div class="col-md-6">
                                <label for="email">E-mail Address</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="e_designation">Designation</label>
                                <input type="text" name="e_designation" id="e_designation" class="form-control form-control-sm" readonly>
                            </div>
                        </div>

                        <div class="row ml-0 mr-0">
                            <div class="col-md-12">
                                <label for="msisdn">Phone Number</label>
                                <input type="text" name="msisdn" id="msisdn" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Add to Esclation</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
$(document).ready(function() {
    $('#all_users').change(function() {
        user_id = $(this).val()

        email = $('#all_users option:selected').attr('data-email')
        msisdn = $('#all_users option:selected').attr('data-msisdn')
        designation = $('#all_users option:selected').attr('data-designation')

        $('#email').val(email)
        $('#msisdn').val(msisdn)
        $('#e_designation').val(designation)
    })
})
</script>
@endpush