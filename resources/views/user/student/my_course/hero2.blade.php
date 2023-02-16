<div class="container py-5" style="min-height: 100vh">
    <div class="col-lg-12" style="">
        <div class="row">
            {{-- SIDEBAR --}}
            <div class="col-lg-3" data-aos="fade-up" data-aos-duration="1000">
                <ul class="list-group rounded-0">
                    <li class="list-group-item my-third-web-color">
                        <p class="fs-5 m-0 text-white">
                            Welcome,
                        </p>
                        <h2 class="fs-2 mt-0 text-white">
                            {{-- {{$user->user->name}} --}}
                        </h2>
                        <p class="fs-6 text-white fw-lighter m-0">
                            {{-- Class:  {{$user->master_class->name}} --}}
                        </p>
                        <p class="fs-6 text-white fw-lighter m-0">
                            Student ID: 3402123
                        </p>
                    </li>
                    <li class="list-group-item fw-bold my-1">Dashboard</li>
                    <li class="list-group-item fw-bold my-1"><a href="" class="nav-link">My Courses</a></li>
                    <li class="list-group-item fw-bold my-1">Application</li>
                    <li class="list-group-item fw-bold my-1">A fourth item</li>
                    <li class="list-group-item fw-bold my-1">And a fifth one</li>
                </ul>
            </div>
            {{-- MAIN CONTENT --}}

            
            <div class="col-lg-9">
                <h3 class="title-heading">Course UX10981</h3>
                <ul class="nav nav-pills m-0 fs-6 p-0">
                    <li class="nav-item nav-item-sm sm">
                      <a class="nav-link active" aria-current="page" data-toggle="tab" href="#home">Forum</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu1">Lecture</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu2">Task</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu3">Disabled</a>
                    </li>
                  </ul>
                  {{-- <hr class="hr m-0 p-0"> --}}
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active my-3">
                        @include('user.student.my_course.tab1')
                    </div>
                    <div id="menu1" class="tab-pane fade my-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    MENU 1
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade my-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    haihahi
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>