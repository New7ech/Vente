<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
            <!-- Navigation search form can be placed here -->
        </nav>
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

            @include('layouts.notification')

            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('assets/img/profile1.png') }}" alt="Image de Profil" class="avatar-img rounded-circle" />
                    </div>
                    <span class="profile-username">
                        {{-- <span class="fw-bold">{{ Auth::user()->name }}</span> --}}
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box d-flex align-items-center">
                                <div class="avatar-lg me-3">
                                    <img src="{{ asset('assets/img/profile1.png') }}" alt="Image de Profil" class="avatar-img rounded" />
                                </div>
                                <div class="u-text">
                                    <h4>Profile</h4>
                                    {{-- <p class="text-muted">{{ Auth::user()->name }}</p> --}}
                                    {{-- <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-xs btn-secondary">Voir Profil</a> --}}
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('#') }}">Déconnexion</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
