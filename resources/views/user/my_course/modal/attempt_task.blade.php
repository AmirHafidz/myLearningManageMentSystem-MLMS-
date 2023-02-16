<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#attempt_task_Modal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
<div class="modal modal-lg fade" id="attempt_task_Modal" tabindex="-1" aria-labelledby="attempt_task_ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <h3 class="fs-3">Attempt Task</h3>
          <hr class="hr">
          <form action="" id="attempt_task_form">
              @csrf
              <input type="text" name="attempt_task_id" id="attempt_task_id">
              <input type="text" name="attempt_user_id" id="attempt_task_user">
              <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body rounded-0 my-second-web-color">
                                <div class="form-group">
                                    <label for="" class="form-label fs-6 fw-bold">Title<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control rounded-0" name="attempt_task_title">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label fs-6 fw-bold">Description</label>
                                    <textarea name="attempt_task_description" id="" cols="30" rows="6" class="form-control rounded-0"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                          <div class="card-body rounded-0 my-second-web-color">
                                  <div>
                                      <button class="btn btn-dark text-white btn-sm mb-3 w-auto" id="btnAddRowAttemptFile" type="button">
                                          Add File
                                      </button>
                                  </div>
                                  <div class="table-responsive">
                                        <table class="table w-auto text-nowrap table-bordered table-sm border-dark" id="table_add_attempt_files" style="overflow-x: auto">
                                            <thead>
                                                <th style="">#</th>
                                                <th style="width:500px">Name</th>
                                                <th style="width:500px">File</th>
                                            </thead>
                                            <tbody style="overflow-x: auto">
                                            </tbody>
                                        </table>
                                  </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <hr class="hr">
              <div class="d-flex justify-content-end">
                <button class="btn btn-light text-dark btn-sm me-1" type="button">Cancel</button>
                <button class="btn btn-dark text-white btn-sm" type="submit">Submit</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>