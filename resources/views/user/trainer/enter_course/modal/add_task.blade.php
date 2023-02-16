  
  <!-- Modal -->
  <div class="modal modal-xl modal-dialog-scrollable" id="add_task_Modal" tabindex="-1" aria-labelledby="add_task_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="fs-3">Add Task</h3>
                {{-- <button class="btn btn-dark" disabled>Add Task</button> --}}
                <hr class="hr">
                <form action="" id="add_task_form" enctype="multipart/form-data">
                    @csrf

                    {{-- <label for="">Trainer ID</label> --}}
                    <input type="text" value="{{$user->id}}" hidden name="task_trainer_id">

                    {{-- <label for="">Class ID</label> --}}
                    <input type="text" value="{{$my_class->id}}" hidden name="task_class_id">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card p-3 mb-3 shadow p-3 rounded-0 my-second-web-color">
                                    <label for="" class="form-label fs-6 fw-bold">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-0" name="task_title">
                                </div>
                                <div class="card p-3 mb-3 shadow p-3 rounded-0 my-second-web-color">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label fs-6 fw-bold">Date Start</label>
                                                    <input type="date" class="form-control rounded-0" name="task_date_start">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label fs-6 fw-bold">Date End</label>
                                                    <input type="date" class="form-control rounded-0" name="task_date_end">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label fs-6 fw-bold">Time Start</label>
                                                    <input type="time" class="form-control rounded-0" name="task_time_start">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="form-label fs-6 fw-bold">Time End</label>
                                                    <input type="time" class="form-control rounded-0" name="task_time_end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-3 shadow p-3 rounded-0 my-second-web-color">
                                    <div class="mb-2">
                                        <button class="btn btn-dark btn-sm text-white w-auto hstack gap-2" id="btnAddRowFileTask" type="button">
                                            <span>Add Row</span>
                                            <div class="vr"></div>
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table w-auto text-nowrap table-bordered" style="overflow-x:auto;" id="table_add_file_task">
                                            <thead>
                                                <th style="width:500px">#</th>
                                                <th style="width:500px">File Name</th>
                                                <th style="width:500px">Type File</th>
                                                <th style="width:500px" class="text-center">Action</th>
                                            </thead>
                                            <tbody style="overflow-x:auto;">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow p-3 rounded-0 my-second-web-color">
                                    <div class="col-md-12 mb-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="task_description_one" class="form-label fs-5 fw-bold">Description One</label>
                                                    <textarea name="task_description_one" id="task_description_one" cols="30" rows="6" class="form-control rounded-0"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="task_description_two" class="form-label fs-5 fw-bold">Description Two</label>
                                                    <textarea name="task_description_two" id="task_description_two" cols="30" rows="6" class="form-control rounded-0"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-light btn-sm text-dark" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-dark btn-sm text-white" type="submit">Adding</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>