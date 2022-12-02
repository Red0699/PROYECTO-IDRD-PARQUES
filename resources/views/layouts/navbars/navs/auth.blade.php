<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-purple border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('Inicio') }}</a>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
            </ul>
            <!-- Users -->
            <ul class="navbar-nav align-items-center  d-none d-md-flex ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right ">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">{{ __('Bienvenido') }}</h6>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="ni ni-single-02 text-purple"></i>
                            <span>{{ __('Ver perfil') }}</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run text-purple"></i>
                            <span>{{ __('Cerrar sesión') }}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>