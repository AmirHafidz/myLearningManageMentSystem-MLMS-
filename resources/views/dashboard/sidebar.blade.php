<div class="col-lg-3" data-aos="fade-up" data-aos-duration="1000">
    <ul class="list-group rounded-0">

        {{-- HEADER DASHBOARD --}}
        <li class="list-group-item my-third-web-color">
            <p class="fs-5 m-0 text-white my-web-font-1">
                Welcome,
            </p>
            <h2 class="fs-2 mt-0 text-white">
                {{$user->user == null ? $user->name : $user->user->name}}
            </h2>
            <p class="fs-6 text-white fw-lighter m-0">
                {{-- Class:  {{$user->master_class->name}} --}}
            </p>
            <p class="fs-6 text-white fw-lighter m-0">
                Student ID: 3402123
            </p>
        </li>

        {{-- DASHBOARD MAIN --}}
        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.dashboard' ? 'my-first-web-color' : ''}}">
            <a href="{{route('user.dashboard')}}" style="text-decoration: none" class="nav-link">
                <span class="align-middle fs-5 {{$routeName == 'user.dashboard' ? 'text-white' : ''}} my-web-font-1"><i class='bx bxs-dashboard'></i>Dashboard</span>
            </a>
        </li>

        {{-- DASHBOARD MY CALENDAR --}}
        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.calendar_index' ? 'my-first-web-color' : ''}}">
            <a href="{{route('user.calendar_index')}}" style="text-decoration: none" class="nav-link">
                <span class="align-middle fs-5 {{$routeName == 'user.calendar_index' ? 'text-white' : ''}} my-web-font-1"><i class="fa-solid fa-calendar-days"></i> My Calendar</span>
            </a>
        </li>

        {{-- DASHBOARD MY CLASS --}}
        @can('trainer_class')
            <li class="list-group-item fw-bold my-1">
                <a href="{{route('user.class')}}" class="nav-link"><span class="fs-5 my-web-font-1"><i class='bx bx-clipboard'></i> My Class</span>
                </a>
            </li>
        @endcan

        {{-- DASHBOARD MY COURSE --}}
        @can('student_course')
            <li class="list-group-item fw-bold my-1 {{$routeName == 'user.class' ? 'my-first-web-color' : ''}}"><a href="{{route('user.class')}}" class="nav-link">
                <span class="fs-5 my-web-font-1"><i class='bx bx-clipboard'></i> My Courses</span>
            </li>
        @endcan

        {{-- DASHBOARD MY DETAIL --}}
        <li class="list-group-item fw-bold my-1 {{$routeName == 'user.my_detail' ? 'my-first-web-color' : ''}}"><a href="{{route('user.my_detail')}}" class="nav-link">
            <span class="fs-5 my-web-font-1 {{$routeName == 'user.my_detail' ? 'text-white' : ''}}"><i class='bx bxs-user-circle'></i> My Detail<span></a>
        </li>

        {{-- DASHBOARD APPLY LEAVE --}}
        @can('apply_leave')
            <li class="list-group-item fw-bold my-1" data-bs-toggle="collapse" href="#applicationCollapse" aria-expanded="false" aria-controls="applicationCollapse" style="cursor:pointer">
                <span class="fs-5 my-web-font-1"><i class='bx bx-archive'></i> Application</span>
            </li>
            <div class="collapse ms-5 mt-0 bg-dark text-white rounded-0" id="applicationCollapse">
                <div class="list-group bg-dark-text-white mt-0 rounded-0">
                    <a href="{{route('leave.index')}}" class="list-group-item list-group-item-action my-first-web-color my-btn-all text-white rounded-0" aria-current="true">
                        <span>Apply Leave</span>
                    </a>
                </div>
            </div>
        @endcan

        {{-- DASHBOARD RESPONSE LEAVE --}}
        @can('response_leave')
            <li class="list-group-item fw-bold my-1 {{ $routeName == 'admin.list_leave_index' ? 'my-first-web-color': ''  }}" data-bs-toggle="collapse" href="#responseapplicationCollapse" aria-expanded="false" aria-controls="responseapplicationCollapse" style="cursor:pointer">
                <span class="fs-5 {{ $routeName == 'admin.list_leave_index' ? 'text-white': ''  }}"><i class='bx bx-archive'></i> Application</span>
            </li>
            <div class="collapse ms-5 mt-0 bg-dark text-white rounded-0 {{ $routeName == 'admin.list_leave_index' ? 'my-first-web-color': ''  }}" id="responseapplicationCollapse">
                <div class="list-group mt-0">
                    <a href="{{route('admin.list_leave_index')}}" class="list-group-item list-group-item-action rounded-0 hover-0 {{ $routeName == 'admin.list_leave_index' ? 'my-first-web-color': ''}}" aria-current="true">
                        <span class="fs-6 my-web-font-1 fw-bold {{ $routeName == 'admin.list_leave_index' ? 'text-white': ''  }}">List Leave Applications</span>
                    </a>
                </div>
            </div>
        @endcan

        {{-- DASHBOARD LIST USER --}}
        @can('list_user')
            <li class="list-group-item fw-bold my-1 {{$routeName == 'admin.list_user_index' ? 'my-first-web-color' : ''}}" data-bs-toggle="collapse" href="#listUserCollapse" aria-expanded="false" aria-controls="listUserCollapse" style="cursor:pointer">
                <span class="fs-5 {{$routeName == 'admin.list_user_index' ? 'text-white' : ''}}"><i class='bx bx-archive'></i> List Users</span>
            </li>
            <div class="collapse ms-5 mt-0 rounded-0" id="listUserCollapse">
                <div class="list-group mt-0 rounded-0 mb-1">
                    <a href="{{route('admin.list_user_index')}}" class="list-group-item list-group-item-action rounded-0 hover-0 {{$routeName == 'admin.list_user_index' ? 'my-first-web-color' : ''}}">
                        <span class="fs-6 my-web-font-1 fw-bold {{$routeName == 'admin.list_user_index' ? 'text-white' : ''}} my-web-font-1"> All Users<span>
                    </a>
                </div>
                <div class="list-group bg-light mt-0 rounded-0 mb-1">
                    <a href="{{route('admin.list_student_index')}}" class="list-group-item list-group-item-action rounded-0 hover-0 {{$routeName == 'admin.list_student_index' ? 'my-first-web-color' : ''}}">
                        <span class="fs-6 my-web-font-1 fw-bold {{$routeName == 'admin.list_student_index' ? 'text-white' : ''}} my-web-font-1 fw-bold"> All Students<span>
                    </a>
                </div>
            </div>
        @endcan

        {{-- DASHBOARD CERTIFICATE --}}
        <li class="list-group-item fw-bold my-1">
            <a href="{{route('admin.view_certificate')}}" class="nav-link"><span class="fs-5">Generate Certificate</span></a>
        </li>

    </ul>
</div>