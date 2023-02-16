<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_lecture_Modal">
    Launch demo modal
</button> --}}
  
  <!-- Modal -->
<div class="modal modal-xl modal-dialog-scrollable" id="add_lecture_Modal" tabindex="-1" aria-labelledby="add_lecture_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="fs-3">Add Lecture</h3>
                <hr class="hr">
                <form action="" id="add_lecture_form" enctype="multipart/form-data">
                    @csrf

                    <div hidden>
                        <label for="">Trainer ID</label>
                        <input type="text" value="{{$user->id}}" name="trainer_id">
                        <label for="">Class ID</label>
                        <input type="text" value="{{$my_class->id}}" name="class_id">
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label for="" class="form-label my-web-font-2 fw-bold">Title</label>
                                        <input type="text" class="form-control" name="lecture_title">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lecture_description_one" class="form-label my-web-font-2 fw-bold">Description One</label>
                                                    <textarea name="lecture_description_one" id="lecture_description_one" cols="30" rows="6" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lecture_description_two" class="form-label my-web-font-2 fw-bold">Description Two</label>
                                                    <textarea name="lecture_description_two" id="lecture_description_two" cols="30" rows="6" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-body">
                                    <button class="btn btn-dark text-white btn-sm my-3" id="btnAddFile" type="button">Add File</button>
                                    <table class="table table-bordered" id="table_add_file">
                                        <thead>
                                            <th class="my-web-font-2 fw-bold">#</th>
                                            <th class="my-web-font-2 fw-bold">File</th>
                                            <th class="my-web-font-2 fw-bold">Action</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                        <hr class="hr">


                    <div class="d-flex justify-content-end">
                        <button class="btn btn-light btn-sm text-dark" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn my-third-web-color rounded-0 hstack gap-2 btn-light text-light" type="submit">
                            <i class="fa-solid fa-paper-plane"></i>
                            <div class="vr"></div>
                            <span>Post</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>