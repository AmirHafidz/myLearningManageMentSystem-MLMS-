<div class="container py-3 px-0" style="min-height: 100vh">
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
                    <li class="list-group-item fw-bold my-1">
                        <a href="{{route('user.dashboard')}}">
                            <span class="align-middle fs-5"><i class='bx bxs-dashboard'></i>Dashboard</span>
                        </a>
                    </li>
                    @can('trainer_class')
                        <li class="list-group-item fw-bold my-1"><a href="{{route('user.class')}}" class="nav-link"><span class="fs-5"><i class='bx bx-clipboard'></i> My Class</span></a></li>
                    @endcan
                    @can('student_course')
                        <li class="list-group-item fw-bold my-1"><a href="{{route('user.class')}}" class="nav-link"><span class="fs-5"><i class='bx bx-clipboard'></i> My Courses</span></li>
                    @endcan
                    <li class="list-group-item fw-bold my-1"><a href="{{route('user.my_detail')}}" class="nav-link"><span class="fs-5"><i class='bx bxs-user-circle'></i> My Detail<span></a></li>
                    <li class="list-group-item fw-bold my-1" data-bs-toggle="collapse" href="#applicationCollapse" aria-expanded="false" aria-controls="applicationCollapse" style="cursor:pointer"><span class="fs-5"><i class='bx bx-archive'></i> Application</span>
                    </li>
                    <div class="collapse ms-5 mt-0 bg-dark text-white rounded-0" id="applicationCollapse">
                        <div class="list-group bg-dark-text-white mt-0 rounded-0">
                            <a href="{{route('leave.index')}}" class="list-group-item list-group-item-action bg-dark text-white rounded-0" aria-current="true">
                                Apply Leave
                            </a>
                        </div>
                    </div>
                    @can('list_user')
                        <li class="list-group-item fw-bold my-1"><a href="{{route('admin.list_user_index')}}" class="nav-link"><span class="fs-5"><i class='bx bx-list-ul'></i> List User<span></a></li>
                    @endcan
                    <li class="list-group-item fw-bold my-1">
                        amir hafidz
                    </li>
                </ul>
            </div>
            <a href="{{route('admin.generate_certificate')}}" class="display-1">Print Now</a>
        </div>
    </div>
</div>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>