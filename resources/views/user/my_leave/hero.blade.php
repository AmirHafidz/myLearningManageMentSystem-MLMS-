<div class="container py-3 px-0" style="min-height: 100vh">
    <div class="col-lg-12">
        <div class="row">
            {{-- CONTENT --}}
            {{-- <div class="col-lg-2"></div> --}}
            <form action="" id="apply_leave_form" enctype="multipart/form-data">
                @csrf
                <div class="card card-body shadow p-3 mb-5 bg-body rounded">
                    <h3 class="fs-3" style="color:#5c658d">Apply Leave</h3>
                    <input type="text" value="{{$user->user->id}}" name="leave_user_id" hidden>
                    <hr class="hr">
                    <div class="row">
                        <div class="col-lg-8" data-aos="fade-down" data-aos-duration="1000">
                            <div class="card card-body mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Title (Reason Leave) <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="leave_title">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Date Start <span class="text-danger">*</span> </label>
                                            <input type="date" class="form-control" name="leave_start_date">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="" class="form-label">Date End <span class="text-danger">*</span> </label>
                                            <input type="date" class="form-control" name="leave_end_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-body mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Description</label>
                                        <textarea name="leave_description_one" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Description</label>
                                        <textarea name="leave_description_two" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-body mb-3">
                                <label for="" class="form-label">Add Support File</label>
                                <div class="form-group mb-3">
                                    <button class="btn my-third-web-color text-white btn-sm my-btn-all hstack gap-1" id="add_row_support_file" type="button">
                                        <i class="fa-solid fa-plus"></i>
                                        <div class="vr"></div>
                                        <span>Add Row</span>
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="table_add_support_file">
                                        <thead class="table text-white my-first-web-color">
                                            <th>#</th>
                                            <th class="text-center">File</th>
                                            <th class="text-center">Actions</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="">
                                    <input type="file" name="my_dropi" id="" class="dropify">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm btn-light text-dark me-1" onclick="history.back()" id="leave_back">Back</button>
                        <button class="btn btn-sm btn-light text-dark me-1" type="reset">Reset</button>
                        <button class="btn btn-sm text-light my-third-web-color hstack gap-1 my-btn-all" type="submit">
                            <i class="fa-solid fa-paper-plane"></i>
                            <div class="vr"></div>
                            <span>Apply</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>