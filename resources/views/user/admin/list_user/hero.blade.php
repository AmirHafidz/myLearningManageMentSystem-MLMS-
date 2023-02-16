<div class="container py-3 px-0" style="min-height: 100vh">
    <div class="col-lg-12">
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
                        <li class="list-group-item fw-bold my-1">
                            <a href="{{route('user.class')}}" class="nav-link"><span class="fs-5"><i class='bx bx-clipboard'></i> My Class</span>
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
                                <a href="{{route('leave.index')}}" class="list-group-item list-group-item-action my-first-web-color my-btn-all text-white rounded-0" aria-current="true">
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
            {{-- CONTENT --}}
            <div class="col-lg-9">
                <div class="card card-body">
                    @include('user.admin.breadcrumb')
                    <hr class="hr">
                    <h4 class="fs-4 my-0">List User</h4>
                    <hr class="hr">
                    <div class="card card-body">
                        <table class="table table-bordered table-hover" id="table_list_user">
                            <thead class="my-first-web-color text-white">
                                <th class="text-center" width="5%">#</th>
                                <th class="text-center" width=30%>Full Name</th>
                                <th class="text-center" width=30%>Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Actions</th>
                            </thead>
                            <tbody>
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