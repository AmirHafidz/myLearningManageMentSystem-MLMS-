

<div class="container py-5" style="min-height: 100vh">
    <div class="col-lg-12">
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
                        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.class' ? 'my-first-web-color' : ''}}">
                            <a href="{{route('user.class')}}" class="nav-link"><span class="fs-5 {{$routeName == 'user.class' ? 'text-white' : ''}}"><i class='bx bx-clipboard'></i> My Class</span>
                            </a></li>
                    @endcan
                    @can('student_course')
                        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.class' ? 'my-first-web-color' : ''}}"><a href="{{route('user.class')}}" class="nav-link"><span class="fs-5"><i class='bx bx-clipboard'></i> My Courses</span></li>
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
            {{-- MAIN-CONTENT --}}
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="fs-4">
                            List of My Class
                        </h4>
                        <hr class="hr">
                        <table class="table table-border table-sm table-hover">
                            <thead class="my-first-web-color text-white">
                                <th class="py-2">#</th>
                                <th class="py-2">Class</th>
                                <th class="py-2">Course</th>
                                <th class="py-2">Session</th>
                                <th class="py-2">View</th>
                            </thead>
                            <tbody>
                                @foreach ($my_class->list_class as $this_class)
                                <tr>
                                    <td class="py-2 align-middle"></td>
                                    <td class="py-2 align-middle">{{$this_class->name}}</td>
                                    <td class="py-2 align-middle">{{$my_class->name}}</td>
                                    <td class="py-2 align-middle">{{$this_class->id}}</td>
                                    <td class="py-2 align-middle">
                                        <a href="{{route('user.enter_course',[$user->id,$this_class->id])}}" class="btn my-third-web-color text-white btn-sm my-btn-all">
                                            <button class="btn hstack gap-1 btn-sm">
                                                <i class="fa-solid fa-door-open text-white"></i>
                                                <div class="vr text-white"></div>
                                                <span class="text-white">View</span>
                                            </button>
                                        </a>
                                    </td>
                                    {{-- <td>{{$user->master_course->name}}</td> --}}
                                    {{-- <td class="text-center">
                                        <a href="{{route('user.enter_course')}}" class="btn btn-dark text-white btn-sm shadow" value="">{{$l->id}}</a>
                                        <button class="btn btn-sm btn-dark text-white btnEnterCourse" value="{{$l->id}}">Enter</button>
                                    </td> --}}
                                    {{-- <td class="text-center">
                                        <a href="{{route('user.enter_course')}}" class="btn btn-dark text-white btn-sm shadow" value="">{{$user->master_course->id}}</a>
                                    </td> --}}
                                    {{-- <td class="text-center">
                                        <a href="{{route('user.enter_course',[$l->id,$user->master_course->id])}}" class="btn btn-dark text-white btn-sm shadow" value="">{{$l->id}}</a>
                                    </td> --}}
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
