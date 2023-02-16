{{-- @foreach ($user->master_course->list_class as $l)
    <span>{{$l->name}}</span>
@endforeach

<h1>{{$user->master_course->name}}</h1> --}}

{{-- {{$routeName}} --}}

<div class="container py-5" style="min-height: 100vh">
    <div class="col-lg-12" style="">
        <div class="row">
            {{-- SIDEBAR --}}
            {{-- <div class="col-lg-3" data-aos="fade-up" data-aos-duration="1000">
                <ul class="list-group rounded-0">
                    <li class="list-group-item my-third-web-color">
                        <p class="fs-5 m-0 text-white">
                            Welcome,
                        </p>
                        <h2 class="fs-2 mt-0 text-white">
                            <?php $user->user == null ? $user->name : $user->user->name ?>
                        </h2>
                        <p class="fs-6 text-white fw-lighter m-0">
                        </p>
                        <p class="fs-6 text-white fw-lighter m-0">
                            Student ID: 3402123
                        </p>
                    </li>
                    <i class="fa-regular fa-grid-horizontal"></i>
                    <li class="list-group-item fw-bold my-1 {{$routeName == 'user.dashboard' ? 'my-first-web-color' : ''}}">
                        <a href="{{route('user.dashboard')}}" style="text-decoration: none" class="nav-link">
                            <span class="align-middle fs-5 {{$routeName == 'user.dashboard' ? 'text-white' : ''}}"><i class='bx bxs-dashboard'></i>Dashboard</span>
                        </a>
                    </li>
                    @can('trainer_class')
                        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.class'||'user.enter_course' ? 'my-first-web-color' : ''}}">
                            <a href="{{route('user.class')}}" class="nav-link"><span class="fs-5 {{$routeName == 'user.class'||'user.enter_course' ? 'text-white' : ''}}"><i class='bx bx-clipboard'></i> My Class</span>
                            </a></li>
                    @endcan
                    @can('student_course')
                        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.class'||'user.enter_course' ? 'my-first-web-color' : ''}}"><a href="{{route('user.class')}}" class="nav-link"><span class="fs-5"><i class='bx bx-clipboard'></i> My Courses</span></li>
                    @endcan
                    <li class="list-group-item fw-bold my-1"><a href="{{route('user.my_detail')}}" class="nav-link"><span class="fs-5"><i class='bx bxs-user-circle'></i> My Detail<span></a></li>
                    @can('apply_leave')
                        <li class="list-group-item fw-bold my-1" data-bs-toggle="collapse" href="#applicationCollapse" aria-expanded="false" aria-controls="applicationCollapse" style="cursor:pointer"><span class="fs-5"><i class='bx bx-archive'></i> Application</span>
                        </li>
                        <div class="collapse ms-5 mt-0 bg-dark text-white rounded-0" id="applicationCollapse">
                            <div class="list-group bg-dark-text-white mt-0 rounded-0">
                                <a href="{{route('leave.index')}}" class="list-group-item list-group-item-action bg-dark text-white rounded-0" aria-current="true">
                                    Apply Leave
                                </a>
                            </div>
                        </div>
                    @endcan
                    @can('response_leave')
                        <li class="list-group-item fw-bold my-1" data-bs-toggle="collapse" href="#responseapplicationCollapse" aria-expanded="false" aria-controls="responseapplicationCollapse" style="cursor:pointer"><span class="fs-5"><i class='bx bx-archive'></i> Application</span>
                        </li>
                        <div class="collapse ms-5 mt-0 bg-dark text-white rounded-0" id="responseapplicationCollapse">
                            <div class="list-group bg-light mt-0 rounded-0">
                                <a href="{{route('admin.list_leave_index')}}" class="list-group-item list-group-item-action rounded-0" aria-current="true">
                                    List Leave Application
                                </a>
                            </div>
                        </div>
                    @endcan
                    @can('list_user')
                        <li class="list-group-item fw-bold my-1" data-bs-toggle="collapse" href="#listUserCollapse" aria-expanded="false" aria-controls="listUserCollapse" style="cursor:pointer"><span class="fs-5"><i class='bx bx-archive'></i> List User</span></li>
                        <div class="collapse ms-5 mt-0 rounded-0" id="listUserCollapse">
                            <div class="list-group bg-light mt-0 rounded-0 my-1 p-2">
                                <a href="{{route('admin.list_user_index')}}" class="nav-link"><span class="fs-5"> All Users<span></a>
                            </div>
                            <div class="list-group bg-light mt-0 rounded-0 my-1 p-2">
                                <a href="{{route('admin.list_student_index')}}" class="nav-link"><span class="fs-5"> All Students<span></a>
                            </div>
                        </div>
                    @endcan
                    <li class="list-group-item fw-bold my-1">
                        <a href="{{route('admin.view_certificate')}}" class="nav-link"><span class="fs-5">Generate Certificate</span></a>
                    </li>
                </ul>
            </div> --}}
            @include('dashboard.sidebar')
            {{-- MAIN CONTENT --}}

            {{-- FFFEF4 --}}
            <div class="col-lg-9">
                <div class="container p-3 mb-3 d-flex justify-content-between rounded-3 shadow my-first-web-color">
                    <h3 class="title-heading text-white">{{$my_course->name}}</h3>
                    <p class="fs-5 fw-light text-white">Class : {{$my_class->name}}</p>
                </div>
                <ul class="nav nav-pills m-0 fs-6 p-0 w-100">
                    <li class="nav-item nav-item-sm sm w-20">
                      <a class="nav-link rounded-0 active" aria-current="page" data-toggle="tab" href="#home" style="width:150px">Forum</a>
                    </li>
                    <li class="nav-item w-20">
                      <a class="nav-link rounded-0" data-toggle="tab" href="#menu1" style="width:150px">Lecture</a>
                    </li>
                    <li class="nav-item w-20">
                      <a class="nav-link rounded-0" data-toggle="tab" href="#menu2" style="width:150px">Task</a>
                    </li>
                    <li class="nav-item w-20">
                        @if ($user->user->role_id == 2)
                            <a class="nav-link rounded-0" data-toggle="tab" href="#menu3" style="width:150px">Task Submitted</a>
                        @else
                            <a class="nav-link rounded-0" data-toggle="tab" href="#menu3" style="width:150px">My Task</a>
                        @endif
                    </li>
                </ul>
                  {{-- <hr class="hr m-0 p-0"> --}}
                <div class="tab-content">
                    <div id="home" class="tab-pane active my-3">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    @include('user.my_course.home.forum_tab')
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade my-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    @include('user.my_course.lecture.lecture_tab')
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade my-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    @include('user.my_course.task.index')
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div id="menu3" class="tab-pane fade my-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fs-6 fw-light">
                                    @include('user.my_course.task_submitted.index')
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