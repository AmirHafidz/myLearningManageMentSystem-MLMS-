{{-- @foreach ($user->master_course->list_class as $l)
    <span>{{$l->name}}</span>
@endforeach

<h1>{{$user->master_course->name}}</h1> --}}

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
                </ul>
            </div>
            {{-- MAIN CONTENT --}}

            {{-- FFFEF4 --}}
            <div class="col-lg-9">
                <div class="container p-1 mb-3 d-flex justify-content-between rounded-3 shadow" style="background-color: #FFFEF4">
                    <h3 class="title-heading">{{$user->master_course->name}}</h3>
                    <p class="fs-5 fw-light">Class : {{$my_class->name}}</p>
                </div>
                <ul class="nav nav-pills m-0 fs-6 p-0 w-100">
                    <li class="nav-item nav-item-sm sm w-20 my-nav-tab">
                      <a class="nav-link active rounded-0 my-third-web-color my-nav-tab" data-toggle="tab" href="#home" style="width:150px;" role="tab" aria-current="page">Forum</a>
                    </li>
                    <li class="nav-item w-20 my-nav-tab">
                      <a class="nav-link rounded-0 my-third-web-color" data-toggle="tab" href="#menu1" style="width:150px" role="tab">Lecture</a>
                    </li>
                    <li class="nav-item w-20">
                      <a class="nav-link rounded-0" data-toggle="tab" href="#menu2" style="width:150px" role="tab">Task</a>
                    </li>
                    <li class="nav-item w-20">
                      <a class="nav-link rounded-0" data-toggle="tab" href="#menu3" style="width:150px" role="tab">Disabled</a>
                    </li>
                </ul>
                  {{-- <hr class="hr m-0 p-0"> --}}
                <div class="tab-content">
                    <div id="home" class="tab-pane active my-3 fade-in">
                        <div class="card rounded-0" style="background-color: #FFFEF4">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    @include('user.trainer.enter_course.home.home_tab')
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade my-3">
                        <div class="card rounded-0" style="background-color: #FFFEF4">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    @include('user.trainer.enter_course.lecture.lecture_tab')
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade my-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    @include('user.trainer.enter_course.task.index')
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