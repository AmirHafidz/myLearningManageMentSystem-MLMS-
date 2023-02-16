<div class="container py-5" style="min-height:100vh">
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
                            {{$user->name}}
                        </h2>
                        <p class="fs-6 text-white fw-lighter m-0">
                            Class:  {{$user->class_name}}

                        </p>
                        <p class="fs-6 text-white fw-lighter m-0">
                            Student ID: 3402123
                        </p>
                    </li>
                    <li class="list-group-item fw-bold my-1">Dashboard</li>
                    <li class="list-group-item fw-bold my-1"><a href="{{route('user.class')}}" class="nav-link">My Courses</a></li>
                    <li class="list-group-item fw-bold my-1">Application</li>
                    <li class="list-group-item fw-bold my-1"><a href="{{route('user.my_detail')}}" class="nav-link">My Detail</a></li>
                    <li class="list-group-item fw-bold my-1">And a fifth one</li>
                </ul>
            </div> --}}
            @include('dashboard.sidebar')
            {{-- MAIN-CONTENT --}}
            <div class="col-lg-3">
                {{-- FIRST --}}
                <div class="card rounded-0 mb-1">
                    <div class="card-body">
                        <div class="d-flex justify-content-first">
                            <div>
                                <img src="{{asset('images/user_photo/'.$user->personal_detail->photo)}}" alt="" class="w-100 text-center">
                            </div>
                            <div>
                                <p class="fs-6 fw-bold m-0 ms-1">{{$user->name}}</p>
                                <p class="fs-6 fw-light m-0 ms-1">{{$user->email}}</p>
                                <p class="fs-6 fw-light m-0 ms-1">{{$user->role}}</p>
                            </div>
                        </div>
                        <hr class="hr">

                        <table class="table table-sm">
                            <tr>
                                <td style="" class="my-web-font-2 fw-bold">Student ID</td>
                                <td>:</td>
                                <td class="my-web-font-3 fw-light">9842304</td>
                            </tr>
                            <tr>
                                <td style="" class="my-web-font-2 fw-bold">{{$user->role_id == 3 ? 'Class' : ($user->role_id == 2 ? 'Course' : 'Hehe')}}</td>
                                <td>:</td>
                                <td class="my-web-font-3 fw-light">{{$user->role_id == 3 ? $user->class_name : ($user->role_id == 2 ? $user->course_name : 'Hehe')}}</td>
                            </tr>
                            <tr>
                                <td style="" class="my-web-font-2 fw-bold">Date Joined</td>
                                <td>:</td>
                                <td class="my-web-font-3 fw-light">01/09/2022</td>
                            </tr>
                        </table>
                    </div>
                </div>
                {{-- SECOND --}}
                <div class="card rounded-0">
                    <div class="card-body">
                        <h4 class="fs-4 my-first-web-font-1 fw-bold" style="color:#5C658D">Personal File</h4>
                        <hr class="hr">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <th style="" class="my-web-font-2 fw-bold">#</th>
                                    <th style="" class="my-web-font-2 fw-bold">Name</th>
                                    <th style="" class="my-web-font-2 fw-bold">File</th>
                                    <th style="" class="my-web-font-2 fw-bold">Actions</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="" class="my-web-font-3 fw-light">1</td>
                                        <td style="" class="my-web-font-3 fw-light">eiocnwewecwecewcwe</td>
                                        <td style=""><a href="" style="" class="my-web-font-3 fw-light">wencowe.pdf</a></td>
                                        <td class="d-flex justify-content-center">
                                            <button style="" class="btn btn-success btn-sm me-1">View</button>
                                            <button style="" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-1">
                    <div class="card-body">
                        <h4 class="fs-4 my-first-web-font-1 fw-bold" style="color:#5C658D">Personal Details</h4>
                        <hr class="hr">
                        <table class="table">
                            <tr>
                                <td style="width:150px" class="my-web-font-2 fw-bold">Full Name</td>
                                <td>:</td>
                                <td class="my-web-font-3 fw-light">{{$user->fullname}}</td>
                            </tr>
                            <tr>
                                <td style="width:150px" class="my-web-font-2 fw-bold">IC Number</td>
                                <td>:</td>
                                <td class="my-web-font-3 fw-light">{{$user->personal_detail->ic_number}}</td>
                            </tr>
                            <tr>
                                <td style="width:150px" class="my-web-font-2 fw-bold">Date Born</td>
                                <td>:</td>
                                <td class="my-web-font-3 fw-light">{{$user->personal_detail->date_born}}</td>
                            </tr>
                            <tr>
                                <td style="width:150px" class="my-web-font-2 fw-bold">Full Address</td>
                                <td>:</td>
                                <td class="my-web-font-3 fw-light">{{$user->personal_detail->full_address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="fs-4 my-first-web-font-1 fw-bold" style="color:#5C658D">Academic Details</h4>
                        <hr class="hr">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table w-auto">
                                    <thead>
                                        <th scope="col">#</th>
                                        <th scope="col" style="column-width: 500px">Academic Level</th>
                                        <th scope="col">School/Institute/Level</th>
                                        <th scope="col">Achievement</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="my-web-font-3 fw-light">1</td>
                                            <td class="my-web-font-3 fw-light">Primary School</td>
                                            <td class="my-web-font-3 fw-light"> Sk Kampong Melayu</td>
                                            <td class="my-web-font-3 fw-light">UPSR</td>
                                            <td style="width:auto" class="d-flex justify-content-center">
                                                <button class="btn btn-warning btn-sm me-1">Edit</button>
                                                <button class="btn btn-warning btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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