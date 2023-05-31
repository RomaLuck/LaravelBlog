<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mx-5" href="/">Main page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
                            <a class="dropdown-item" href="/">Back</a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-item">
                                <form method="POST" action="/logout">
                                    @csrf
                                    <input type="submit" class="nav-item" value="Logout">
                                </form>
                            </div>
                        </div>

                    </li>
                    <a class="nav-link mx-3" href="">{{auth()->user()->name}}</a>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link active text-white"
                                            aria-current="page">Log in</a></li>

                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link active text-white"
                                            aria-current="page">Sign Up</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

