<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PolluxUI Admin</title>
    @include('Partials.css_temp')
</head>
<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="{{ url('/') }}"><img src="{{ asset('Template/images/logo.svg') }}" alt="logo"/></a>
                    <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}"><img src="{{ asset('Template/images/logo-mini.svg') }}" alt="logo"/></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                            <!-- Menampilkan foto profil dan username dinamis -->
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="profile"/>
                            <span class="nav-profile-name">{{ Auth::user()->username }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="typcn typcn-cog-outline text-primary"></i> Settings
                            </a>

                            <!-- Logout Link -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="typcn typcn-eject text-primary"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-date dropdown">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                            <h6 class="date mb-0" id="current-date">Today :</h6>
                            <i class="typcn typcn-calendar"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar and Main Content -->
        <div class="container-fluid page-body-wrapper d-flex">
            @include('Partials.sidebar')

            <div class="main-content flex-grow-1">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('Partials.footer')
    </div>

    @include('Partials.js_temp')

</body>
</html>
