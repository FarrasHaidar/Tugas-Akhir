<div class="sidebar">
    <div class="d-flex justify-content-between">
        <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
            <img src="{{ asset('media/orino-logo.svg') }}" alt="orino-logo" style="width: 45px; height: auto;">
            <span class="fs-4 text-warning ms-3">Orino Petshop</span>
        </a>
        <a href="javascript:void(0)" class="align-bottom text-decoration-none text-white fw-bold h3"
            onclick="closeNav()">x</a>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.index') }}"
                class="nav-link d-flex align-items-center gap-2 text-white {{ Route::is('admin.index') ? 'active' : '' }}"
                aria-current="page">
                @include('icons/home')
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('admin.grooming.index') }}"
                class="nav-link d-flex align-items-center gap-2 mt-2 text-white {{ Route::is('admin.grooming.index') ? 'active' : '' }}"
                aria-current="page">
                @include('icons/grooming')
                Grooming
            </a>
        </li>
        <li>
            <a href="{{ route('admin.pethotel.index') }}"
                class="nav-link d-flex align-items-center gap-2 mt-2 text-white {{ Route::is('admin.pethotel.index') ? 'active' : '' }}"
                aria-current="page">
                @include('icons/hotel')
                Pet Hotel
            </a>
        </li>
        <li>
            <a href="{{ route('admin.order.index') }}"
                class="nav-link d-flex align-items-center gap-2 mt-2 text-white {{ Route::is('admin.order.index') ? 'active' : '' }}"
                aria-current="page">
                @include('icons/order')
                Orders
            </a>
        </li>
        <li>
            <a href="{{ route('admin.feedback.index') }}"
                class="nav-link d-flex align-items-center gap-2 mt-2 text-white {{ Route::is('admin.feedback.index') ? 'active' : '' }}"
                aria-current="page">
                @include('icons/orders')
                Feedback
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown position-absolute bottom-0 mb-3">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('media/orino-logo.svg') }}" alt="orino-logo" width="32" height="32"
                class="rounded-circle me-2">
            <strong>Admin Orino</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="{{ route('show_profile') }}">Profile</a></li>
            <li>
                <form id="logout-form" class="" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="button" class="dropdown-item text-white confirm-logout" value="Logout" />
                </form>
            </li>
        </ul>
    </div>
</div>
