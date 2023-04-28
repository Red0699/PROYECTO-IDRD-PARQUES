<style>
    /*
    .perfil-usuario .profile-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        

    }
    */
</style>

<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header align-items-center d-flex>
            <a class=" navbar-brand" href="javascript:void(0)">
            <img src="{{ asset('argon') }}/img/brand/logo-idrd.png" class="navbar-brand-img" alt="..." style="max-height: 90px;">
            </a>
        </div>
        <!--
        <div class="perfil-usuario justify-content-center">
            <div class="profile-container d-flex flex-column align-items-center">
                <div class="profile-image-container">
                    <img src="../assets/img/theme/default-user-image.png" alt="Foto de perfil del usuario" class="profile-image" style="width:120px;height:120px;">
                </div>
                <p>Bienvenido usuario <span class="username">{{ auth()->user()->name }}</span></p>
            </div>
        </div>
        -->

        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" role="button" aria-expanded="true">
                            <i class="fas fa-home text-purple"></i> {{ __('Inicio') }}
                        </a>
                    </li>
                    @can('users_module')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <i class="fas fa-users text-purple"></i> {{ __('Usuarios') }}
                        </a>
                    </li>
                    @endcan

                    @can('parques_module')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('parque.index') }}">
                            <i class="fas fa-tree text-purple"></i> {{ __('Parques') }}
                        </a>
                    </li>
                    @endcan

                    @can('inventario_module')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventario') }}">
                            <i class="fas fa-warehouse text-purple"></i></i> {{ __('Inventarios') }}
                        </a>
                    </li>
                    @endcan

                    @can('diagnostico_module')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('diagnostico.index') }}">
                            <i class="fas fa-archive text-purple"></i> {{ __('Diagnósticos') }}
                        </a>
                    </li>
                    @endcan

                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('map') }}">
                            <i class="ni ni-pin-3 text-purple"></i> {{ __('Mapas') }}
                        </a>
                    </li>

                    @can('informes_module')
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar3-items" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-poll text-purple"></i>
                            <span class="nav-link-text">{{ __('Informes') }}</span>
                        </a>

                        <div class="collapse" id="navbar3-items">
                            <ul class="nav nav-sm flex-column ">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('inventario.informe') }}">
                                        {{ __('Inventario') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('general.informe') }}">
                                        {{ __('Diagnóstico') }}
                                    </a>
                                </li>

                                @can('historicos_module')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('usuarios.informe') }}">
                                        {{ __('Históricos') }}
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                    @endcan

                    @can('roles_module')
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar2-items" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="fas fa-cog text-purple"></i>
                            <span class="nav-link-text">{{ __('Configuraciones') }}</span>
                        </a>

                        <div class="collapse" id="navbar2-items">
                            <ul class="nav nav-sm flex-column ">
                                @can('permissions_module')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('permission.index') }}">
                                        {{ __('Permisos') }}
                                    </a>
                                </li>
                                @endcan

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('rol.index') }}">
                                        {{ __('Roles') }}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endcan

                </ul>

                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Soporte de sitio</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                     <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship text-purple"></i> Guía de Usuario
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette text-purple"></i> Documentación
                    </a>
                </li> 
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('map') }}">
                            <i class="ni ni-support-16 text-purple"></i> {{ __('Soporte') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>