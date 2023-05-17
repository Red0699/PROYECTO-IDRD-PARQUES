<style>
    .ni.circle {
        padding: 0.33333333em;
        vertical-align: -16%;
        background-color: #542c86;
        border-radius: 50%;
    }

    .ni {
        display: inline-block;
        font: normal normal normal 14px/1 NucleoIcons;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: white;
        
    }

    .navbar-nav li a {
        font-size: 18px;
    }

    .navbar-nav .social-icons i {
        font-size: 20px;
    }

    .navbar {
        border-bottom: 5px solid #5b2d6d;
        height: 100px;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('argon') }}/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="/">
                        <i class="ni ni-planet circle"></i>
                        <span class="nav-link-inner--text">{{ __('Inicio') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('vista') }}">
                        <i class="ni ni-world circle"></i>
                        <span class="nav-link-inner--text">{{ __('Parques') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('map') }}">
                        <i class="ni ni-square-pin circle"></i>
                        <span class="nav-link-inner--text">{{ __('Mapa') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('opiniones.create') }}">
                        <i class="ni ni-chat-round circle"></i>
                        <span class="nav-link-inner--text">{{ __('Danos tu feedback') }}</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">

                            @if(auth()->user()->photo == null)
                            <span class="avatar avatar-sm rounded-circle">
                                <img src="{{ asset('assets') }}/img/theme/default-user-image.png" alt="">
                            </span>
                            @else
                            <img src="{{ asset(auth()->user()->photo) }}" alt="" class="img-fluid avatar-sm rounded-circle">
                            @endif

                            <div class="ml-1 d-none d-lg-block">
                                <span class="nav-link-inner--text">{{ auth()->user()->name }}</span>
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