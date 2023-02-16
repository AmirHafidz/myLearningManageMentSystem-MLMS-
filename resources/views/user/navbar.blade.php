<nav class="navbar navbar-expand-lg my-first-web-color">
    <div class="container-fluid d-flex justify-content-between">
        <div class="ms-5">
            <div>
                <a class="navbar-brand" href="#">Navbar</a>
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
                        <a class="nav-link my-second-web-font text-white" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link my-second-web-font text-white" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="me-5">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav d-flex-justify-content-between align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle my-second-web-font text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- {{$user->user->name}} --}}
                        </a>
                    <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <button class="dropdown-item" role="button" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>