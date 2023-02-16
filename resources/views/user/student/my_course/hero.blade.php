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
            <div class="col-lg-9">
                <h3 class="title-heading">Course UX10981</h3>
                <div class="card my-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="hstack-gap-1 d-flex justify-content-center m-0">
                                <h5 class="fs-5 m-0">
                                    Siapkan !
                                </h5>
                            </div>
                            <div class="hstack-gap-1 d-flex justify-content-center m-0 p-0">
                                <p class="fs-6 fw-light m-0 me-1">10-01-2022</p>
                                <div class="vr me-1"></div>
                                <p class="fs-6 fw-light m-0">10-01-2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        {{-- <p class="fs-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti dolore, saepe vel fugiat adipisci aut modi, soluta, qui numquam ea amet architecto laudantium doloremque necessitatibus nobis magnam consectetur aliquam nisi.</p> --}}
                        <ul class="nav nav-sm m-0 fs-6 p-0 bg-info">
                            <li class="nav-item nav-item-sm sm">
                              <a class="nav-link active" aria-current="page" data-toggle="tab" href="#home">Active</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#menu1">Link</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#menu2">Link</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#menu3">Disabled</a>
                            </li>
                          </ul>
                          <hr class="hr m-0 p-0">
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active my-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="fs-6 fw-light">
                                            haihahi
                                        </h6>
                                    </div>
                                </div>
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
                        {{-- <footer class="blockquote-footer">
                        
                        </footer> --}}
                        <footer class="">
                            {{-- <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                  <a class="nav-link active" aria-current="page" data-toggle="tab" href="#home">Active</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu1">Link</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu2">Link</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#menu3">Link</a>
                                </li>
                            </ul>
                              <hr class="hr">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3>HOME</h3>
                                    <p>Some content.</p>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <h3>Menu 1</h3>
                                    <p>Some content in menu 1.</p>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Some content in menu 2.</p>
                                </div>
                            </div> --}}
                        </footer>
                      </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
