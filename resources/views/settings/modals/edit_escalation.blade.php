<div class="modal fade" id="edit_escalation_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-success">Edit Esclation Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <form action="{{ route('settings.editEscalation') }}" method="post" id="edit_escalations_form" class="w-100">
                <div class="modal-body border-0 pt-0">
                    @csrf

                    <div class="row ml-0 mr-0">
                        <div class="col-md-12">
                            <label for="all_users">Escalation User</label>
                            <input type="text" name="escalation_user" id="escalation_user" class="form-control form-control-sm" readonly>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="w-100 form-group">
                        <div class="row ml-0 mr-0 form-group">
                            <div class="col-md-6">
                                <label for="edit_email">E-mail Address</label>
                                <input type="text" name="edit_email" id="edit_email" class="form-control form-control-sm" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="edit_designation">Designation</label>
                                <input type="text" name="edit_designation" id="edit_designation" class="form-control form-control-sm" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="w-100">
                        <div class="row ml-0 mr-0">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="delete_escalation" id="delete_escalation">
                                    <label class="custom-control-label" for="delete_escalation">Delete user from esclation team</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
