<div class="modal fade" id="escalate_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Esclation Matrix</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body border-0 pt-0">
                <form action="" method="post">
                    <p>Add users to the esclation matrix team...</p>

                    <div class="w-100">
                        <label for="all_users">Select User</label>
                        <select name="all_users" id="all_users" class="form-control selection w-75" required>
                            <option value="">Select User</option>
                        </select>
                    </div>

                    <hr>

                    <div class="w-100">
                        <div class="row ml-0 mr-0">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="e_designation">Designation</label>
                                <input type="text" name="e_designation" id="e_designation" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>