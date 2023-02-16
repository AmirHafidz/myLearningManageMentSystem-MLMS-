<div class="container py-3 px-0" style="min-height: 100vh">
    <div class="col-lg-12">
        <div class="row">
            {{-- SIDEBAR --}}
            @include('dashboard.sidebar')
            {{-- CONTENT --}}
            <div class="col-lg-9" data-aos="fade-down" data-aos-duration="1000">
                <div class="card rounded-0">
                    <div class="card-body" id="dashboard_post_container">
                        @include('dashboard.breadcrumb')
                        <hr class="hr">
                        @can('create_post')
                        <div class="card mb-3 rounded-0">
                            <div class="card-header my-first-web-color text-white">
                                <h3 class="fs-3 my-web-font-2 fw-bold">Add Post</h3>
                            </div>
                            <form action="" id="add_dashboard_post_form" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="admin_id" value="{{$user->id}}" hidden>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-5">
                                            <label for="" class="form-label my-web-font-2">Title <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="dashboard_post_title">
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <label for="" class="form-label my-web-font-2">Sub-Title <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="dashboard_post_sub_title">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="form-label my-web-font-2">Post</label>
                                            <textarea name="dashboard_post_content" id="" cols="30" rows="4" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex justify-content-start" id="this_post_all_file">
                                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddPostFile" this_post_type=1 type="button">
                                                        <i class="fa-solid fa-file"></i>
                                                        <div class="vr"></div>
                                                        <span>Add File</span>
                                                    </button>
                                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddPostFile" this_post_type=2 type="button">
                                                        <i class="fa-solid fa-image"></i>
                                                        <div class="vr"></div>
                                                        <span>Add Image</span>
                                                    </button>
                                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddPostFile" this_post_type=3 type="button">
                                                        <i class="fa-solid fa-video"></i>
                                                        <div class="vr"></div>
                                                        <span>Add Video</span>
                                                    </button>
                                                    <button class="btn btn-sm border-dark rounded-0 hstack gap-2 me-2 btnAddPostFile" this_post_type=4 type="button">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                        <div class="vr"></div>
                                                        <span>Others</span>
                                                    </button>
                                                </div>
                                                <div class="d-flex justify-content-start">
                                                    <button class="btn rounded-0 hstack gap-2 mybttn my-second-web-color text-white" type="submit" style="background-color:#F56F46">
                                                        <i class="fa-solid fa-paper-plane"></i>
                                                        <div class="vr"></div>
                                                        <span>Post</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="all_file_container" hidden>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-2" data-aos="fade-right" data-aos-duration="1000">
                <div class="card rounded-0">
                    <div class="card-body">
                        wecew
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    AOS.init();
</script>