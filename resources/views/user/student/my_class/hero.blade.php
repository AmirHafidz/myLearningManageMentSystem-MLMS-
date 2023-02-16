

<div class="container py-3 px-0" style="min-height: 100vh">
    <div class="col-lg-12" style="">
        @include('user.student.my_class.breadcrumb')
        <div class="row">
            {{-- SIDEBAR --}}
            <div class="col-lg-3" data-aos="fade-up" data-aos-duration="1000">
                <ul class="list-group rounded-0">
                    <li class="list-group-item my-third-web-color">
                        <p class="fs-5 m-0 text-white">
                            Welcome,
                        </p>
                        <h2 class="fs-2 mt-0 text-white">
                            <?php $user->user == null ? $user->name : $user->user->name ?>
                            {{-- {{$user->user->name}} --}}
                        </h2>
                        <p class="fs-6 text-white fw-lighter m-0">
                            {{-- Class:  {{$user->master_class->name}} --}}
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
                        <li class="list-group-item fw-bold my-1">
                            <a href="{{route('user.class')}}" class="nav-link"><span class="fs-5"><i class='bx bx-clipboard'></i> My Class</span>
                            </a></li>
                    @endcan
                    @can('student_course')
                        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.class' ? 'my-first-web-color' : ''}}"><a href="{{route('user.class')}}" class="nav-link"><span class="fs-5 {{$routeName == 'user.class' ? 'text-white' : ''}}"><i class='bx bx-clipboard'></i> My Courses</span></li>
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
            </div>
            {{-- MAIN CONTENT --}}
            {{-- MY COURSE --}}
            <div class="col-lg-9 mb-1">

                <div class="card m-0 rounded-0 mb-1">
                    <div class="d-flex justify-content-start m-0 p-1">
                        <h4 class="fs-4 my-user-font-1 px-3 text-uppercase">
                            {{$user->master_class->name}}
                        </h4>
                    </div>
                </div>

                <div class="">
                    <h5 class="fs-5 fw-light px-3 my-3">My Course</h5>
                    <div class="d-flex justify-content-between m-0 p-0" data-aos="fade-left" data-aos-duration="1000">
                        @foreach ($all_course as $course)
                        <div class="m-0 p-0 overflow-hidden">                      
                            <div class="card mx-1" style="width: 21rem;">
                                <img src="{{asset('images/course/'.$course->course_photo)}}" class="card-img-top p-0 rounded-0" alt="..." style="height: 150px; ">
                                <div class="card-body m-0">
                                    <h5 class="card-title text-decoration-underline">{{$course->course_name}}</h5>
                                    <div class="hstack gap-1">
                                        <p class="card-text my-0">{{$course->course_day}}</p>
                                        <div class="vr my-0"></div>
                                        <p class="my-0">{{$course->course_time}}</p>
                                    </div>
                                    <div>
                                        <p>Trainer : {{$course->trainer_name}}</p>
                                    </div>
                                    <hr class="hr">
                                    <div class="w-100">
                                        <a href="{{route('user.enter_course',[$course->trainer_id,$user->class_id])}}" class="btn btn my-third-web-color rounded-0 hstack gap-2 btn-light text-light">
                                            <i class="fa-solid fa-paper-plane"></i>
                                            <div class="vr"></div>
                                            <span>Enter Course</span>
                                        </a>
                                    </div>
                                    {{-- <button class="btn my-third-web-color rounded-0 hstack gap-2 btn-light text-light" type="submit">
                                        <i class="fa-solid fa-paper-plane"></i>
                                        <div class="vr"></div>
                                        <span>Post</span>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- STUDENT LIST --}}
            <div class="col-lg-3">
                {{-- // --}}
            </div>
            <div class="col-lg-9">
                <div class="card m-0 p-3">
                    <h5 class="fs-5 fw-light px-3 my-3">My Classmate</h5>
                    <div class="d-flex justify-content-center m-0 p-0" data-aos="fade-left" data-aos-duration="2000">
                        <table class="table table-bordered table-hover">
                            <thead class="my-first-web-color text-white">
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Address</th>
                            </thead>
                            <tbody>
                                @foreach ($classmate as $cm)
                                    <tr>
                                        <td class="">{{$cm->user->id ?? 'No Data'}}</td>
                                        <td class="">{{$cm->user->personal_detail->first_name ?? 'No Data'}} {{$cm->user->personal_detail->last_name ?? 'No Data'}}</td>
                                        <td class="">{{$cm->user->personal_detail->full_address ?? 'No Data'}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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