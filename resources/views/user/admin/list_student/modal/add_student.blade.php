<div class="modal modal-xl fade" id="add_student_Modal" tabindex="-1" aria-labelledby="add_student_ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="store_student_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <h3 class="fs-3">Add Student</h3>
                    <hr class="hr">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label for="new_student_name" class="form-label">Username <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="new_student_name" id="new_student_name" placeholder="Student's username">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Email<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Student's Email" aria-label="Recipient's username" aria-describedby="basic-addon2" name="new_student_email">
                                        <span class="input-group-text" id="basic-addon2">@mirha.com</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Password</label>
                                    <input type="text" class="form-control" value="password" readonly name="new_student_password">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Class</label>
                                    <select name="new_student_class" id="" class="form-control">
                                        <option value="1">Alpha</option>
                                        <option value="2">Beta</option>
                                        <option value="3">Gamma</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card card-body mb-3">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="" class="form-label">First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="new_student_first_name">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="form-label">Last Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="new_student_last_name">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="" class="form-label">Full Address <span class="text-danger">*</span></label>
                                        <textarea name="new_student_full_address" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="form-label">IC Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" maxlength="12" name="new_student_ic_number">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="form-label">Date Born</label>
                                        <input type="date" name="new_student_date_born" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="" class="form-label">Phone No.<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="new_student_phone_no">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="form-label">Photo<span class="text-danger">*</span></label>
                                        <input type="file" name="new_student_photo" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-light text-dark me-2" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-secondary text-light me-2" type="reset">Reset</button>
                        <button class="btn btn-dark text-light" type="submit">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>