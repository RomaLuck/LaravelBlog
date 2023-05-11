<div class="sidebar">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100%;">
        <div class="position-sticky" style="top: 2rem;">
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
        </div>
    </div>
</div>
