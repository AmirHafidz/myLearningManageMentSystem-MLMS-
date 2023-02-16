<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_course_forum_Modal">
    Launch demo modal
</button> --}}
  
  <!-- Modal -->
  <div class="modal modal-lg modal-dialog-scrollable" id="add_course_forum_Modal" tabindex="-1" aria-labelledby="add_course_forum_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="fs-3 my-web-font-2">Add Forum</h3>
                <hr class="hr">
                <form action="" id="add_course_forum_form" enctype="multipart/form-data">
                    @csrf
                    <div hidden>
                        <label for="" class="form-label my-web-font-2">Trainer ID</label>
                        <input type="text" value="{{$my_course->id}}" name="trainer_id">
    
                        <label for="" class="form-label my-web-font-2">Class ID</label>
                        <input type="text" value="{{$my_class->id}}" name="class_id">
    
                        <label for="">User ID</label>
                        <input type="text" value="{{$user->user->id}}" name="user_id">
                    </div>

                    <div class="card card-body">
                        <div class="form-group">
                            <label for="" class="form-label my-web-font-2 fw-bold">Title</label>
                            <input type="text" class="form-control" name="forum_title">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label my-web-font-2 fw-bold">Forum</label>
                            <textarea name="forum_content" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="card card-body my-3">
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-start" id="">
                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddForumFile" this_post_type=1 type="button">
                                        <i class="fa-solid fa-file"></i>
                                        <div class="vr"></div>
                                        <span>Add File</span>
                                    </button>
                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddForumFile" this_post_type=2 type="button">
                                        <i class="fa-solid fa-image"></i>
                                        <div class="vr"></div>
                                        <span>Add Image</span>
                                    </button>
                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddForumFile" this_post_type=3 type="button">
                                        <i class="fa-solid fa-video"></i>
                                        <div class="vr"></div>
                                        <span>Add Video</span>
                                    </button>
                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddForumFile" this_post_type=4 type="button">
                                        <i class="fa-solid fa-circle-info"></i>
                                        <div class="vr"></div>
                                        <span>Others</span>
                                    </button>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <button class="btn my-third-web-color rounded-0 hstack gap-2 btn-light text-light" type="submit">
                                        <i class="fa-solid fa-paper-plane"></i>
                                        <div class="vr"></div>
                                        <span>Post</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="all_forum_file" hidden>

                    </div>

                    {{-- <div class="d-flex justify-content-end">
                        <button class="btn btn-light btn-sm text-dark" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-dark btn-sm text-white" type="submit">Add</button>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>