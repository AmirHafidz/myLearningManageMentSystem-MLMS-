<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#view_submitted_Modal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal modal-lg fade" id="view_submitted_Modal" tabindex="-1" aria-labelledby="view_submitted_ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="view_submitted_ModalLabel">Student's Attempt</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Student's Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Task's Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                          <div class="form-group">
                              <label for="" class="form-label">Title</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="" class="form-label">Description</label>
                              <textarea name="" id="" cols="30" rows="4" class="form-control"></textarea>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <label for="" class="form-label">File Submitted</label>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>#</th>
                                        <th>File</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <td>1</td>
                                          <td style="width:500px"> <a href="" class="w-auto">somethingwritten.htmlwecwecwecwecwcwecwewcwcwecwe</a> </td>
                                          <td class="text-center">
                                              <button class="btn btn-success btn-sm">View</button>
                                          </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Approve</button>
      </div>
    </div>
  </div>
</div>