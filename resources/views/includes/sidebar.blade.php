<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" >
    {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">VechNikel</span>
    </a> --}}
    <ul class="nav nav-pills flex-column">
      @if (Auth::user()->jabatan != "" || Auth::user()->roles == "ADMIN")
        <li class="nav-item mt-3">
          <a href="{{ route('home') }}"
            class="nav-link {{ (request()->is('dashboard')) ? 'active' : 'text-white'}}"
          >
            Dashboard
          </a>
        </li>
        <hr style="mt-0 mb-0">
        <li class="nav-item">
      @else
        <li class="nav-item mt-3">
      @endif
        <a href="{{ route('category.index') }}"
          class="nav-link {{ (request()->is('dashboard/category*')) ? 'active' : 'text-white'}}"
        >
          Jenis Kendaraan
        </a>
      </li>
      <li>
        <a href="{{ route('vehicles.index') }}"
          class="nav-link {{ (request()->is('dashboard/vehicles*')) ? 'active' : 'text-white'}}"
        >
          Kendaraan
        </a>
      </li>
      <li>
        <a href="{{ route('vehicleUse.index') }}"
          class="nav-link {{ (request()->is('dashboard/vehicleUse*')) ? 'active' : 'text-white'}}"
          >
          Data Pinjam Kendaraan
        </a>
      </li>
      @auth
          @if (Auth::user()->roles == 'ADMIN')
            <li>
              <a href="{{ route('user.index') }}"
                class="nav-link {{ (request()->is('dashboard/user*')) ? 'active' : 'text-white'}}"
                >
                Data User
              </a>
            </li>
          @endif
      @endauth
    </ul>
    <hr>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
        <button type="submit" class="btn btn-danger w-100">
            Logout
        </button>
    </form>
  </div>