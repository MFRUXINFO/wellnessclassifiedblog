<nav class="navbar navbar-expand-lg bg-body-tertiary b my-2">
    <div class="container phone-navbar">
        <a class="navbar-brand" href="{{route('user.index')}}"><img src="{{$logoImage}}" alt="Drive Classified Logo" class="w-25"></a>
        {{-- <a class="navbar-brand" href="{{route('user.index')}}"><img src="{{asset('public/user/img/drive_classified_logo.svg')}}" alt="Drive Classified Logo" class="w-100"></a> --}}
        <div class="navbar-toggler border-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="25" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                    <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" fill="{{$mainColor}}" />
                </svg>
            </div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link  index" aria-current="page" href="{{route('user.index')}}"><span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link about" href="{{route('user.about')}}"><span>About Us</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link blog" href="{{route('user.blog')}}"><span>Blog</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tab_active menu_locations" href="{{route('user.location')}}"><span>Locations</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link tab_active contact" href="{{route('user.contact_us')}}"><span>Contact Us</span></a>
                </li>

            </ul>
        </div>
    </div>
</nav>
