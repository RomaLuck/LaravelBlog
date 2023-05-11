<div class="sidebar">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100%;">
        <div class="position-sticky" style="top: 2rem;">
            <picture>
                <source srcset="sourceset" type="image">
                <img src="/images/{{Auth()->user()->path}}" class="img-fluid rounded-3">
            </picture>
            <hr>
            <div class="container">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="/admin" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href=""></use>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/admin/posts" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Posts
                        </a>
                    </li>
                    <li>
                        <a href="{{route('categories.index')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Categories
                        </a>
                    </li>
                    @if (Auth()->user()->hasRole('Admin'))
                    <li>
                        <a href="{{route('users.index')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Users
                        </a>
                    </li>
                    @endif

                    <li>
                        <a href="{{route('roles.index')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            Roles
                        </a>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/images/{{Auth()->user()->path}}" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                    <li><a class="dropdown-item" href="/">Back</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <input type="submit" class="btn btn-link" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
