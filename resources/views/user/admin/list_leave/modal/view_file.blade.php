<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view_leave_file_Modal">
    Launch demo modal
</button> --}}
  
  <!-- Modal -->
<div class="modal modal-lg fade" id="view_leave_file_Modal" tabindex="-1" aria-labelledby="view_leave_file_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="fs-5">View Detail</h5>
                <hr class="hr">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <input type="text" id="this_leave_id" hidden>
                            <div class="form-group">
                                <label for="" class="form-label">Applicant's Name</label>
                                <input type="text" class="form-control" id="leave_detail_user">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Description</label>
                                <textarea name="" id="leave_detail_description" cols="30" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-body mb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Date Start</label>
                                        <input type="text" class="form-control" id="leave_detail_start_date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Date End</label>
                                        <input type="text" class="form-control" id="leave_detail_end_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-body">
                            <label for="" class="form-label">File Support</label>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-sm" id="table_view_support_file">
                                    <thead>
                                        <th>#</th>
                                        <th>File</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody id="tbody_table_view_support_file">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-sm btnResponseLeave" response_leave=3>Reject</button>
                <button type="button" class="btn btn-success btn-sm btnResponseLeave" response_leave=2>Approve</button>
            </div>
        </div>
    </div>
</div>