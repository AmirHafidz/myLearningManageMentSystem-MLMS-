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
            </div> --}}
            @include('dashboard.sidebar')
            <div class="col-lg-9">
                <div class="card card-body">
                    @include('user.admin.breadcrumb')
                    <hr class="hr">
                    <h4 class="fs-4 my-0">List Leave Application</h4>
                    <hr class="hr">
                    <div class="card card-body">
                        <table class="table table-bordered table-hover" id="table_list_leave">
                            <thead class="my-first-web-color text-white">
                                <th class="text-center" width="5%">#</th>
                                <th class="text-center" width=30%>Full Name</th>
                                <th class="text-center" width=30%>Title</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Detail</th>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>1</td>
                                    <td>Amir Hafidz</td>
                                    <td>Cuti-Cuti Malaysia uti-Cuti Malaysia uti-Cuti Malaysia</td>
                                    <td>10/03/2023 - 10/04/2023</td>
                                    <td><button class="btn btn-primary text-white btn-sm mt-1"><i class="fa-solid fa-eye"></i></button></td>
                                    <td class="d-flex justify-content-center">
                                        <button class="btn btn-success btn-sm me-1 mt-1"><i class="fa-solid fa-check"></i></button>
                                        <button class="btn btn-danger btn-sm mt-1"><i class="fa-solid fa-xmark"></i></button>
                                    </td>
                                </tr> --}}
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