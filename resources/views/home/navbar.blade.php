<nav class="navbar navbar-expand-lg my-first-web-color">
    <div class="container-fluid d-flex justify-content-center">
        <div class="ms-5">
            <div>
                <a class="navbar-brand" href="{{Auth()->user() ? route('user.dashboard'):route('home.index')}}"><img src="{{asset('images/bg/web_logo.png')}}" alt="" style="width:60px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex-justify-content-between align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active my-second-web-font text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav d-flex-justify-content-between align-items-center">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle my-second-web-font text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        About Us
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Biography</a></li>
                                        <li><a class="dropdown-item" href="{{route('home.trainer_list')}}">Our Trainer</a></li>
                                        <li><a class="dropdown-item" href="{{route('home.course_list')}}">Our Courses</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link my-second-web-font text-white" href="{{route('home.trainer_list')}}">Our Trainer</a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div>

        </div>
        @auth
            <div class="me-5">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav d-flex-justify-content-between align-items-center">
                        <li class="nav-item dropdown">
                            @if(count($notifications) > 0)
                                <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bxs-bell-ring bx-tada fs-6 text-warning' ></i>
                                </a>
                            @else
                                <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                    <i class='bx bxs-bell fs-6 text-white'></i>
                                </a>
                            @endif
                            <ul class="dropdown-menu dropdown-menu-end px-3 m-0" style="min-width:500px">
                                <a href="">
                                    <p class="fs-6 fw-light text-center">Mark as Read all</p>
                                </a>
                                <hr class="m-0">
                                @forelse ($notifications as $notification)
                                <p class="fs-6 fw-bold my-1">
                                    {{-- {{$notification->data['task']}} --}}
                                </p>
                                    <hr class="m-0">
                                @empty
                                <div class="bg-secondary">
                                    <i class="">No new notification for now ...</i>
                                </div>
                                @endforelse
                            </ul>
                        </li>
                    </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle my-second-web-font text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php $user->user == null ? $user->name : $user->user->name ?>
                            </a>
                            <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <form action="{{route('logout')}}" method="post" class="m-0 p-0">
                                            @csrf
                                            <button class="dropdown-item" role="button" type="submit">Logout</button>
                                        </form>
                                    </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth
    </div>
</nav>