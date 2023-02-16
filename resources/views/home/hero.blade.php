<div class="container py-5" style="min-height: 100vh">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 ">
            <div class="card mb-3 shadow p-3 mb-5 bg-body-tertiary rounded"  data-aos="fade-right" data-aos-duration="2000">
                <div class="row g-0">
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="container p-3">
                                <h2 class="card-title">MLMS</h3>
                                <hr class="hr">
                                <form action="{{route('login')}}" class="mt-5" id="login_form" method="post">
                                    @csrf
                                    <div class="input-group input-group-md my-3">
                                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" class="form-control my-third-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Enter your email here ..." name="login_email">
                                    </div>
                                    <div class="input-group input-group-md mt-3">
                                        <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fa-solid fa-key"></i></span>
                                        <input type="password" class="form-control my-third-font" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Enter your password here ..." name="login_password">
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="d-flex align-items-center">
                                            <input type="checkbox" name="" id="" class="me-2">
                                            <span class="fs-6 fw-light"><i>remember me</i></span>
                                        </div>
                                        <div class="">
                                            <p class="fs-6 fw-lighter"><i>forgot password?</i></p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mb-0">
                                        <button class="btn btn-md btn-light me-2" type="reset">Reset</button>
                                        <button class="btn btn-md my-third-web-color my-btn-all text-white" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="d-flex justify-content-center">
                                <div class="col-md-6" data-aos="fade-down-right" data-aos-duration="3000">
                                    <img src="{{asset('images/bg/bg1.jpg')}}" class="img-fluid rounded-start" alt="..." style="height:250px">
                                </div>
                                <div class="col-md-6"  data-aos="fade-up-left" data-aos-duration="3000">
                                    <img src="{{asset('images/bg/bg2.jpg')}}" class="img-fluid rounded-start my-5" alt="..." style="height:250px">
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <img src="{{asset('images/bg/bg1.jpg')}}" class="img-fluid rounded-start" alt="..." style="height:400px">
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('images/bg/bg1.jpg')}}" class="img-fluid rounded-start" alt="..." style="height:400px">
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init()
</script>