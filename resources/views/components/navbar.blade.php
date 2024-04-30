<nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
    <div class="container">
        <a class="navbar-brand fs-4 fw-bold" href="{{ route('landing_page') }}" style="color: #f9ca0f;">
            <img src="{{ asset('media/orino-logo.svg') }}" alt="orino-logo" style="width: 45px; height: auto;">
            <p class="d-sm-inline d-none">Orino Petshop</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="mx-auto navbar-nav">
                <li class="nav-item ps-3">
                    <a class="nav-link btn btn-warning text-black" aria-current="page"
                        href="{{ route('landing_page') }}#tentang-kami">BERANDA</a>
                </li>
                <li class="nav-item ps-3">
                    <a class="nav-link btn btn-warning text-black {{ Route::current()->getName() == 'grooming_page' ? 'active' : '' }}"
                        href="{{ route('grooming_page') }}">GROOMING</a>
                </li>
                <li class="nav-item ps-3">
                    <a class="nav-link btn btn-warning text-black {{ Route::current()->getName() == 'pethotel_page' ? 'active' : '' }}"
                        href="{{ route('pethotel_page') }}">PET HOTEL</a>
                </li>
                @if (Auth::user())
                    <li class="nav-item ps-3">
                        <a class="nav-link btn btn-warning text-black {{ Route::current()->getName() == 'index_order' ? 'active' : '' }}"
                            href="{{ route('index_order') }}">ORDER</a>
                    </li>
                @endif
                <li class="nav-item ps-3">
                    <a class="nav-link btn btn-warning text-black"
                        href="{{ route('landing_page') . '#feedback' }}">FEEDBACK</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning text-black"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning text-black"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item ps-2">
                        <a class="nav-link btn btn-warning text-black" href="{{ route('show_profile') }}">Profile</a>
                    </li>
                    <li class="nav-item ps-2">
                        <a class="nav-link btn btn-warning text-black confirm-logout"
                            href="{{ route('logout') }}">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                    @if (Auth::user()->is_admin)
                        <li class="nav-item ps-2">
                            <a class="nav-link btn btn-warning text-black" href="{{ route('admin.index') }}">Dashboard</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>
