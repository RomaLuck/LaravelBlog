<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand ms-4" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                @if (Route::has('login'))
                @auth
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Hello, {{Auth()->user()->name}}</h5>
                @endauth
                @endif
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-header">
                @if (Route::has('login'))
                @auth
                <form method="POST" action="/logout">
                    @csrf
                    <input type="submit" class="" value="Logout">
                </form>
                @endauth
                @endif
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        @if (Auth()->user()->hasRole('Admin') or Auth()->user()->hasRole('Moderator'))
                        <a href="{{ url('/admin') }}" class="nav-link active text-white" aria-current="page">Dashboard</a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="nav-link active text-white" aria-current="page">My profile</a>
                        @else
                        <a href="{{ route('login') }}" class="nav-link active text-white" aria-current="page">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link active text-white" aria-current="page">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item text-white" href="#">Action</a></li>
                            <li><a class="dropdown-item text-white" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-white" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</nav>
