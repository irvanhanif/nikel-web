<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" id="navTitle" href="{{ url('/') }}">
            VechNikel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @auth
            <ul class="navbar-nav me-auto" id="leftsideNavbar">
            @if (Auth::user()->jabatan != "" || Auth::user()->roles == "ADMIN")
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        Dashboard
                    </a>
                </li>  
            @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Data
                    </a>
                    <ul class="dropdown-menu mb-3">
                        <li class="dropdown-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                Jenis Kendaraan
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{ route('vehicles.index') }}" class="nav-link">
                                Kendaraan
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="{{ route('vehicleUse.index') }}" class="nav-link">
                                Pinjaman Kendaraan
                            </a>
                        </li>
                        @if (Auth::user()->roles == 'ADMIN')
                            <li class="dropdown-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                User
                            </a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
            @endauth

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                @auth
                <!-- Authentication Links -->

                <li class="nav-item dropdown account-nav">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        halo, {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if ((Auth::user()->jabatan != "" || Auth::user()->roles == "ADMIN") && !request()->is('dashboard*'))
                            <a href="{{ route('home') }}" class="dropdown-item">Dashboard</a>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                            <button type="submit" class="dropdown-item">
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
                <li class="nav-item mb-2 logout-btn">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </form>
                </li>
                @endauth
                @guest
                    @if (request()->is('register'))
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    @elseif (request()->is('login'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>